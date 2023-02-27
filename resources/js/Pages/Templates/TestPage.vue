<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#" @click="mainMenu('chart')">CHART VIEW</a></li>
    <li class="breadcrumb-item"><a href="#"  @click="mainMenu('table')">TABLE VIEW</a></li>
    </ul>
</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div v-if="menu==='chart'">



    Chart content




</div>

<div v-else-if="menu==='table'">



Table content































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
import PrePrimaryDistribution from '../DataTable/PrePrimaryDistribution';

export default {
components:{
PrePrimaryDistribution
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
