<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block">



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:0px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#" @click="mainMenu('chart')">Trend analysis of Pre-Primary schools</a></li>
    <li class="breadcrumb-item"><a href="#"  @click="mainMenu('table')">TABLE VIEW</a></li>
    </ul>
</nav>




<div style="padding:0px;">

<div class="row g-gs" style="padding:0px;">


<div class="col-sm-12 col-lg-12 col-xxl-12" style="padding:0;">

<div class="card h-100" style="border-radius:0;padding:50px;padding-top:0;" v-if="menu==='chart'">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title"> Trend analysis of Pre-Primary schools FY 2014/2015 to 2016/2017 </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Sort (FY)</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>2014/2015</span></a></li>
                                                                        <li><a href="#"><span>2015/2016</span></a></li>
                                                                        <li><a href="#"><span>2016/2017</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="traffic-channel">






<column-chart :data="[
['FY 2014/2015', 6000],
['FY 2015/2016', 7000],
['FY 2016/2017', 7500],
['FY 2017/2018', 0],
['FY 2018/2019', 0],
['FY 2019/2020', 0],

]"
:stacked="true" thousands="," xtitle="No. of ECDs " ytitle="No. of Nursery"
:colors="[['#FDD835','#17A589','#3498DB','#DC7633','#90A4AE','#3949AB']]" :download="true" :min="500" :max="8000" ></column-chart>





                                                <div class="table-responsive" style="margin-top:20px;">
                                                    <table class="table" style="border:solid thin #dbdfea;">
                                                        <thead>
                                                            <tr>

                                                                <th scope="col">FY 2014/2015</th>
                                                                <th scope="col">FY 2015/2016</th>
                                                                <th scope="col">FY 2016/2017</th>
                                                                <th scope="col">FY 2017/2018</th>
                                                                <th scope="col">FY 2018/2019</th>
                                                                <th scope="col">FY 2019/2020</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>5000</td>
                                                                <td>5900</td>
                                                                <td>7000</td>
                                                                <td>0</td>
                                                                <td>0</td>
                                                                <td>0</td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>














                                                    </div><!-- .traffic-channel -->
                                                </div>
</div>

<div v-else-if="menu==='table'">

<PrePrimaryDistribution/>

</div>



</div>








<div class="col-sm-12 col-lg-12 col-xxl-12">







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
