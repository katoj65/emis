<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:10px;">

<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div v-if="menu==='menu1'" style="padding:0;">


<NotificationList/>




</div>

<div v-else-if="menu==='menu2'">



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
import NotificationList from './NotificationList';

export default {
components:{
NotificationList,
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
