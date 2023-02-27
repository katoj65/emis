<template>
        <div class="card card-full">
        <!-- .nk-ibx-head -->

        <div class="nk-block" >



<div class="card-inner" style="padding:0;padding-top:35px;">

<nav style="border-bottom:solid thin #f5f6fa;padding-bottom:10px;margin-bottom:10px;" class="border-bottom">
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
                                                            <h6 class="title"> Early Childhood Pupil Enrolment by Age </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Filter</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Males</span></a></li>
                                                                        <li><a href="#"><span>Females</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">





 <GChart
      type="ColumnChart"
      :data="chartData"
      :options="chartOptions"
    />




   <div class="table-responsive" style="margin-top:20px;">
                                                    <table class="table" style="border:solid thin #dbdfea;">
                                                        <thead>
                                                            <tr>
                                                                <th style="">Gender</th>
                                                                <th scope="col">3 - 5 Years</th>
                                                                <th scope="col">Above 5 Years</th>
                                                                <th scope="col">Below 3 Years</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th style="border-left:solid 60px #1565C0">Female</th>
                                                                <td>5000</td>
                                                                <td>5900</td>
                                                                <td>7000</td>


                                                            </tr>
                                                            <tr>
                                                                <th style="border-left:solid 60px #F44336;">Male</th>
                                                                <td>5000</td>
                                                                <td>5900</td>
                                                                <td>7000</td>


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


<script>
import { GChart } from "vue-google-charts";
export default {
  name: "App",
  components: {
    GChart
  },
  data() {
    return {

      chartData: [
        ["Students", "Female", "Male"],
        ["Above 5 Years", 15000, 4000],
        ["Below 3 Years", 30100, 20460],
        ["Above 5 Years", 11000, 46000],


      ],
      options: {
        chart: {

        },

      }
    };
  }
};
</script>


