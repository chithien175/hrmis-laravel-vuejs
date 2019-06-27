<template>
<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thông tin cá nhân</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" :src="getProfilePhoto" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ form.name }}</h3>
                        <p class="text-muted text-center">{{ form.type | upText }}</p>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0">
                            <i class="fas fa-edit"></i>
                            Sửa thông tin cá nhân
                        </h3>
                        
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-12 control-label">Họ và tên</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputName" placeholder="Họ và tên" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-12 control-label">Địa chỉ Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Địa chỉ Email" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName2" class="col-sm-12 control-label">Mô tả ngắn (không bắt buộc)</label>
                                        <div class="col-sm-12">
                                            <textarea id="inputBio" class="form-control" rows="2" placeholder="Đoạn mô tả ngắn về bản thân" v-model="form.bio"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-sm-12 control-label">Ảnh đại diện (giới hạn 2MB)</label>
                                        <div class="col-sm-12">
                                            <input type="file" id="inputPhoto" placeholder="Địa chỉ Photo" @change="changePhoto">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-12 control-label">Mật khẩu (để trống nếu không thay đổi)</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Địa chỉ Password" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }">
                                            <has-error :form="form" field="password"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary" @click.prevent="updateProfile">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
</template>

<script>
    export default {
        data () {
            return {
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
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            loadProfile () {
                axios.get('api/profile').then( ({ data }) => {this.form.fill(data)} );
            },
            changePhoto (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 2MB'
                    });
                }
                
            },
            updateProfile () {
                this.$Progress.start();
                this.form.put('api/profile')
                .then( () => {
                    Toast.fire({
                        type: 'success',
                        title: 'Cập nhật thông tin thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                });
            }
        },
        computed:{
            getProfilePhoto(){
                return (this.form.photo.indexOf('base64') != -1) ? this.form.photo : "images/profile/"+this.form.photo ;
           },
        },
        created () {
            this.loadProfile();
            Fire.$on('AfterCreate', () => {
                this.loadProfile()
            })
        }
    }
</script>
