<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 blue">Thông tin công ty</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                form: new Form({
                    name: '',
                    address: '',
                    phone: '',
                    fax: '',
                    logo: '',
                    legal_representative: '',
                    position: '',
                    nationality: '',
                    website: '',
                })
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('api/company').then( ({ data }) => {this.form.fill(data)} );
                this.$Progress.finish();
            },
        },
        created () {
            this.loadData();
        }
    }
</script>
