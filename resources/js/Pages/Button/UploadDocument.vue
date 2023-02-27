<template>
<span>


<a href="#" class="btn btn-sm btn-primary" style="float:right;" data-toggle="modal" data-target="#modalDefault">
    <em class="icon ni ni-plus-round" style="margin-right:7px;"></em> Add Document</a>







<div class="modal fade" tabindex="-1" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Upload New Document</h5>
            </div>
            <div class="modal-body">


<div class="custom-file">
<input type="file" multiple="" class="custom-file-input" id="customFile">
<label class="custom-file-label" for="customFile">Choose file</label>
</div>



            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">

                    <a href="javasript:void(0)" class="btn btn-primary" @click="uploadFile()" data-dismiss="modal" aria-label="Close">Upload</a>
                </span>
            </div>
        </div>
    </div>
</div>






</span>
</template>



<script>
export default {
    data(){

        return{

submitFile:false,

        }
    },

    methods:{
    uploadFile:function(){
   
    }
    }
}
</script>
