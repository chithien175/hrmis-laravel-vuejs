<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMenu() && $gate.isMenuModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="far fa-compass"></i> Trình đơn - Menu</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Trình đơn</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row" v-if="isLoading">
                            <div class="col-12">
                                <vcl-facebook class="mb-3 mr-3" :height="100" v-for="index in 6" :key="index"></vcl-facebook>
                            </div>
                        </div>
                        
                        <div class="row" v-if="!isLoading">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-sm">
                                                    <input class="form-control form-control-navbar" type="text" placeholder="Nhập tiêu đề tìm kiếm" aria-label="Search" v-model="search" @keyup="searchit">
                                                </div>
                                            </div>
                                            <div class="col-md-9 text-md-right">
                                                <button class="btn btn-sm btn-primary" @click="newModal()">
                                                <i class="fas fa-plus fa-fw"></i> Thêm mới
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="blue font-weight-bold">
                                                    <th>ID</th>
                                                    <th>Tên</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Tác vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="menu in menus" :key="menu.id">
                                                    <td>{{ menu.id }}</td>
                                                    <td>{{ menu.name }}</td>
                                                    <td><span class="badge bg-info">{{ menu.created_at | formatDateTime }}</span></td>
                                                    <td>
                                                        <router-link class="btn btn-sm btn-success" :to="{ name: 'menu-builder', params: { menu_id: menu.id }}">
                                                            <i class="fas fa-bars fa-fw"></i> Xây dựng trình đơn
                                                        </router-link>
                                                        <button class="btn btn-sm btn-primary" @click="editModal(menu)">
                                                            <i class="fa fa-edit fa-fw"></i> Sửa
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" @click="deleteMenu(menu.id)">
                                                            <i class="fa fa-trash fa-fw"></i> Xóa
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                                <code class="note-developer p-3">
                                    Code hiển thị menu:<br>
                                    $options = array(
                                    'id' => 'navigation',
                                    'class' => 'navigation',
                                    'sub_id' => 'submenu',
                                    'sub_class' => 'submenu'
                                );<br>
                                menu('frontend', $options);
                                </code>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Menu Modal -->
        <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="menuModalLabel">{{ editmode ? 'Chỉnh sửa trình đơn' : 'Thêm mới trình đơn' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateMenu() : createMenu()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input v-model="form.name" type="text" name="name"
                                            placeholder="Tên trình đơn"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button :disabled="form.busy" type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Hủy</button>
                            <button :disabled="form.busy" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> {{ editmode ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /. Menu Modal -->
    </div>
    <div v-if="!$gate.isManageMenu() || !$gate.isMenuModule()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
        },
        data() {
            return {
                editmode: false,
                isLoading: true,
                menus: {},
                form: new Form({
                    id: '', name: '',
                }),
                search: '',
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/menu').then(({ data }) => { 
                    this.menus = data;
                    this.isLoading = false; 
                });
                this.$Progress.finish();
            },
            editModal (menu) {
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(menu);
                $('#menuModal').modal('show');
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                this.form.clear();
                $('#menuModal').modal('show');
            },
            createMenu () {
                this.$Progress.start();
                this.form.post('../api/menu')
                .then( () => {
                    $('#menuModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm trình đơn thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            updateMenu () {
                this.$Progress.start();
                this.form.put('../api/menu/'+this.form.id)
                .then( () =>{
                    $('#menuModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Chỉnh sửa trình đơn thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteMenu (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa trình đơn này?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa ngay!',
                    cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if(result.value){
                            // Send request to the server
                            this.$Progress.start();
                            this.form.delete('../api/menu/'+id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa trình đơn thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa trình đơn!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            searchit: _.debounce( () => {
                Fire.$emit('Searching');
            }, 500),
        },
        created() {
            this.loadData();

            Fire.$on('Searching', () => {
                let query = this.search;
                if(query){
                    this.$Progress.start();
                    axios.get('/api/menu/find?q='+query)
                    .then( (data) => {
                        this.menus = data.data;
                        this.$Progress.finish();
                    })
                    .catch( () =>{
                        this.$Progress.fail();
                    });
                }else{
                    this.loadData();
                }
            });

            Fire.$on('AfterCreate',() => {
                this.loadData();
            });
        }
    }
</script>
