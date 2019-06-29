<template>
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 blue">Nhóm quyền sử dụng</h1>
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
                            <h3 class="card-title m-0">Danh sách nhóm quyền</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

</template>

<script>
    export default {
        data() {
            return {
                roles: {}
            }
        },
        methods: {
            loadRoles () {
                axios.get('api/role').then(({ data }) => { 
                    // console.log(data);
                    this.roles = data; 
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.loadRoles();
            Fire.$on('AfterCreate',() => {
               this.loadRoles();
            });
        }
    }
</script>
