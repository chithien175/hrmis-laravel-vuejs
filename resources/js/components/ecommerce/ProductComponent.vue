<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageEcommerce() && $gate.isEcommerceModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-dolly"></i> Sản phẩm</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                    <div class="col-12" v-if="isLoading">
                        <vcl-facebook class="mb-3 mr-3" :height="100" v-for="index in 6" :key="index"></vcl-facebook>
                    </div>
                    <div class="col-12" v-if="!isLoading">
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
                                            <th>Tên sản phẩm</th>
                                            <th>Đường dẫn tĩnh</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in products.data" :key="product.id">
                                            <td>{{ product.id }}</td>
                                            <td>{{ product.name }}</td>
                                            <td>{{ product.slug }}</td>
                                            <td><span class="badge bg-info">{{ product.created_at | formatDateTime }}</span></td>
                                            <td>
                                                <span v-if="product.publish == 'publish'" class="badge badge-success">Xuất bản</span>
                                                <span v-else class="badge badge-danger">Bản nháp</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" @click="editModal(product)">
                                                    <i class="fa fa-edit fa-fw"></i> Sửa
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="deleteProduct(product.id)">
                                                    <i class="fa fa-trash fa-fw"></i> Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <pagination :data="products" @pagination-change-page="loadData"></pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

         <!-- product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="productModalLabel">{{ editmode ? 'Chỉnh sửa sản phẩm' : 'Thêm mới sản phẩm' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateProduct() : createProduct()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="inputCode" class="control-label">Mã sản phẩm</label>
                                        <input v-model="form.code" type="text" name="code"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                                        <has-error :form="form" field="code"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Tên sản phẩm</label>
                                        <input v-model="form.name" type="text" name="name"
                                            @change="convertSlug"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSlug" class="control-label">Chuỗi cho đường dẫn tĩnh</label>
                                        <div>
                                            <input v-model="form.slug" type="text" name="slug"
                                            class="form-control col-md-6 d-inline-block" :class="{ 'is-invalid': form.errors.has('slug') }"><span>.html</span>
                                        </div>
                                        <has-error :form="form" field="slug"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription" class="control-label">Mô tả ngắn</label>
                                        <textarea class="form-control" v-model="form.description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputBody" class="control-label">Chi tiết sản phẩm</label>
                                        <vue-editor v-model="form.body" useCustomImageHandler @imageAdded="handleImageAdded"></vue-editor>
                                        <has-error :form="form" field="body"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputGallery" class="control-label">Thư viện ảnh</label>
                                        <div class="gallery-wrap">
                                            <div class="galleries-list" v-if="this.form.galleries.length > 0">
                                                <div class="gallery-item" v-for="gallery in this.form.galleries" :key="gallery">
                                                    <img class="img-fluid product-photo" :src="getGalleryPhoto(gallery)" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="file" multiple accept="image/*" @change="changeGallery">
                                    </div>
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
                                        <label for="inputPrice" class="control-label">Giá hiển thị</label>
                                        <input v-model="form.price" type="text" name="price"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCategory" class="control-label">Chuyên mục</label>
                                        <div class="cate-list form-control">
                                            <p-check v-for="category in form.checked_categories" :key="category.id" class="p-default p-curve p-thick col-12 m-0 p-0" type="checkbox" color="primary-o" v-model="category.checked">{{ category.name }}</p-check>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhoto" class="control-label">Ảnh đại diện</label>
                                        <img class="img-fluid product-photo" :src="getProductPhoto" alt="Product picture">
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
        <!-- /. Product Modal -->
    </div>
    <div v-if="!$gate.isManageEcommerce() && !$gate.isEcommerceModule()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    mounted() {
        axios.get('/api/ecommerce/category/list').then(({ data }) => { 
            this.categories = data;
        });
    },
    data() {
        return {
            editmode: false,
            dropzoneOptions: {
                // url: '/api/ecommerce/gallery',
                thumbnailWidth: 150,
                autoProcessQueue: false,
                addRemoveLinks: true,
            },
            products: {},
            categories: {},
            form: new Form({
                id: '', name: '', slug: '', code: '', photo: 'product-image-default.jpg', description: '', body: '', publish: 'publish', counter: 0, price: '', user_id: '', checked_categories: [], galleries: [],
            }),
            search: '',
            isLoading: true,
        }
    },
    methods: {
        loadData (page = 1) {
            this.$Progress.start();
            axios.get('/api/ecommerce/product?page=' + page + '&per_page=10').then(({ data }) => { 
                this.products = data;
                this.isLoading = false;
            });
            this.$Progress.finish();
        },
        editModal (product) {
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(product);

            this.form.checked_categories = [];
                
            for(let i=0; i<this.categories.length; i++){
                // console.log(_.findIndex(product.categories, this.categories[i]) >= 0);
                if(_.findIndex(product.categories, this.categories[i]) >= 0){
                    this.form.checked_categories.push({
                        id: this.categories[i].id,
                        name: this.categories[i].name,
                        checked: true
                    });
                }else{
                    this.form.checked_categories.push({
                        id: this.categories[i].id,
                        name: this.categories[i].name,
                        checked: false
                    });
                }
            }
            $('#productModal').modal('show');
        },
        newModal () {
            this.editmode = false;
            this.form.reset();
            this.form.clear();

            for(let i=0; i<this.categories.length; i++){
                this.form.checked_categories.push({
                    id: this.categories[i].id,
                    name: this.categories[i].name,
                    checked: false
                });
            }

            $('#productModal').modal('show');
        },
        createProduct () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.post('../api/ecommerce/product')
            .then( () => {
                $('#productModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Thêm sản phẩm thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () => {
                this.$Progress.fail();
            }); 
        },
        updateProduct () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.put('../api/ecommerce/product/'+this.form.id)
            .then( () =>{
                $('#productModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Chỉnh sửa sản phẩm thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () =>{
                this.$Progress.fail();
            });
        },
        deleteProduct (id) {
            Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Bạn muốn xóa sản phẩm này?",
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
                        this.form.delete('../api/ecommerce/product/'+id)
                        .then( () => {
                            Swal.fire(
                                'Xóa thành công!',
                                'Bạn đã xóa sản phẩm thành công',
                                'success'
                            );
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        })
                        .catch( () => {
                            Swal("Lỗi xóa sản phẩm!", "Vui lòng liên hệ admin xử lý.", "warning");
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
        changeGallery(e){
            let files = e.target.files;
            if(files){
                for (let i=0; i<files.length; i++){
                var reader = new FileReader();
                var vm = this;
                reader.onload = function(e){
                    vm.form.galleries.push(e.target.result);    // HERE
                }
                reader.readAsDataURL(files[i]);
                }
            }
            // console.log(vm.form.galleries);
            
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
            this.form.slug = this.sanitizeTitle(this.form.name);
        },
        handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
            // An example of using FormData
            // NOTE: Your key could be different such as:
            // formData.append('file', file)

            var formData = new FormData();
            formData.append("image", file);
            formData.append("module", 'product');

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
        searchit: _.debounce( () => {
            Fire.$emit('Searching');
        }, 500),
        getGalleryPhoto(gallery){
            return (gallery.indexOf('base64') != -1) ? gallery : "../images/product/"+gallery ;
        },
    },
    computed:{
        getProductPhoto(){
            return (this.form.photo.indexOf('base64') != -1) ? this.form.photo : "../images/product/"+this.form.photo ;
        }
    },
    created() {
        this.loadData();

        Fire.$on('Searching', () => {
            let query = this.search;
            if(query){
                this.$Progress.start();
                axios.get('/api/ecommerce/product/find?q='+query)
                .then( (data) => {
                    this.products = data.data;
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
    .gallery-wrap{
        width: 100%;
        padding: 10px;
        min-height: 150px;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .gallery-wrap .gallery-item{
        width: 20%;
    }
    .gallery-wrap .gallery-item img{
        width: 100%;
    }
    .product-photo{
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
    }
    #productModal .cate-list{
        height: 80px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>
