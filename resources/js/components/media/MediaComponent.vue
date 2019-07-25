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
                                                <button class="btn btn-sm btn-primary">
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
                                    <div class="card-body media-wrapper" v-if="!media.length">
                                        <p class="p-3">Không tìm thấy tập tin nào!</p>
                                    </div>
                                    <div class="card-body media-wrapper" v-if="media.length">
                                        <div class="media-left">
                                            <ul class="media-list">
                                                <li class="media-item" v-for="item in media" :key="item.id">
                                                    <div class="file-link" :class="{selected:item.id == selected}" v-on:click="selectedItem(item)">
                                                        <div class="file-icon">
                                                            <div class="img-icon" :style="{ backgroundImage: 'url(\'' + getSrcImg(item) + '\')' }"></div>
                                                        </div>
                                                        <div class="file-detail">
                                                            <div class="image/jpeg">
                                                                <h4>{{ item.filename }}</h4> <small>
                                                                <span class="file_size">{{ item.size }} KB</span></small>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="media-right">
                                            <div class="detail_img">
                                                <div class="image/jpeg">
                                                    <img v-bind:src="getSrcImg(itemActive)"> <!----> <!----> <!----> <!---->
                                                </div>
                                            </div>
                                            <div class="detail_info">
                                                <div class="image/jpeg">
                                                    <span><h4>Title:</h4> <p>{{ itemActive.filename }}</p></span>
                                                    <span><h4>Type:</h4> <p>{{ itemActive.mime_type }}</p>
                                                    </span> <span><h4>Size:</h4><p><span class="selected_file_size">{{ itemActive.size }} KB</span></p></span> 
                                                    <span><h4>Public URL:</h4> <p><a v-bind:href="getSrcImg(itemActive)" target="_blank">Click Here</a></p></span> <span><h4>Last Modified:</h4> <p>{{ itemActive.created_at | formatDateTime }}</p></span>
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
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                                    v-on:vdropzone-success="vdzSuccess"
                                    v-on:vdropzone-queue-complete="vdzQueueComplete"
                                    :options="dropzoneOptions"
                                    :useCustomSlot=true>
                                        <div class="dropzone-custom-content">
                                            <span><i class="fas fa-cloud-upload-alt blue"></i></span>
                                            <h4 class="dropzone-custom-title blue">Kéo và thả / nhấp để tải lên nội dung!</h4>
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
            itemActive: {}
        }
    },
    methods: {
        loadData () {
            this.$Progress.start();
            axios.get('/api/mediaList').then(({ data }) => { 
                this.media = data;
                this.selected = (data[0]) ? data[0].id : 'undefined';
                this.itemActive = (data[0]) ? data[0] : {};
                this.isLoading = false; 
            });
            this.$Progress.finish();
        },
        deleteItem(item) {
            Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Bạn muốn xóa tập tin "+item.filename+"?",
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
        },
        selectedItem(item) {
            this.selected = item.id;
            this.itemActive = item;
        },
        openUploaderModal () {
            this.$refs.myVueDropzone.removeAllFiles();
            $('#uploadModal').modal('show');
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
                return '/'+item.directory+''+item.filename+'_thumb.'+item.extension;
            }
            
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
</style>
