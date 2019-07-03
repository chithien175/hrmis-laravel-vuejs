<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageACL()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 blue">Nhóm quyền sử dụng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="void:javascript(0)">Cấu hình ứng dụng</a></li>
                        <li class="breadcrumb-item active">Nhóm quyền sử dụng</li>
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
                                            <input class="form-control form-control-navbar" type="search" placeholder="Nhập nhóm quyền tìm kiếm" aria-label="Search" v-model="search" @keyup="searchit">
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
                                            <th>Nhóm quyền</th>
                                            <th>Mô tả</th>
                                            <th>Tạo lúc</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="role in roles" :key="role.id">
                                            <td>{{ role.id }}</td>
                                            <td>{{ role.display_name }}</td>
                                            <td>{{ role.description }}</td>
                                            <td>{{ role.created_at | formatDate }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" @click="editModal(role)">
                                                    <i class="fa fa-edit fa-fw"></i> Sửa
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="deleteRole(role.id)">
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

        <!-- Role Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="roleModalLabel">{{ editmode ? 'Cập nhật nhóm quyền' : 'Thêm mới nhóm quyền' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateRole() : createRole()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.display_name" type="text" name="display_name"
                                    placeholder="Nhóm quyền"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('display_name') }" @change="convertName">
                                <has-error :form="form" field="display_name"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.description" name="description" id="description" rows="2"
                                placeholder="Mô tả ngắn về nhóm quyền (Không bắt buộc)"
                                class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group form-inline col-6" v-for="permission in form.checked_permissions" :key="permission.id">
                                    <toggle-button v-model="permission.checked"
                                        color="#0e4d9a" :width="40"
                                    />
                                    <label :for="permission.display_name" class="ml-2">{{ permission.display_name }}</label>
                                </div>
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
        <!-- /. Role Modal -->
    </div>
    <div v-if="!$gate.isManageACL()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                roles: {},
                form: new Form({
                    id: '', name: '', display_name: '', description: '', checked_permissions: []
                }),
                permissions: {},
                search: ''
            }
        },
        methods: {
            loadRoles () {
                axios.get('api/role').then(({ data }) => { this.roles = data; });
            },
            loadPermissions () {
                axios.get('api/getPermissions').then(({ data }) => { this.permissions = data; });
            },
            editModal (role) {
                this.editmode = true;
                this.form.reset();
                this.form.fill(role);
                this.form.checked_permissions = [];
                
                for(let i=0; i<this.permissions.length; i++){
                    if(_.findIndex(role.permissions, this.permissions[i]) >= 0){
                        this.form.checked_permissions.push({
                            id: this.permissions[i].id,
                            display_name: this.permissions[i].display_name,
                            checked: true
                        });
                    }else{
                        this.form.checked_permissions.push({
                            id: this.permissions[i].id,
                            display_name: this.permissions[i].display_name,
                            checked: false
                        });
                    }
                }

                $('#roleModal').modal('show');
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                for(let i=0; i<this.permissions.length; i++){
                    this.form.checked_permissions.push({
                        id: this.permissions[i].id,
                        display_name: this.permissions[i].display_name,
                        checked: false
                    });
                }
                $('#roleModal').modal('show');
            },
            createRole () {
                this.$Progress.start();
                this.form.post('api/role')
                .then( () => {
                    $('#roleModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm nhóm quyền thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            updateRole () {
                this.$Progress.start();
                this.form.put('api/role/'+this.form.id)
                .then( () =>{
                    $('#roleModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Sửa nhóm quyền thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteRole (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa nhóm quyền này?",
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
                            this.form.delete('api/role/'+id)
                            .then( () => {
                                Swal.fire( 'Xóa thành công!', 'Bạn đã xóa nhóm quyền thành công', 'success' );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa nhóm quyền!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            sanitizeTitle: function(title) {
                var slug = "";
                // Change to lower case
                var titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');
                
                return slug;
            },
            convertName () {
                this.form.name = this.sanitizeTitle(this.form.display_name);
            },
            searchit: _.debounce( () => {
                Fire.$emit('Searching');
            }, 500)
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            Fire.$on('Searching',() => {
                let query = this.search;
                if(query){
                    axios.get('api/findRole?q='+query)
                    .then( (data) => {
                        this.roles = data.data;
                    })
                    .catch( () =>{
                        
                    });
                }else{
                    this.loadRoles();
                }
            });

            this.loadRoles();
            this.loadPermissions();
            
            Fire.$on('AfterCreate',() => { this.loadRoles(); });
        }
    }
</script>
