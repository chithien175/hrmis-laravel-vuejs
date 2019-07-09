<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageCompany()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 blue"><i class="fas fa-building"></i> Thông tin công ty</h1>
                </div><!-- /.col -->
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
                                    <li class="nav-item"><a class="nav-link" href="#legal-representative" data-toggle="tab">Người đại diện</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="company">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Tên công ty</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Tên công ty" v-model="form.name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-sm-12 control-label">Địa chỉ văn phòng</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="Địa chỉ văn phòng" v-model="form.address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-sm-12 control-label">Điện thoại</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputPhone" placeholder="Điện thoại" v-model="form.phone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFax" class="col-sm-12 control-label">Fax</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputFax" placeholder="Fax" v-model="form.fax">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputWebsite" class="col-sm-12 control-label">Trang web</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Trang web" v-model="form.website">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLogo" class="col-sm-12 control-label">Logo công ty (giới hạn 2MB)</label>
                                                <div class="col-sm-12">
                                                    <input type="file" id="inputLogo" @change="changePhoto">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="legal-representative">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputLegalRepresentative" class="col-sm-12 control-label">Họ và tên</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputLegalRepresentative" placeholder="Họ tên người đại diện" v-model="form.legal_representative">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPosition" class="col-sm-12 control-label">Chức vụ</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputPosition" placeholder="Chức vụ" v-model="form.position">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNationality" class="col-sm-12 control-label">Quốc tịch</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputNationality" placeholder="Quốc tịch" v-model="form.nationality">
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
                                    <button type="submit" class="btn btn-sm btn-primary" @click.prevent="updateCompany"><i class="fas fa-check-circle"></i> Cập nhật</button>
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
                    name: '',
                    address: '',
                    phone: '',
                    fax: '',
                    website: '',
                    logo: '',
                    legal_representative: '',
                    position: '',
                    nationality: '',
                }),
                isLoading: true
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('api/company').then( ({ data }) => {
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
            updateCompany () {
                this.$Progress.start();
                this.form.put('api/company')
                .then( () => {
                    Toast.fire({
                        type: 'success',
                        title: 'Cập nhật thông tin công ty thành công'
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
                return (this.form.logo.indexOf('base64') != -1) ? this.form.logo : "images/company/"+this.form.logo ;
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
