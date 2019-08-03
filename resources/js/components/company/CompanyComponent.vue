<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageCompany()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h5 class="m-0 blue"><i class="fas fa-building"></i> Thông tin công ty</h5>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                        <li class="breadcrumb-item active">Thông tin công ty</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row" v-if="isLoading">
                    <div class="col-12">
                        <vcl-facebook class="mb-3 mr-3" :height="100" v-for="index in 6" :key="index"></vcl-facebook>
                    </div>
                </div>
                <div class="row" v-if="!isLoading">
                    <div class="col-md-3">
                        <!-- Company Logo -->
                        <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid" :src="getLogo" alt="Company logo picture">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#company" data-toggle="tab">Thông tin công ty</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#theme-options" data-toggle="tab">Tùy chỉnh giao diện</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#socials" data-toggle="tab">Mạng xã hội</a></li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="company">
                                        <form class="form-horizontal" @keydown="form.onKeydown($event)">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Tên công ty <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.name')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Tên công ty" v-model="form.name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSlogan" class="col-sm-12 control-label">Slogan <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.slogan')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputSlogan" placeholder="Slogan công ty" v-model="form.slogan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription" class="col-sm-12 control-label">Mô tả công ty <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.description')</code></label>
                                                <div class="col-sm-12">
                                                    <textarea rows="3" class="form-control" id="inputDescription" placeholder="Mô tả công ty" v-model="form.description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-sm-12 control-label">Địa chỉ văn phòng <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.address')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Địa chỉ văn phòng" v-model="form.address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-sm-12 control-label">Điện thoại <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.phone')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputPhone" placeholder="Điện thoại" v-model="form.phone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFax" class="col-sm-12 control-label">Fax <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.fax')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputFax" placeholder="Fax" v-model="form.fax">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Địa chỉ E-mail <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.email')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="inputEmail" placeholder="Địa chỉ E-mail" v-model="form.email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputWebsite" class="col-sm-12 control-label">Trang web <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.website')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Trang web" v-model="form.website">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLogo" class="col-sm-12 control-label">Logo công ty (giới hạn 2MB) <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.logo')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="file" accept="image/*" id="inputLogo" @change="changePhoto">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="theme-options">
                                        <form class="form-horizontal" @keydown="form.onKeydown($event)">
                                            <div class="form-group">
                                                <label for="inputSiteTitle" class="col-sm-12 control-label">Tiêu đề trang web <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.site_title')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputSiteTitle" placeholder="Tiêu đề trang web" v-model="form.site_title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputShowSiteName" class="col-sm-12 control-label">Hiển thị tiêu đề trang, ngăn cách bởi "-" ? <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.show_site_name')</code></label>
                                                <div class="col-sm-12">
                                                    <select v-model="form.show_site_name" id="showSiteName" class="form-control">
                                                        <option value="yes">Không</option>
                                                        <option value="no">Có</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSEOTitle" class="col-sm-12 control-label">SEO Tiêu đề <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.seo_title')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputSEOTitle" placeholder="SEO Tiêu đề trang chủ" v-model="form.seo_title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSEODescription" class="col-sm-12 control-label">SEO Mô tả <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.seo_description')</code></label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="inputSEODescription" placeholder="SEO Mô tả trang chủ" v-model="form.seo_description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFavicon" class="col-sm-12 control-label">Favicon (giới hạn 2MB) <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.favicon')</code></label>
                                                <div class="col-sm-12">
                                                    <div>
                                                        <img class="img-fluid" :src="getFavicon" alt="Company logo picture" style="width: 100px; height: auto;">
                                                    </div>
                                                    <input type="file" accept="image/*" id="inputFavicon" @change="changeFavicon">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="socials">
                                        <form class="form-horizontal" @keydown="form.onKeydown($event)">
                                            <div class="form-group">
                                                <label for="inputFacebook" class="col-sm-12 control-label">Facebook <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.facebook')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputFacebook" placeholder="Đường dẫn liên kết Facebook" v-model="form.facebook">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTwitter" class="col-sm-12 control-label">Twitter <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.twitter')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputTwitter" placeholder="Đường dẫn liên kết Twitter" v-model="form.twitter">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLinkedIn" class="col-sm-12 control-label">LinkedIn <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.linkedin')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputLinkedIn" placeholder="Đường dẫn liên kết Linkedin" v-model="form.linkedin">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputGooglePlus" class="col-sm-12 control-label">GooglePlus <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.googleplus')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputGooglePlus" placeholder="Đường dẫn liên kết Google Plus" v-model="form.googleplus">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputYoutube" class="col-sm-12 control-label">Youtube <code  v-if="$gate.isSuperAdmin()" class="note-developer">getFieldCompany('company.youtube')</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputYoutube" placeholder="Đường dẫn liên kết Youtube" v-model="form.youtube">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-md-12">
                                    <button :disabled="form.busy" type="submit" class="btn btn-sm btn-primary" @click.prevent="updateCompany"><i class="fas fa-check-circle"></i> Cập nhật</button>
                                </div>
                            </div>  
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageCompany()">
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
                form: new Form({
                    // Tab 1
                    name: '',
                    slogan: '',
                    description: '',
                    address: '',
                    phone: '',
                    fax: '',
                    website: '',
                    logo: '',
                    email: '',
                    // Tab 2
                    site_title: '',
                    show_site_name: 'no',
                    seo_title: '',
                    seo_description: '',
                    favicon: '',
                    // Tab 3
                    facebook: '',
                    twitter: '',
                    linkedin: '',
                    googleplus: '',
                    youtube: '',
                }),
                isLoading: true
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/company').then( ({ data }) => {
                    this.form.fill(data);
                    this.isLoading = false;
                });
                this.$Progress.finish();
            },
            changePhoto (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                        this.form.logo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 2MB'
                    });
                }
            },
            changeFavicon (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                        this.form.favicon = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 2MB'
                    });
                }
            },
            updateCompany () {
                this.$Progress.start();
                this.form.put('../api/company')
                .then( () => {
                    Toast.fire({
                        type: 'success',
                        title: 'Chỉnh sửa thông tin công ty thành công'
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
            getLogo(){
                return (this.form.logo.indexOf('base64') != -1) ? this.form.logo : "../images/company/"+this.form.logo ;
            },
            getFavicon(){
                return (this.form.favicon.indexOf('base64') != -1) ? this.form.favicon : "../images/company/"+this.form.favicon ;
            },
        },
        created () {
            this.loadData();
            Fire.$on('AfterCreate', () => {
                this.loadData()
            })
        }
    }
</script>
