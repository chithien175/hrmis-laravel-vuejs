<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageEcommerce() && $gate.isEcommerceModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-folder-open"></i> Danh mục sản phẩm</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                                <table class="table table-hover p-cate-table">
                                    <thead>
                                        <tr class="blue font-weight-bold">
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Đường dẫn tĩnh</th>
                                            <th>Ngày tạo</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="category in categories" :key="category.id">
                                            <td>{{ category.id }}</td>
                                            <td>{{ showName(category) }}</td>
                                            <td>{{ category.slug }}</td>
                                            <td><span class="badge bg-info">{{ category.created_at | formatDateTime }}</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" @click="editModal(category)">
                                                    <i class="fa fa-edit fa-fw"></i> Sửa
                                                </button>
                                                <button class="btn btn-sm btn-danger" v-show="category.id != 1" @click="deleteCategory(category.id)">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Category Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="categoryModalLabel">{{ editmode ? 'Chỉnh sửa chuyên mục' : 'Thêm mới chuyên mục' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategory() : createCategory()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input v-model="form.name" type="text" name="name"
                                            placeholder="Tên chuyên mục"
                                            @change="convertSlug"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="form.slug" type="text" name="slug"
                                            placeholder="Chuỗi cho đường dẫn tĩnh"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('slug') }">
                                        <has-error :form="form" field="slug"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputParentId" class="control-label">Chuyên mục hiện tại</label>
                                        <select name="parent_id" id="parent_id" v-model="form.parent_id" class="form-control" :class="{ 'is-invalid' : form.errors.has('publish') }">
                                            <option value="0">Trống</option>
                                            <option :value="should_show_category.id" v-for="should_show_category in should_show_categories" :key="should_show_category.id">{{ should_show_category.name }}</option>
                                        </select>
                                        <has-error :form="form" field="parent_id"></has-error>
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
        <!-- /. Category Modal -->
    </div>
    <div v-if="!$gate.isManageEcommerce() || !$gate.isEcommerceModule()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    mounted() {
        // console.log('Component mounted.')
    },
    data() {
        return {
            editmode: false,
            categories: {},
            should_show_categories:[],
            form: new Form({
                id: '', name: '', slug: '', parent_id: 0,
            }),
            search: '',
            isLoading: true,
        }
    },
    methods: {
        loadData () {
            this.$Progress.start();
            axios.get('/api/ecommerce/category').then(({ data }) => { 
                this.categories = data;
                this.isLoading = false; 
            });
            this.$Progress.finish();
        },
        editModal (category) {
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(category);
            this.should_show_categories = [];
            this.shouldShowCategories(category.id);
            $('#categoryModal').modal('show');
        },
        newModal () {
            this.editmode = false;
            this.form.reset();
            this.form.clear();
            this.should_show_categories = [];
            this.shouldShowCategories();
            $('#categoryModal').modal('show');
        },
        createCategory () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.post('../api/ecommerce/category')
            .then( () => {
                $('#categoryModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Thêm chuyên mục thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () => {
                this.$Progress.fail();
            }); 
        },
        updateCategory () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.put('../api/ecommerce/category/'+this.form.id)
            .then( () =>{
                $('#categoryModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Chỉnh sửa danh mục sản phẩm thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () =>{
                this.$Progress.fail();
            });
        },
        deleteCategory (id) {
            Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Bạn muốn xóa danh mục sản phẩm này?",
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
                        this.form.delete('../api/ecommerce/category/'+id)
                        .then( () => {
                            Swal.fire(
                                'Xóa thành công!',
                                'Bạn đã xóa danh mục sản phẩm thành công',
                                'success'
                            );
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        })
                        .catch( () => {
                            Swal("Lỗi xóa danh mục sản phẩm!", "Vui lòng liên hệ admin xử lý.", "warning");
                        });
                    }
            });
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
        searchit: _.debounce( () => {
            Fire.$emit('Searching');
        }, 500),
        shouldShowCategories (cate_id){
            for(let i=0; i<this.categories.length; i++){
                if(this.categories[i].parent_id == 0 && this.categories[i].id != cate_id){
                   this.should_show_categories.push({
                        id: this.categories[i].id,
                        name: this.categories[i].name,
                    }); 
                }
            }
        },
        showName($category){
            return ($category.parent_id == 0) ? $category.name : '-- '+$category.name;
        },
    },
    computed:{
        
    },
    created() {
        this.loadData();

        Fire.$on('Searching', () => {
            let query = this.search;
            if(query){
                this.$Progress.start();
                axios.get('/api/ecommerce/category/find?q='+query)
                .then( (data) => {
                    this.categories = data.data;
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
</style>
