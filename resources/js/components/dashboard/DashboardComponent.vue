<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageDashboard()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item active">Bảng điều khiển</li>
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
                            <div class="col-lg-3 col-6" v-if="$gate.isBlogModule()">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ data.post_number }}</h3>
                                    <p>Bài viết</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <router-link to="/admin/post" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6" v-if="$gate.isEcommerceModule()">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>{{ data.product_number }}</h3>
                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly"></i>
                                </div>
                                <router-link to="/admin/product" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageDashboard()">
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
                isLoading: true,
                data: {}
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/dashboard').then( ({ data }) => {
                    this.data = data;
                    this.isLoading = false;
                });
                this.$Progress.finish();
            },
        },
        created() {
            this.loadData();
        }
    }
</script>
