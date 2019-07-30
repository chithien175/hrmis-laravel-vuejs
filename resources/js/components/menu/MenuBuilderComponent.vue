<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMenu() && $gate.isMenuModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="far fa-compass"></i> Mục trình đơn - ({{ menu.name }})</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item"><router-link to="/admin/menu"> Trình đơn</router-link></li>
                            <li class="breadcrumb-item active">Mục trình đơn</li>
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
                                        <VueNestable v-model="menu.parent_items" @change="changeItem(menu)">
                                            <div slot-scope="{ item }">
                                                <!-- Handler -->
                                                <VueNestableHandle :item="item">
                                                <i class="fas fa-arrows-alt blue"></i>
                                                </VueNestableHandle>

                                                <!-- Content -->
                                                <span>{{ item.title }}</span>
                                                <button class="btn btn-sm btn-danger float-right" @click="deleteItem(item.id)">
                                                    <i class="fa fa-trash fa-fw"></i> Xóa
                                                </button>
                                                <button class="btn btn-sm btn-primary float-right mr-1" @click="editModal(item)">
                                                    <i class="fa fa-edit fa-fw"></i> Sửa
                                                </button>
                                            </div>
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

        <!-- Item Modal -->
        <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="itemModalLabel">{{ editmode ? 'Chỉnh sửa mục trình đơn' : 'Thêm mới mục trình đơn' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateItem() : createItem()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputTitle">Tên mục trình đơn</label>
                                        <input v-model="form.title" type="text" name="title"
                                            placeholder="Tên mục trình đơn"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputType">Loại đường dẫn</label>
                                        <select name="type" v-model="form.type" class="form-control">
                                            <option value="url">Đường dẫn tĩnh</option>
                                            <option value="route">Đường dẫn động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" v-show="form.type == 'url'">
                                    <div class="form-group">
                                        <label for="inputUrl">Đường dẫn tĩnh</label>
                                        <input v-model="form.url" type="text" name="url"
                                            placeholder="Static URL"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12" v-show="form.type == 'route'">
                                    <div class="form-group">
                                        <label for="inputRoute">Đường dẫn động</label>
                                        <input v-model="form.route" type="text" name="route"
                                            placeholder="Dynamic Route"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12" v-show="form.type == 'route'">
                                    <div class="form-group">
                                        <label for="inputParameters">Thông số đường dẫn (nếu có)</label>
                                        <textarea v-model="form.parameters" rows="3" name="parameters"
                                            placeholder='{"key": "value"}'
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputIconClass">Biểu tượng <a href="https://fontawesome.com/icons" target="_blank">(FontAwesome)</a></label>
                                        <input v-model="form.icon_class" type="text" name="icon_class"
                                            placeholder="Icon Class (tùy chọn)"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputColor">Màu RGB hoặc Hex (tùy chọn)</label>
                                        <input v-model="form.color" type="color" name="color"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputTitle">Mở trong</label>
                                        <select name="target" v-model="form.target" class="form-control">
                                            <option value="_self">Cùng tab / cửa sổ</option>
                                            <option value="_blank">Tab / cửa sổ mới</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Hủy</button>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> {{ editmode ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /. Item Modal -->
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
                form: new Form({
                    menu_id: this.$route.params.menu_id,
                    id: '', 
                    title: '', 
                    type: 'url',
                    url: '', 
                    route: '', 
                    parameters: '', 
                    icon_class: '', 
                    color: '#333333', 
                    target: '_self',
                    order: ''
                }),
                menu: {},
                editmode: false,
                isLoading: true,
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/menu/show/' + this.$route.params.menu_id).then(({ data }) => { 
                    this.menu = data;

                    this.isLoading = false; 
                });
                this.$Progress.finish();
            },
            editModal (item) {
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(item);
                this.form.menu_id = this.menu.id;
                $('#itemModal').modal('show');
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                this.form.clear();
                this.form.menu_id = this.menu.id;
                this.form.order = this.menu.parent_items.length + 1;
                $('#itemModal').modal('show');
            },
            createItem () {
                this.$Progress.start();
                axios.post('/api/menu/item', this.form)
                .then( () => {
                    $('#itemModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm mục trình đơn thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( (errors) => {
                    Toast.fire({
                        type: 'error',
                        title: 'Nhập tên mục trình đơn'
                    });
                    this.$Progress.fail();
                    // console.log(errors);
                }); 
            },
            updateItem(){
                this.$Progress.start();
                axios.put('/api/menu/item/'+this.form.id, this.form)
                .then( () =>{
                    $('#itemModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Chỉnh sửa trình đơn thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
                
            },
            deleteItem(id){
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn xóa mục trình đơn này sẽ xóa các mục con của nó!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa ngay!',
                    cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if(result.value){
                            // Send request to the server
                            this.$Progress.start();
                            axios.delete('/api/menu/item/'+id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa mục trình đơn thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa mục trình đơn!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                }); 
            },
            changeItem(menu){
                // console.log(menu);
                this.$Progress.start();
                axios.post('/api/menu/item/sort', this.menu)
                .then( () =>{
                    Toast.fire({
                        type: 'success',
                        title: 'Sắp xếp mục trình đơn thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
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
