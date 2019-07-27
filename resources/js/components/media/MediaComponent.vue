<template>
<div>
    <div class="content-wrapper" v-if="$gate.isManageMedia()">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h5 class="m-0 blue"><i class="fas fa-photo-video"></i> Ảnh và tập tin</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard"> Bảng điều khiển</router-link></li>
                            <li class="breadcrumb-item active">Ảnh và tập tin</li>
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
                                            <div class="col-md-12 text-md-right">
                                                <button class="btn btn-sm btn-primary" @click="openUploaderModal()">
                                                    <i class="fas fa-cloud-upload-alt fa-fw"></i> Tải lên tập tin
                                                </button>
                                                <button class="btn btn-sm btn-primary" @click="openCreateFolderModal()">
                                                    <i class="fas fa-folder fa-fw"></i> Thêm thư mục
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="fas fa-arrow-circle-right fa-fw"></i> Di chuyển
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="fas fa-paragraph fa-fw"></i> Đổi tên
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="deleteItem(itemActive)">
                                                    <i class="fas fa-trash fa-fw"></i> Xóa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body media-wrapper">
                                        <ol class="media_breadcrumb">
                                            <li class="item_breadcrumb" v-for="item in breadcrumb" :key="item" @click="clickBreadcrumb(item)">
                                                <span v-show="item == 'media'">Thư mục gốc <i class="fas fa-chevron-right"></i></span>
                                                <span v-show="item != 'media'">{{ item }} <i class="fas fa-chevron-right"></i></span>
                                            </li>
                                        </ol>
                                        <div class="media-left">
                                            <ul class="media-list">
                                                <li class="media-item" v-for="item in media" :key="item.id">
                                                    <div v-show="item.aggregate_type == 'folder'" class="file-link" :class="{selected:item.id == selected}" v-on:click="selectedItem(item)" v-on:dblclick="dbClickFolder(item)">
                                                        <div class="file-icon">
                                                            <div class="img-icon" :style="{ backgroundImage: 'url(\'' + getSrcImg(item) + '\')' }"></div>
                                                        </div>
                                                        <div class="file-detail">
                                                            <div class="image/jpeg">
                                                                <h4>{{ item.filename }}</h4> 
                                                                <small>Thư mục</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div v-show="item.aggregate_type != 'folder'" class="file-link" :class="{selected:item.id == selected}" v-on:click="selectedItem(item)">
                                                        <div class="file-icon">
                                                            <div class="img-icon" :style="{ backgroundImage: 'url(\'' + getSrcImg(item) + '\')' }"></div>
                                                        </div>
                                                        <div class="file-detail">
                                                            <div class="image/jpeg">
                                                                <h4>{{ item.filename }}</h4>
                                                                <small><span class="file_size">{{ item.size }} Bytes</span></small>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="media-right" v-if="media.length">
                                            <div class="detail_img">
                                                <div class="image/jpeg" v-if="itemActive.aggregate_type == 'image'">
                                                    <img v-bind:src="getSrcImg(itemActive)"> <!----> <!----> <!----> <!---->
                                                </div>
                                            </div>
                                            <div class="detail_info">
                                                <div class="image/jpeg">
                                                    <span><h4>Tên:</h4> <p>{{ itemActive.filename }}</p></span>
                                                    <span><h4>Loại:</h4> <p>{{ itemActive.aggregate_type }}/{{itemActive.extension}}</p>
                                                    </span> 
                                                    <span v-if="itemActive.aggregate_type != 'folder'"><h4>Kích thước:</h4><p><span class="selected_file_size">{{ itemActive.size }} Bytes</span></p></span> 
                                                    <span v-if="itemActive.aggregate_type == 'image'"><h4>Đường dẫn:</h4> <p><a v-bind:href="getSrcImg(itemActive)" target="_blank">Xem tại đây</a></p></span> <span v-if="itemActive.aggregate_type != 'folder'"><h4>Ngày tạo:</h4> <p>{{ itemActive.created_at | formatDateTime }}</p></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="uploadModalLabel">Tải lên tập tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="uploader-wrapper">
                                    <vue-dropzone ref="myVueDropzone" id="dropzone"
                                    v-on:vdropzone-sending="vdzSending"
                                    v-on:vdropzone-success="vdzSuccess"
                                    v-on:vdropzone-queue-complete="vdzQueueComplete"
                                    :options="dropzoneOptions"
                                    :useCustomSlot=true>
                                        <div class="dropzone-custom-content">
                                            <span><i class="fas fa-cloud-upload-alt blue"></i></span>
                                            <h4 class="dropzone-custom-title blue">Nhấp / Kéo - thả để tải lên!</h4>
                                        </div>
                                    </vue-dropzone>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Upload Modal -->
        <!-- Create Folder Modal -->
        <div class="modal fade" id="createFolderModal" tabindex="-1" role="dialog" aria-labelledby="createFolderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title blue" id="createFolderModalLabel">Thêm thư mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="createFolder()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input v-model="form.name" type="text" name="name"
                                        placeholder="Tên thư mục"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Đóng</button>
                            <button :disabled="form.busy" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /. Create Folder Modal -->
    </div>
    <div v-if="!$gate.isManageMedia()">
        <not-found></not-found>
    </div>
</div>

</template>

<script>
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    mounted() {
        // console.log('Component mounted.')
    },
    data() {
        return {
            isLoading: true,
            dropzoneOptions: {
                url: '/api/mediaUpload',
                thumbnailWidth: 150,
                maxFilesize: 1,
            },
            media: {},
            selected: '',
            itemActive: {},
            folder: 'media',
            breadcrumb: [],
            form: new Form({
                name: '', folder: '',
            }),
        }
    },
    methods: {
        loadData () {
            this.$Progress.start();
            axios.post('/api/mediaList', {'folder':this.folder}).then(({ data }) => { 
                this.media = data;
                this.selected = (data[0]) ? data[0].id : 'undefined';
                this.itemActive = (data[0]) ? data[0] : {};
                this.breadcrumb = this.folder.split("/");
                this.isLoading = false; 
            });
            this.$Progress.finish();
        },
        deleteItem(item) {
            if(item.aggregate_type != 'folder'){
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa tập tin '"+item.filename+"'?",
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
                            axios.delete('/api/mediaDestroy/'+item.id)
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa tập tin thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa tập tin!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            }else{
                Swal.fire({
                    title: 'Bạn chắc chứ?',
                    text: "Bạn muốn xóa thư mục '"+item.filename+"'?",
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
                            axios.post('/api/folderDestroy', {'folder':item.directory+'/'+this.itemActive.filename})
                            .then( () => {
                                Swal.fire(
                                    'Xóa thành công!',
                                    'Bạn đã xóa thư mục thành công',
                                    'success'
                                );
                                Fire.$emit('AfterCreate');
                                this.$Progress.finish();
                            })
                            .catch( () => {
                                Swal("Lỗi xóa thư mục!", "Vui lòng liên hệ admin xử lý.", "warning");
                            });
                        }
                });
            }
            
        },
        selectedItem(item) {
            this.selected = item.id;
            this.itemActive = item;
        },
        openCreateFolderModal () {
            this.form.reset();
            this.form.clear();
            $('#createFolderModal').modal('show');
        },
        createFolder () {
            this.$Progress.start();
                this.form.folder = this.folder;
                this.form.post('/api/folderCreate')
                .then( () => {
                    $('#createFolderModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Thêm thư mục thành công'
                    });
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch( () => {
                    this.$Progress.fail();
                }); 
        },
        openUploaderModal () {
            this.$refs.myVueDropzone.removeAllFiles();
            $('#uploadModal').modal('show');
        },
        vdzSending: function (file, xhr, formData) {
            formData.append('folder', this.folder);
        },
        vdzSuccess(file){
            // console.log(file);
        },
        vdzQueueComplete(file) {
            Fire.$emit('AfterCreate');
            $('#uploadModal').modal('hide');
            Toast.fire({
                type: 'success',
                title: 'Tải lên thành công!'
            });
        },
        getSrcImg(item){
            if(item){
                if(item.aggregate_type == 'image'){
                    return '/'+item.directory+''+item.filename+'.'+item.extension;
                }
                if(item.extension == 'folder'){
                    return '/images/media/default-folder-icon.png';
                }
                if(item.extension == 'zip'){
                    return '/images/media/default-zip-icon.png';
                }
                if(item.extension == 'txt'){
                    return '/images/media/default-txt-icon.png';
                }
                
                return '/images/media/default-file-icon.png';
            }
        },
        clickBreadcrumb(item){
            let num = 0;
            let temp = 'media';
            for(let i=0;i<this.breadcrumb.length;i++){
                if(this.breadcrumb[i] == item){
                    num = i;
                }
            }
            if(num > 0){
                for(let j=1; j<=num; j++){
                    temp += '/' + this.breadcrumb[j];
                }
            }
            
            this.folder = temp;
            Fire.$emit('AfterCreate');
        },
        dbClickFolder(item){
            this.folder = item.directory +'/'+ item.filename;
            Fire.$emit('AfterCreate');
            console.log(this.folder);
        },
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
.dropzone-custom-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.dropzone-custom-content span {
  font-size: 40px;
}

.dropzone-custom-content .dropzone-custom-title {
  margin-top: 0;
}

.media-wrapper{
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0;
}
.media-wrapper .media-left{
    -webkit-box-flex: 4;
    -ms-flex: 4;
    flex: 4;
    position: relative;
    min-height: 230px;
    padding: 10px;
}
.media-wrapper .media-right{
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    border-left: 1px solid #f1f1f1;
}
.media-wrapper .media-list{
    display: flex;
    list-style: none;
    width: 100%;
    margin: 0;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.media-wrapper .media-item{
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    width: 100%;
    min-width: 200px;
}
.media-wrapper .file-link{
    margin: 5px;
    padding: 5px;
    cursor: pointer;
    border-radius: 3px;
    border: 1px solid #ecf0f1;
    overflow: hidden;
    background: #f6f8f9;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.media-wrapper .file-link.selected,.media-wrapper .file-link:hover{
    color: rgb(255, 255, 255);
    background-color: #0e4d9a;
    border-color: #0a366b;
}
.media-wrapper .file-icon{
    text-align: center;
    padding-left: 0;
    margin-left: 0;
    margin-right: 5px;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
}
.media-wrapper .file-icon .img-icon{
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    display: inline-block;
    width: 100%;
    height: 100%;
}
.media-wrapper .file-detail{
    -webkit-box-flex: 2;
    -ms-flex: 2;
    flex: 2;
    overflow: hidden;
    width: 100%;
}
.media-wrapper .file-detail h4{
    margin-bottom: 2px;
    margin-top: 10px;
    max-height: 17px;
    height: 17px;
    overflow: hidden;
    font-size: 13px;
    text-overflow: ellipsis;
}
.media-wrapper .file-detail small{
    font-size: 10px;
    position: relative;
    top: -3px;
}
.media-right .detail_img {
    border-bottom: 1px solid #f1f1f1;
    background: #eee;
}
.media-right .detail_img img {
    width: 100%;
    height: auto;
    display: inline-block;
}
.media-right .detail_info {
    padding: 10px;
}
.media-right .detail_info span {
    display: block;
    clear: both;
}
.media-right .detail_info h4 {
    float: left;
    color: #bbb;
    margin: 3px 8px 0 0;
    padding-bottom: 2px;
    font-size: 12px;
}
.media-right .detail_info p {
    float: left;
    color: #444;
    margin-bottom: 0px;
    font-size: 12px;
}
.media-right .detail_info a {
    color: #0e4d9a;
}
.media-right .detail_info a:hover {
    text-decoration: none;
}

.media_breadcrumb{
    top: 0;
    background: #f0f0f0;
    padding-left: 20px;
    width: 100%;
    margin-top: 0;
    left: 0;
    padding-top: 7px;
    padding-bottom: 8px;
}
.media_breadcrumb .item_breadcrumb {
    cursor: pointer;
    transition: color .1s linear;
    position: relative;
    font-size: 12px;
    display: inline;
}
.media_breadcrumb .item_breadcrumb:hover {
    color: #0e4d9a;
}
.media_breadcrumb .item_breadcrumb:not(:last-child){
    font-weight: bold;
}
.media_breadcrumb .item_breadcrumb i{
    font-size: 10px;
}
.media_breadcrumb .item_breadcrumb:last-child i{
    display: none;
}
</style>
