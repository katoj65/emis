<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">

<blockquote class="blockquote" style="padding:0;margin:0;">
  <p class="mb-0" style="padding:0;margin:0;'">
 <em class="icon ni ni-upload-cloud"></em>  Document Templates

<UploadDocument/>

      </p>
</blockquote>



</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div>





<div class="card card-full">
<!-- <sub-menu v-bind="{subMenu}"/>-->
<!-- .nk-ibx-head -->

<div class="nk-block" style="padding:10px;">
<div class="nk-fmg-listing nk-block" style="border:none;">

<div class="toggle-expand-content expanded" data-content="recent-files" style="border:none;">
<div class="nk-files nk-files-view-group" style="border:none;">


<div class="nk-files-group">


<div class="card border" style="margin-top:10px;border-radius:0;">
<div class="nk-files-list" style="padding-left:20px;margin:0;">

<div class="nk-file-item nk-file" v-for="n in 30" style="border-bottom:solid #dbdfea 1px; margin:0; border-top:none;border-left:none;border-right:none;border-radius:0px ;">
<div class="nk-file-info">
<div class="nk-file-title">
<div class="nk-file-icon">
<span class="nk-file-icon-type">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
<path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#36c684"></path>
<path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#95e5bd"></path>
<path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#fff"></path></svg>
</span>
</div>


<div class="nk-file-name">
<div class="nk-file-name-text">
<a href="#" class="title">Update Data.xlsx</a>
<div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
</div>
</div>


</div>
<ul class="nk-file-desc">
<li class="date">Yesterday</li>
<li class="size">235 KB</li>
<li class="members">3 Members</li>
</ul>
</div>
<div class="nk-file-actions">
<div class="dropdown">
<a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
<div class="dropdown-menu dropdown-menu-right">
<ul class="link-list-plain no-bdr">
<li><a href="#file-details" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Details</span></a></li>
<li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>
<li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>
<li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>
<li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
<li><a href="#"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>
<li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
</ul>
</div>
</div>
</div>
</div><!-- .nk-file -->








</div>
</div>





</div>
</div><!-- .nk-files -->
</div>
</div>



















</div>

<!--end tab menu-->
</div>













</div>


</div>


</div>

</div>




</div>

        </div>

        <!--end tab menu-->
    </div>
</template>




<script>
import UploadDocument from '../Button/UploadDocument';
export default {
components:{
UploadDocument,
},



data(){
    return{
    menu:'',
    }
},


//methods
methods: {
mainMenu:function(item){
this.menu=item;
 }





},








}




</script>
