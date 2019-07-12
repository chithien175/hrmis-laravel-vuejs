<template>
<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fa fa-plug"></i> Chức năng mở rộng</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Chức năng mở rộng</li>
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
                            <div class="col-md-4">
                                <div class="card card-widget widget-user widget-module">
                                    <div class="widget-user-header text-white"
                                        style="height:80px;"
                                        v-bind:class="[{ 'active': modules.blog }]"
                                    >
                                        <p-input class="p-switch p-fill" type="checkbox" color="success" v-model="modules.blog" @change="toggleModule('blog', 'Bài viết', modules.blog)"></p-input>
                                    </div>
                                    <div class="widget-user-image" style="top:25px;">
                                        <img class="img-circle" v-bind:src="'../images/module/' + images.blog" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="description-header">Bài viết - Blog</h5>
                                                <h6 class="description-text">Quản lý bài viết, thể loại</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
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
                modules: modules,
                images: {
                    blog: 'blog.png'
                },
                form: new Form({
                    slug: '', name: '', status: ''
                })
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                setTimeout( () => {
                    this.isLoading = false;
                    this.$Progress.finish();
                }, 1000);
            },
            toggleModule (slug, name, status) {
                this.$Progress.start();

                this.form.slug = slug;
                this.form.name = name;
                this.form.status = status;

                this.form.post('../api/module/toggle')
                .then( () => {
                    if(status){
                        Toast.fire({
                            type: 'success',
                            title: 'Đã bật chức năng '+name+' !'
                        });
                    }else{
                        Toast.fire({
                            type: 'success',
                            title: 'Đã tắt chức năng '+name+' !'
                        });
                    }
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                });
            }
        },
        created() {
            this.loadData();
        }
    }
</script>

<style>
    .widget-module .widget-user-header{
        background-color: #dddfe2;
    }
    .widget-module .active{
        background-color: #0e4d9a;
    }
</style>
