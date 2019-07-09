<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMedia()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="void:javascript(0)"><i class="fas fa-sliders-h"></i> Chức năng cơ bản</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-photo-video"></i> Quản lý tập tin</li>
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
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageMedia()">
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
                isLoading: true
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
        },
        created() {
            this.loadData();
        }
    }
</script>

<style>

</style>
