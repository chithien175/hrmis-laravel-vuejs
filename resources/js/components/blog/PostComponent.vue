<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageBlog() && $gate.isBlogModule()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-file-alt"></i> Bài viết</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Bài viết</li>
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
                                            <th>Tiêu đề</th>
                                            <th>Đường dẫn tĩnh</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="post in posts.data" :key="post.id">
                                            <td>{{ post.id }}</td>
                                            <td>{{ post.title }}</td>
                                            <td>{{ post.slug }}</td>
                                            <td><span class="badge bg-info">{{ post.created_at | formatDateTime }}</span></td>
                                            <td>
                                                <span v-if="post.publish == 'publish'" class="badge badge-success">Xuất bản</span>
                                                <span v-else class="badge badge-danger">Bản nháp</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" @click="editModal(post)">
                                                    <i class="fa fa-edit fa-fw"></i> Sửa
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="deletePost(post.id)">
                                                    <i class="fa fa-trash fa-fw"></i> Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <pagination :data="posts" @pagination-change-page="loadData"></pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Post Modal -->
        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="postModalLabel">{{ editmode ? 'Chỉnh sửa bài viết' : 'Thêm mới bài viết' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatePost() : createPost()" @keydown="form.onKeydown($event)">
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
                                        <div>
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
                                        <label for="inputCategory" class="control-label">Chuyên mục</label>
                                        <div class="cate-list form-control">
                                            <p-check v-for="category in form.checked_categories" :key="category.id" class="p-default p-curve p-thick col-12 m-0 p-0" type="checkbox" color="primary-o" v-model="category.checked">{{ category.name }}</p-check>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhoto" class="control-label">Ảnh đại diện</label>
                                        <img class="img-fluid post-photo" :src="getPostPhoto" alt="Post picture">
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
        <!-- /. Post Modal -->
    </div>
    <div v-if="!$gate.isManageBlog() || !$gate.isBlogModule()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    mounted() {
        axios.get('/api/blog/category/list').then(({ data }) => { 
            this.categories = data;
        });
    },
    data() {
        return {
            editmode: false,
            posts: {},
            categories: {},
            form: new Form({
                id: '', title: '', slug: '', photo: 'post-image-default.jpg', body: '', publish: 'publish', counter: 0, user_id: '', checked_categories: []
            }),
            search: '',
            isLoading: true,
        }
    },
    methods: {
        loadData (page = 1) {
            this.$Progress.start();
            axios.get('/api/blog/post?page=' + page + '&per_page=10').then(({ data }) => { 
                this.posts = data;
                this.isLoading = false;
            });
            this.$Progress.finish();
        },
        editModal (post) {
            this.editmode = true;
            this.form.reset();
            this.form.clear();
            this.form.fill(post);

            this.form.checked_categories = [];
                
            for(let i=0; i<this.categories.length; i++){
                // console.log(_.findIndex(post.categories, this.categories[i]) >= 0);
                if(_.findIndex(post.categories, this.categories[i]) >= 0){
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
            $('#postModal').modal('show');
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

            $('#postModal').modal('show');
        },
        createPost () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.post('../api/blog/post')
            .then( () => {
                $('#postModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Thêm bài viết thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () => {
                this.$Progress.fail();
            }); 
        },
        updatePost () {
            this.$Progress.start();
            this.form.slug = this.sanitizeTitle(this.form.slug);
            this.form.put('../api/blog/post/'+this.form.id)
            .then( () =>{
                $('#postModal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Chỉnh sửa bài viết thành công'
                });
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch( () =>{
                this.$Progress.fail();
            });
        },
        deletePost (id) {
            Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Bạn muốn xóa bài viết này?",
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
                        this.form.delete('../api/blog/post/'+id)
                        .then( () => {
                            Swal.fire(
                                'Xóa thành công!',
                                'Bạn đã xóa bài viết thành công',
                                'success'
                            );
                            Fire.$emit('AfterCreate');
                            this.$Progress.finish();
                        })
                        .catch( () => {
                            Swal("Lỗi xóa bài viết!", "Vui lòng liên hệ admin xử lý.", "warning");
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
            formData.append("module", 'post');

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
    },
    computed:{
        getPostPhoto(){
            return (this.form.photo.indexOf('base64') != -1) ? this.form.photo : "../images/post/"+this.form.photo ;
        },
    },
    created() {
        this.loadData();

        Fire.$on('Searching', () => {
            let query = this.search;
            if(query){
                this.$Progress.start();
                axios.get('/api/blog/post/find?q='+query)
                .then( (data) => {
                    this.posts = data.data;
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
    .post-photo{
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
    }
    #postModal .cate-list{
        height: 80px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>
