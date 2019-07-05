<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageDeveloper()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 blue">Developer</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageDeveloper()">
        <not-found></not-found>
    </div>
</div>
    

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
