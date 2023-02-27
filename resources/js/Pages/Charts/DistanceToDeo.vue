<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block" >



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:15px;margin-bottom:10px;" class="border-bottom">
    <ul class="breadcrumb breadcrumb-pipe">
    <li class="breadcrumb-item"><a href="#">SCHOOL ATTACHMENT</a></li>
    <li class="breadcrumb-item"><a href="#">TABLE VIEW</a></li>
    </ul>
</nav>




<div style="padding:10px;">

<div class="row g-gs" style="padding:10px;">



<div class="col-sm-12 col-lg-12 col-xxl-12">







<div class="card h-100" style="border-radius:0;padding:50px;padding-top:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title"> Pre-primary enrolment by category and sex </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Filter</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li v-for="y in 15"><a href="#"><span>{{ y+9 }} km</span></a></li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">





<bar-chart :data="[['Grand Total', 14000], ['Below 10km', 6500], ['Above 50km', 1500],['40.1 - 50km', 1200],['30.1 - 40km', 1300],['20.1 30km', 2900],['10 - 20km', 4900]]"
 :min="5" :max="16000" xtitle="No. of Inspections" ytitle="Distance to Deo's Office" :download="true"></bar-chart>





   <div class="table-responsive" style="margin-top:20px;">
                                                    <table class="table" style="border:solid thin #dbdfea;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No- of Inspection</th>
                                                                <th scope="col">10 - 20 km</th>
                                                                <th scope="col">20.1 - 30 km</th>
                                                                <th scope="col">30.1 - 40 km</th>
                                                                <th scope="col">40.1 -50 km</th>
                                                                <th scope="col">Below 10 km</th>
                                                                <th scope="col">Grand Total</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="x in 5">
                                                                <td>5000</td>
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
