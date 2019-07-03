<template>
    <div>
        <div class="content-wrapper" v-if="$gate.isManageUsers()">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 blue">Quản lý người dùng</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="void:javascript(0)">Cấu hình ứng dụng</a></li>
                                <li class="breadcrumb-item active">Quản lý người dùng</li>
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="search" placeholder="Nhập tên / email tìm kiếm" aria-label="Search" v-model="search" @keyup="searchit">
                                            </div>
                                        </div>
                                        <div class="col-md-9 text-md-right">
                                            <button class="btn btn-sm btn-primary" @click="newModal()">
                                            <i class="fas fa-user-plus fa-fw"></i> Thêm mới
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
                                                <th>Họ tên</th>
                                                <th>Email</th>
                                                <th>Phân quyền</th>
                                                <th>Đăng nhập cuối</th>
                                                <th>Trạng thái</th>
                                                <th>Tác vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users" :key="user.id">
                                                <td>{{ user.id }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ user.roles[0].display_name }}</td>
                                                <td>
                                                    <span class="badge bg-info">{{ user.last_login_at | formatDateTime }}<br>{{ user.last_login_ip }}</span>
                                                    
                                                </td>
                                                <td>
                                                    <span v-if="user.status == 'active'" class="badge badge-success">Kích hoạt</span>
                                                    <span v-else class="badge badge-danger">Vô hiệu</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" @click="editModal(user)">
                                                        <i class="fa fa-edit fa-fw"></i> Sửa
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" @click="deleteUser(user.id)">
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
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->

            <!-- User Modal -->
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title blue" id="userModalLabel">{{ editmode ? 'Cập nhật người dùng' : 'Thêm mới người dùng' }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editmode ? updateUser() : createUser()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                        placeholder="Họ và tên"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.email" type="email" name="email"
                                        placeholder="Địa chỉ Email"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                                <div class="form-group">
                                    <textarea v-model="form.bio" name="bio" id="bio" rows="2"
                                    placeholder="Mô tả ngắn về người dùng (Không bắt buộc)"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                                    <has-error :form="form" field="bio"></has-error>
                                </div>
                                 <div class="form-group">
                                    <input v-model="form.password" type="password" name="password"
                                        placeholder="Mật khẩu"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                    <has-error :form="form" field="password"></has-error>
                                </div>
                                <div class="form-group">
                                    <select name="type" id="type" v-model="form.type" class="form-control" :class="{ 'is-invalid' : form.errors.has('type') }">
                                        <option disabled value="">Chọn nhóm phân quyền</option>
                                        <option v-for="role in roles" :key="role.id" v-bind:value="role.name">{{ role.display_name }}</option>
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                                <div class="form-group">
                                    <select name="status" id="status" v-model="form.status" class="form-control" :class="{ 'is-invalid' : form.errors.has('status') }">
                                        <option value="active">Kích hoạt</option>
                                        <option value="deactive">Vô hiệu</option>
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Hủy</button>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> {{ editmode ? 'Cập nhật' : 'Thêm mới' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /. User Modal -->
        </div>
        <div v-if="!$gate.isManageUsers()">
            <not-found></not-found>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                users: {},
                form: new Form({
                    id: '', name: '', email: '', password: '', type: '', bio: '', photo: '', status: 'active'
                }),
                roles: {},
                search: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadRoles () {
                axios.get('api/role').then(({ data }) => { this.roles = data });
            },
            loadUsers () {
                axios.get('api/user').then(({ data }) => { this.users = data });
            },
            editModal (user) {
                this.editmode = true;
                this.form.reset();
                $('#userModal').modal('show');
                this.form.fill(user);
                this.form.type = user.roles[0].name;
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                $('#userModal').modal('show');
            },
            createUser () {
                this.$Progress.start();
                this.form.post('api/user')
                .then( () => {
                    $('#userModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm người dùng thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            updateUser () {
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                .then( () =>{
                    $('#userModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Sửa người dùng thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteUser (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa người dùng này?",
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
                            this.form.delete('api/user/'+id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa người dùng thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa người dùng!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            searchit: _.debounce( () => {
                Fire.$emit('Searching');
            }, 500)
        },
        created() {
            this.loadUsers();
            this.loadRoles();

            Fire.$on('Searching',() => {
                let query = this.search;
                if(query){
                    axios.get('api/findUser?q='+query)
                    .then( (data) => {
                        this.users = data.data;
                    })
                    .catch( () =>{
                        
                    });
                }else{
                    this.loadUsers();
                }
            });

            Fire.$on('AfterCreate',() => {
               this.loadUsers();
            });
        }
    }
</script>
