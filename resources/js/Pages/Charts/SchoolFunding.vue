<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#" @click="mainMenu('chart')"> Pre-Primary schools by Registration status</a></li>
    <li class="breadcrumb-item"><a href="#"  @click="mainMenu('table')">TABLE VIEW</a></li>
    </ul>
</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div v-if="menu==='chart'">




<div class="card  h-100" style="border-radius:0;padding:50px;padding-top:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title"> Schools by Founding Body and Registration Status </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Sort</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Licenced</span></a></li>
                                                                        <li><a href="#"><span>Registered</span></a></li>
                                                                        <li><a href="#"><span>Not Registered</span></a></li>
                                                                        <li><a href="#"><span>Grand Total</span></a></li>



                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">





<bar-chart :data="[['Grand total',800],['SDA',100],['Islamic',400],['Government',300,'Entreprenuers',700],['CUO',500,],['Community',450],['Catholic',300]]" :colors="[['#b00','#43A047','#3949AB','#FFEE58','#6D4C41','#F9A825','#004D40']]" xtitle="Registration Status" ytitle="Founding Body"></bar-chart>



<div class="table-responsive bordered" style="margin-top:20px;border:solid thin #dbdfea;">
  <table class="table">
    <tr>
    <th>Status</th>
    <th>Catholic </th>
     <th>SDA </th>
      <th> Goverment</th>
       <th>Entreprenuers </th>
        <th>Community </th>
         <th>Islamic </th>
         <th>Grad Total </th>

    </tr>

<tr>
<td>Licenced</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
</tr>


<tr>
<td>Not register</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
</tr>


<tr>
<td>Registered</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
</tr>


<tr>
<td>Grand Total</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
<td>201</td>
</tr>



  </table>
</div>


















                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div>







</div>

<div v-else-if="menu==='table'">


<PrePrimaryRegistration/>



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
import PrePrimaryRegistration from '../DataTable/PrePrimaryRegistration';

export default {
components:{
PrePrimaryRegistration,
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
