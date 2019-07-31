<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManagePage()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-file-alt"></i> Trang</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Trang</li>
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
                                                    <th>Tiêu đề</th>
                                                    <th>Đường dẫn tĩnh</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tác vụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="page in pages" :key="page.id">
                                                    <td>{{ page.id }}</td>
                                                    <td>{{ page.title }} <span v-show="page.is_homepage" class="badge badge-primary">Trang chủ</span></td>
                                                    <td>{{ page.slug }}</td>
                                                    <td>
                                                        <span v-if="page.publish == 'publish'" class="badge badge-success">Xuất bản</span>
                                                        <span v-else class="badge badge-danger">Bản nháp</span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" @click="editModal(page)">
                                                            <i class="fa fa-edit fa-fw"></i> Sửa
                                                        </button>
                                                        <button class="btn btn-sm btn-success" @click="openCustomFieldModal(page.id)">
                                                            <i class="fa fa-edit fa-fw"></i> Trường tùy chỉnh
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" @click="deletePage(page.id)">
                                                            <i class="fa fa-trash fa-fw"></i> Xóa
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Page Modal -->
        <div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="pageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="pageModalLabel">{{ editmode ? 'Chỉnh sửa trang' : 'Thêm mới trang' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatePage() : createPage()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="inputTitle" class="control-label">Tiêu đề</label>
                                        <input v-model="form.title" type="text" name="title"
                                            @change="convertSlug"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSlug" class="control-label">Chuỗi cho đường dẫn tĩnh</label>
                                        <div class="">
                                            <input v-model="form.slug" type="text" name="slug"
                                            class="form-control col-md-6 d-inline-block" :class="{ 'is-invalid': form.errors.has('slug') }"><span>.html</span>
                                        </div>
                                        
                                        <has-error :form="form" field="slug"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputBody" class="control-label">Nội dung</label>
                                        <vue-editor v-model="form.body" useCustomImageHandler @imageAdded="handleImageAdded"></vue-editor>
                                        <has-error :form="form" field="body"></has-error>
                                    </div>

                                    <!-- Page Custom Fields -->
                                    <div v-if="editmode && pageFields.length>0" class="row">
                                        <hr>
                                        <div class="form-group col-12" v-for="field in pageFields" :key="field.id">
                                            <label for="inputTitle" class="control-label">{{ field.display_name }}</label>
                                            <input v-model="field.value" type="text" class="form-control" v-if="field.type == 'text'">
                                            <textarea v-model="field.value" class="form-control" rows="3" v-if="field.type == 'text_area'"></textarea>
                                            <vue-editor v-model="field.value" useCustomImageHandler @imageAdded="handleImageAdded" v-if="field.type == 'text_editor'"></vue-editor>
                                            <div class="" v-if="field.type == 'image'">
                                                <img class="img-fluid page-photo" :src="srcFieldPhoto(field.value)" :alt="field.display_name" v-if="field.value">
                                                <input class="form-control" type="file" @change="changeFieldPhoto($event, field.id)">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./ End Page Custom Fields -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPublish" class="control-label">Trạng thái</label>
                                        <select name="publish" id="publish" v-model="form.publish" class="form-control" :class="{ 'is-invalid' : form.errors.has('publish') }">
                                            <option value="publish">Xuất bản</option>
                                            <option value="draft">Bản nháp</option>
                                        </select>
                                        <has-error :form="form" field="publish"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control">
                                            <p-input class="p-switch p-fill" type="checkbox" color="primary" v-model="form.is_homepage">Trang chủ?</p-input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhoto" class="control-label">Ảnh đại diện</label>
                                        <img class="img-fluid page-photo" :src="getPagePhoto" alt="Page picture">
                                        <input class="form-control" type="file" id="inputPhoto" @change="changePhoto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button :disabled="form.busy" type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Hủy</button>
                            <button :disabled="form.busy" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> {{ editmode ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /. Page Modal -->

        <!-- Custom Field Modal -->
        <div class="modal fade" id="customFieldModal" tabindex="-1" role="dialog" aria-labelledby="customFieldModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="customFieldModalLabel">Trường tùy chỉnh (Dùng cho lập trình - vui lòng tham khảo khi sử dụng!)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form @submit.prevent="createCustomField()" @keydown="formCustomField.onKeydown($event)">
                                    <div class="form-group">
                                        <input v-model="formCustomField.name" type="text" name="name" placeholder="Tên trường (Vd: Tiêu Đề Banner)"
                                            class="form-control" :class="{ 'is-invalid': formCustomField.errors.has('name') }">
                                        <has-error :form="formCustomField" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="formCustomField.key" type="text" name="key" placeholder="Mã khóa trường. (Vd: about.title_banner)"
                                            class="form-control" :class="{ 'is-invalid': formCustomField.errors.has('key') }">
                                        <has-error :form="formCustomField" field="key"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <select v-model="formCustomField.type" class="form-control" :class="{ 'is-invalid': formCustomField.errors.has('type') }">
                                            <option disabled value="">Chọn loại trường</option>
                                            <option value="text">Text Box</option>
                                            <option value="text_area">Text Area</option>
                                            <option value="text_editor">Text Editor</option>
                                            <option value="image">Hình Ảnh</option>
                                        </select>
                                        <has-error :form="formCustomField" field="type"></has-error>
                                    </div>
                                    <button :disabled="formCustomField.busy" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> Thêm mới</button>
                                </form>
                            </div>
                            <div class="col-md-8" v-if="isLoadingFields">
                                <vcl-facebook class="mb-3 mr-3" :height="100" v-for="index in 3" :key="index"></vcl-facebook>
                            </div>
                            <div class="col-md-8 list-fields-page" v-if="!isLoadingFields">
                                <VueNestable v-model="pageFields" @change="orderFields(pageFields)">
                                    <div slot-scope="{ item }">
                                        <!-- Handler -->
                                        <VueNestableHandle :item="item">
                                        <i class="fas fa-arrows-alt blue"></i>
                                        </VueNestableHandle>

                                        <!-- Content -->
                                        <span>{{ item.display_name }} </span><code class="note-developer p-1">getFieldPage('{{ item.key }}')</code>
                                        <button class="btn btn-sm btn-danger float-right" @click="deleteFieldPage(item.id)">
                                            <i class="fa fa-trash fa-fw"></i> Xóa
                                        </button>
                                    </div>
                                </VueNestable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Custom Field Modal -->
    </div>
    <div v-if="!$gate.isManagePage()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                isLoading: true,
                isLoadingFields: true,
                editmode: false,
                pages: {},
                form: new Form({
                    id: '', title: '', slug: '', photo: 'page-image-default.jpg', body: '', publish: 'publish', counter: 0, user_id: '', is_homepage: false,
                }),
                formCustomField: new Form({
                    name: '', key: '', type: '', page_id: '', order: ''
                }),
                search: '',
                pageFields: [],
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/page').then(({ data }) => { 
                    this.pages = data;
                    this.isLoading = false;
                });
                this.$Progress.finish();
            },
            editModal (page) {
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(page);
                this.getFieldsByPageId(page.id);
                $('#pageModal').modal('show');
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                this.form.clear();

                $('#pageModal').modal('show');
            },
            createPage () {
                this.$Progress.start();
                this.form.slug = this.sanitizeTitle(this.form.slug);
                this.form.post('/api/page')
                .then( () => {
                    $('#pageModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm trang thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            updatePage () {
                this.$Progress.start();
                this.form.slug = this.sanitizeTitle(this.form.slug);
                this.form.put('/api/page/'+this.form.id)
                .then( () =>{
                    if(this.pageFields.length > 0){
                        axios.post('/api/updateFieldsPage', {'pageFields':this.pageFields}).then(({ data }) => { 
                            this.pageFields = [];
                        });
                    }
                    $('#pageModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Chỉnh sửa trang thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deletePage (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa trang này?",
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
                            this.form.delete('../api/page/'+id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa trang thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa trang!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            changePhoto (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 2MB'
                    });
                }
            },
            changeFieldPhoto(event, id){
                let fieldIndex = this.pageFields.findIndex(x => x.id === id);
                let file = event.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                        this.pageFields[fieldIndex].value = reader.result;
                        // console.log(fieldIndex);
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 2MB'
                    });
                }
            },
            sanitizeTitle: function(title) {
                var slug = "";
                // Change to lower case
                var titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');
                
                return slug;
            },
            convertSlug (){
                this.form.slug = this.sanitizeTitle(this.form.title);
            },
            handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
                // An example of using FormData
                // NOTE: Your key could be different such as:
                // formData.append('file', file)

                var formData = new FormData();
                formData.append("image", file);
                formData.append("module", 'page');

                axios({
                    url: "/api/handleImageAdded",
                    method: "POST",
                    data: formData
                })
                .then(result => {
                    let url = result.data.url; // Get url from response
                    Editor.insertEmbed(cursorLocation, "image", url);
                    resetUploader();
                })
                .catch(err => {
                    console.log(err);
                });
            },
            getFieldsByPageId(id){
                this.isLoadingFields = true;
                axios.get('/api/getFieldsByPageId/'+id).then(({ data }) => { 
                    this.pageFields = data;
                    this.isLoadingFields = false;
                });
            },
            openCustomFieldModal(id) {
                this.formCustomField.reset();
                this.formCustomField.clear();
                this.formCustomField.page_id = id;
                $('#customFieldModal').modal('show');
                this.getFieldsByPageId(id);
            },
            createCustomField() {
                this.$Progress.start();
                this.formCustomField.order = this.pageFields.length + 1;
                this.formCustomField.post('/api/createCustomFieldPage')
                .then( () => {
                    this.formCustomField.name = '';
                    this.formCustomField.key = '';
                    this.formCustomField.type = '';
                    this.getFieldsByPageId(this.formCustomField.page_id);
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm trường tùy chỉnh thành công'
                    });
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            orderFields(pageFields){
                this.$Progress.start();
                axios.post('/api/orderFieldsPage', {'pageFields': pageFields})
                .then( () =>{
                    Toast.fire({
                        type: 'success',
                        title: 'Sắp xếp trường thành công'
                    });
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteFieldPage (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa trường này?",
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
                            axios.post('../api/deleteFieldPage/'+id)
                            .then( () => {
                                axios.get('/api/getFieldsByPageId/'+this.formCustomField.page_id).then(({ data }) => { 
                                    this.pageFields = data;
                                });
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa trường thành công',
                                    'success'
                                );
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa trang!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            searchit: _.debounce( () => {
                Fire.$emit('Searching');
            }, 500),
            srcFieldPhoto(name){
                return (name.indexOf('base64') != -1) ? name : "../images/page/"+name;
            },
        },
        computed:{
            getPagePhoto(){
                return (this.form.photo.indexOf('base64') != -1) ? this.form.photo : "../images/page/"+this.form.photo ;
            },
        },
        created() {
            this.loadData();

            Fire.$on('Searching', () => {
                let query = this.search;
                if(query){
                    this.$Progress.start();
                    axios.get('/api/findPage?q='+query)
                    .then( (data) => {
                        this.pages = data.data;
                        this.$Progress.finish();
                    })
                    .catch( () =>{
                        this.$Progress.fail();
                    });
                }else{
                    this.loadData();
                }
            });

            Fire.$on('AfterCreate',() => {
                this.loadData();
            });
        }
    }
</script>

<style>
.page-photo{
    width: 100%;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
}
.note-developer{
    border-radius: 30px;    
    padding: 5px 10px;
    font-size: 11px;
    border: 0;
    position: relative;
    top: -2px;
    color: #c7254e;
    background-color: #f9f2f4;
    font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
}
</style>
