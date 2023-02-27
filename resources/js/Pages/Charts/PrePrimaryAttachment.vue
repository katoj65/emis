<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#" @click="mainMenu('chart')">Pre-Primary schools Attachment</a></li>
    <li class="breadcrumb-item"><a href="#"  @click="mainMenu('table')">TABLE VIEW</a></li>
    </ul>
</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div v-if="menu==='chart'">

<div class="card h-100" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title"> Pre-Primary schools attached to the main primary schools </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Filter</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Registerd</span></a></li>
                                                                         <li><a href="#"><span>Not Registered</span></a></li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel" style="float:left;">






<pie-chart :data="[['Registered', 65], ['Not Registered', 35]]"></pie-chart>
















                                                    </div><!-- .traffic-channel -->
                                                </div>
</div>




</div>

<div v-else-if="menu==='table'">



<PrePrimarySchoolAttachment/>






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
import PrePrimarySchoolAttachment from '../DataTable/PrePrimarySchoolAttachment';
export default {
components:{
PrePrimarySchoolAttachment,
},



data(){
    return{
    menu:'chart',
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
