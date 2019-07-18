<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMenu() && $gate.isMenuModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="far fa-compass"></i> Trình đơn</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Trình đơn</li>
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
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="input-group input-group-sm">
                                                    <input class="form-control form-control-navbar" type="text" placeholder="Nhập tiêu đề tìm kiếm" aria-label="Search" v-model="search" @keyup="searchit">
                                                </div>
                                            </div>
                                            <div class="col-md-9 text-md-right">
                                                <button class="btn btn-sm btn-primary" @click="newModal()">
                                                <i class="fas fa-plus fa-fw"></i> Thêm mới
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="blue font-weight-bold">
                                                    <th>ID</th>
                                                    <th>Tên</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Tác vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="menu in menus" :key="menu.id">
                                                    <td>{{ menu.id }}</td>
                                                    <td>{{ menu.name }}</td>
                                                    <td><span class="badge bg-info">{{ menu.created_at | formatDateTime }}</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success" @click="builderModal(menu)">
                                                            <i class="fas fa-bars fa-fw"></i> Trình đơn
                                                        </button>
                                                        <button class="btn btn-sm btn-primary" @click="editModal(menu)">
                                                            <i class="fa fa-edit fa-fw"></i> Sửa
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" @click="deleteMenu(menu.id)">
                                                            <i class="fa fa-trash fa-fw"></i> Xóa
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div v-if="!$gate.isManageMenu() || !$gate.isMenuModule()">
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
                menus: {},
                form: new Form({
                    id: '', name: '',
                }),
                search: '',
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('../api/menu').then(({ data }) => { 
                    this.menus = data;
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
