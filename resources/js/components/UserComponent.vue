<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Quản lý người dùng
                        <button class="btn btn-md btn-primary" @click="newModal()">
                        Thêm mới <i class="fas fa-user-plus fa-fw"></i>
                        </button>
                    </h1>
                    
                </div><!-- /.col -->
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
                            <h3 class="card-title m-0">Danh sách người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                            <tbody><tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Phân quyền</th>
                                <th>Tạo lúc</th>
                                <th>Tác vụ</th>
                            </tr>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.type | upText }}</td>
                                <td>{{ user.created_at | formatDate }}</td>
                                <td>
                                    <a href="#" title="Sửa" @click="editModal(user)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    |
                                    <a href="#" title="Xóa" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody></table>
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
                        <h5 class="modal-title" id="userModalLabel">{{ editmode ? 'Cập nhật người dùng' : 'Thêm mới người dùng' }}</h5>
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
                                <select name="type" id="type" v-model="form.type" class="form-control" :class="{ 'is-invalid' : form.errors.has('type') }">
                                    <option value="">Chọn nhóm phân quyền</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <has-error :form="form" field="type"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.password" type="password" name="password"
                                    placeholder="Mật khẩu"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">{{ editmode ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /. User Modal -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },
        methods: {
            loadUsers () {
                axios.get('api/user')
                .then(({ data }) => { this.users = data.data });
            },
            editModal (user) {
                this.editmode = true;
                this.form.reset();
                $('#userModal').modal('show');
                this.form.fill(user);
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
                    text: "Bạn muốn xóa người dùng này!",
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
            }
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterCreate',() => {
               this.loadUsers();
            });
        }
    }
</script>
