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
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash fa-fw"></i> Xóa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body media-wrapper">
                                            <div class="media-left">
                                                <ul class="media-list">
                                                    <li class="media-item" v-for="item in media" :key="item.id">
                                                        <div class="file-link">
                                                            <div class="file-icon">
                                                                <img v-bind:src="'/'+item.directory+'/'+item.filename+'_thumb.'+item.extension">
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
                                    v-on:vdropzone-queue-complete="queuecomplete"
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
            csrfHeaders: null,
            media: {},
        }
    },
    methods: {
        loadData () {
            this.$Progress.start();
            axios.get('/api/mediaList').then(({ data }) => { 
                this.media = data;
                this.isLoading = false; 
            });
            this.$Progress.finish();
        },
        openUploaderModal () {
            this.$refs.myVueDropzone.removeAllFiles();
            $('#uploadModal').modal('show');
        },
        queuecomplete(file) {
            $('#uploadModal').modal('hide');
        },
    },
    created() {
        this.loadData();
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
}
.media-wrapper .media-left{
    -webkit-box-flex: 4;
    -ms-flex: 4;
    flex: 4;
    position: relative;
    min-height: 230px;
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
    padding: 10px;
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
    max-width: 250px;
}
.media-wrapper .file-link{
    padding: 10px;
    margin: 10px;
    cursor: pointer;
    border-radius: 3px;
    border: 1px solid #ecf0f1;
    overflow: hidden;
    background: #f6f8f9;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
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
.media-wrapper .file-detail{
    -webkit-box-flex: 2;
    -ms-flex: 2;
    flex: 2;
    overflow: hidden;
    width: 100%;
}
.media-wrapper .file-icon img{
    width: 100%;
    height: 100%;
}
</style>
