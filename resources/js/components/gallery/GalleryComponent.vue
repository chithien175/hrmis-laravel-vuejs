<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageGallery()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-camera"></i> Bộ sưu tập ảnh</h5>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Bộ sưu tập ảnh</li>
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
                                                <tr v-for="gallery in galleries" :key="gallery.id">
                                                    <td>{{ gallery.id }}</td>
                                                    <td>{{ gallery.title }}</td>
                                                    <td>{{ gallery.slug }}</td>
                                                    <td>
                                                        <span v-if="gallery.publish == 'publish'" class="badge badge-success">Xuất bản</span>
                                                        <span v-else class="badge badge-danger">Bản nháp</span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" @click="editModal(gallery)">
                                                            <i class="fa fa-edit fa-fw"></i> Sửa
                                                        </button>
                                                        <button class="btn btn-sm btn-success" @click="openCustomImageModal(gallery.id)">
                                                            <i class="fa fa-edit fa-fw"></i> Tùy chỉnh ảnh
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" @click="deleteGallery(gallery.id)">
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
                            <code class="note-developer p-3" v-if="$gate.isSuperAdmin()">
                                Dùng cho lập trình - vui lòng tham khảo khi sử dụng!<br>
                                $sliders = getGalleryBySlug('slider-trang-chu');
                            </code>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Gallery Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="galleryModalLabel">{{ editmode ? 'Chỉnh sửa bộ sưu tập' : 'Thêm mới bộ sưu tập' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateGallery() : createGallery()" @keydown="form.onKeydown($event)">
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
        <!-- /. Gallery Modal -->

        <!-- Custom Image Modal -->
        <div class="modal fade" id="customImageModal" tabindex="-1" role="dialog" aria-labelledby="customImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="customImageModalLabel">Tùy chỉnh ảnh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form @submit.prevent="createCustomImage()" @keydown="formCustomImage.onKeydown($event)">
                                    <div class="form-group">
                                        <input v-model="formCustomImage.title" type="text" name="title" placeholder="Tiêu đề"
                                            class="form-control" :class="{ 'is-invalid': formCustomImage.errors.has('title') }">
                                        <has-error :form="formCustomImage" field="title"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" v-model="formCustomImage.description" placeholder="Mô tả" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImage" class="control-label">Ảnh</label>
                                        <img class="img-fluid" :src="getImagePhoto()" alt="Gallery picture">
                                        <input type="file" id="inputImage" ref="photoFileInput" @change="changeImagePhoto">
                                    </div>
                                    <button :disabled="formCustomImage.busy" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> Thêm mới</button>
                                </form>
                            </div>
                            <div class="col-md-8" v-if="isLoadingImages">
                                <vcl-facebook class="mb-3 mr-3" :height="100" v-for="index in 3" :key="index"></vcl-facebook>
                            </div>
                            <div class="col-md-8 list-images-gallery" v-if="!isLoadingImages">
                                <VueNestable v-model="galleryImages" @change="orderImages(galleryImages)">
                                    <div slot-scope="{ item }">
                                        <!-- Handler -->
                                        <VueNestableHandle :item="item">
                                        <i class="fas fa-arrows-alt blue"></i>
                                        </VueNestableHandle>

                                        <!-- Content -->
                                        <img :src="viewImage(item.image)" class="img-fluid view-image">
                                        <span>{{ item.title }} </span>
                                        <button class="btn btn-sm btn-danger float-right" @click="deleteImageGallery(item.id)">
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
    <div v-if="!$gate.isManageGallery()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                isLoading: true,
                isLoadingImages: true,
                editmode: false,
                galleries: {},
                form: new Form({
                    id: '', title: '', slug: '', publish: 'publish'
                }),
                formCustomImage: new Form({
                    title: '', description: '', image: 'gallery-image-default.jpg', gallery_id: '', order: ''
                }),
                search: '',
                galleryImages: [],
            }
        },
        methods: {
            loadData () {
                this.$Progress.start();
                axios.get('/api/gallery').then(({ data }) => { 
                    this.galleries = data;
                    this.isLoading = false;
                });
                this.$Progress.finish();
            },
            editModal (gallery) {
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(gallery);
                $('#galleryModal').modal('show');
            },
            newModal () {
                this.editmode = false;
                this.form.reset();
                this.form.clear();

                $('#galleryModal').modal('show');
            },
            createGallery () {
                this.$Progress.start();
                this.form.slug = this.sanitizeTitle(this.form.slug);
                this.form.post('/api/gallery')
                .then( () => {
                    $('#galleryModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm bộ sưu tập ảnh thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            updateGallery () {
                this.$Progress.start();
                this.form.slug = this.sanitizeTitle(this.form.slug);
                this.form.put('/api/gallery/'+this.form.id)
                .then( () =>{
                    $('#galleryModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Chỉnh sửa bộ sưu tập ảnh thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteGallery (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa bộ sưu tập ảnh này?",
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
                            this.form.delete('../api/gallery/'+id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa bộ sưu tập ản thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa bộ sưu tập ản!", "Vui lòng liên hệ admin xử lý.", "warning");
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
                this.form.slug = this.sanitizeTitle(this.form.title);
            },
            searchit: _.debounce( () => {
                Fire.$emit('Searching');
            }, 500),
            getImagesByGalleryId(id){
                this.isLoadingImages = true;
                axios.get('/api/getImagesByGalleryId/'+id).then(({ data }) => { 
                    this.galleryImages = data;
                    this.isLoadingImages = false;
                });
            },
            openCustomImageModal(id) {
                this.formCustomImage.reset();
                this.formCustomImage.clear();
                this.$refs.photoFileInput.value = '';
                this.formCustomImage.gallery_id = id;
                $('#customImageModal').modal('show');
                this.getImagesByGalleryId(id);
            },
            createCustomImage() {
                this.$Progress.start();
                this.formCustomImage.order = this.galleryImages.length + 1;
                this.formCustomImage.post('/api/createCustomImageGallery')
                .then( () => {
                    this.formCustomImage.title = '';
                    this.formCustomImage.description = '';
                    this.$refs.photoFileInput.value = '';
                    this.formCustomImage.image = 'gallery-image-default.jpg';
                    this.getImagesByGalleryId(this.formCustomImage.gallery_id);
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm ảnh tùy chỉnh thành công'
                    });
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
            },
            orderImages(galleryImages){
                this.$Progress.start();
                axios.post('/api/orderImagesGallery', {'galleryImages': galleryImages})
                .then( () =>{
                    Toast.fire({
                        type: 'success',
                        title: 'Sắp xếp ảnh thành công'
                    });
                    this.$Progress.finish();
                })
                .catch( () =>{
                    this.$Progress.fail();
                });
            },
            deleteImageGallery (id) {
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa ảnh này?",
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
                            axios.post('../api/deleteImageGallery/'+id)
                            .then( () => {
                                axios.get('/api/getImagesByGalleryId/'+this.formCustomImage.gallery_id).then(({ data }) => { 
                                    this.galleryImages = data;
                                });
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa ảnh thành công',
                                    'success'
                                );
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa ảnh!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            },
            changeImagePhoto (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 5000000){
                    reader.onloadend = (file) => {
                        this.formCustomImage.image = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Vui lòng tải ảnh dưới 5MB'
                    });
                }
            },
            getImagePhoto(){
                return (this.formCustomImage.image.indexOf('base64') != -1) ? this.formCustomImage.image : "../images/gallery/"+this.formCustomImage.image ;
            },
            viewImage(image){
                return "../images/gallery/"+image ;
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
                    axios.get('/api/findGallery?q='+query)
                    .then( (data) => {
                        this.galleries = data.data;
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
.list-images-gallery .view-image{
    width: 70px;
    margin-right: 10px;
}
.list-images-gallery .nestable-item-content{
    height: 100%;
}
</style>
