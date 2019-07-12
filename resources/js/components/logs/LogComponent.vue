<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageLogs()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h5 class="m-0 blue"><i class="fas fa-clipboard-list"></i> Lịch sử hệ thống</h5>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                        <li class="breadcrumb-item active">Lịch sử hệ thống</li>
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
                    <div class="col-12">
                        <iframe class="log-iframe embed-responsive-item" src="http://hrmis.local/log-viewer" allowfullscreen></iframe>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageLogs()">
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
    .log-iframe{
        border: none;
        width: 100%;
        height: 400px;
    }
</style>
