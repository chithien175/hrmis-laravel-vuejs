<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMenu() && $gate.isMenuModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="far fa-compass"></i> Sắp xếp trình đơn - ({{ menu.name }})</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item"><router-link to="/admin/menu"> Trình đơn</router-link></li>
                            <li class="breadcrumb-item active">Sắp xếp trình đơn</li>
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
                                            <div class="col-md-8">
                                                <h6 class="mt-2 blue">Kéo và thả mục trình đơn bên dưới để sắp xếp theo ý muốn</h6>
                                            </div>
                                            <div class="col-md-4 text-md-right">
                                                <button class="btn btn-sm btn-primary" @click="newModal()">
                                                <i class="fas fa-plus fa-fw"></i> Thêm mới
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive">
                                        <!-- <ul>
                                            <li v-for="item in menu.items" :key="item.id">{{ item.id }}</li>
                                        </ul> -->
                                        <VueNestable v-model="nestableItems" @change="changeItem(nestableItems)">
                                            <template slot-scope="{ item }">
                                                <!-- Handler -->
                                                <VueNestableHandle :item="item">
                                                <i class="fas fa-arrows-alt blue"></i>
                                                </VueNestableHandle>

                                                <!-- Content -->
                                                <span>{{ item.text }}</span>
                                            </template>
                                        </VueNestable>
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
                params: this.$route.params,
                menu: {},
                editmode: false,
                isLoading: true,
                nestableItems: [
                    {
                    id: 0,
                    text: 'Giới thiệu'
                    }, {
                    id: 1,
                    text: 'Dịch vụ',
                    children: [{
                        id: 2,
                        text: 'Dịch vụ 1'
                    }]
                    }, {
                    id: 3,
                    text: 'Dự án'
                    }
                ]
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('../../../api/menu/' + this.params.menuId).then(({ data }) => { 
                    this.menu = data;
                    this.isLoading = false; 
                });
                this.$Progress.finish();
            },
            changeItem(nestableItems){
                console.log(nestableItems);
            }
        },
        created() {
            this.loadData();

            Fire.$on('AfterCreate',() => {
                this.loadData();
            });
        }
    }
</script>
<style>
/*
* Style for nestable
*/
.nestable {
  position: relative;
}
.nestable .nestable-list {
  margin: 0;
  padding: 0 0 0 40px;
  list-style-type: none;
}
.nestable > .nestable-list {
  padding: 0;
}
.nestable-item,
.nestable-item-copy {
  margin: 10px 0 0;
}
.nestable-item-content{
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 14px 15px 14px 0;
    color: #333;
    height: 50px;
    font-weight: 700;
}
.nestable-handle{
    margin-right: 10px;
    padding: 15px;
}
.nestable-item:first-child,
.nestable-item-copy:first-child {
  margin-top: 0;
}
.nestable-item .nestable-list,
.nestable-item-copy .nestable-list {
  margin-top: 10px;
}
.nestable-item {
  position: relative;
}
.nestable-item.is-dragging .nestable-list {
  pointer-events: none;
}
.nestable-item.is-dragging * {
  opacity: 0;
  filter: alpha(opacity=0);
}
.nestable-item.is-dragging:before {
  content: ' ';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(106, 127, 233, 0.274);
  border: 1px dashed #0e4d9a;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}
.nestable-drag-layer {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 100;
  pointer-events: none;
}
.nestable-drag-layer > .nestable-list {
  position: absolute;
  top: 0;
  left: 0;
  padding: 0;
  background-color: rgba(106, 127, 233, 0.274);
}
.nestable [draggable="true"] {
  cursor: move;
}
.nestable-handle {
  display: inline;
}
</style>
