<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#" @click="mainMenu('menu1')">USER INFORMATION</a></li>
    <li class="breadcrumb-item"><a href="#"  @click="mainMenu('menu2')">SECURITY PROFILE</a></li>
      <li class="breadcrumb-item"><a href="#"  @click="mainMenu('menu3')">SETTINGS</a></li>
    </ul>
</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div v-if="menu==='menu1'">


<BasicProfileInfo/>


</div>

<div v-else-if="menu==='menu2'">



Security Profile


</div>


<div v-else-if="menu==='menu3'">


Settings


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
import BasicProfileInfo from './BasicProfileInfo';

export default {
components:{
BasicProfileInfo,
},



data(){
    return{
    menu:'menu1',
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
