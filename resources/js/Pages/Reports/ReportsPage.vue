<template>
    <div class="card card-full border" style="margin:15px;">

        <!-- .nk-ibx-head -->
 <div class="nk-block">




<div class="card-inner" style="padding:0;">
<div class="row g-gs" style="padding:15px;">
<div class="col-lg-6 col-xxl-12">
<div class="row g-gs">



<div class="col-sm-6 col-lg-12 col-xxl-4">



<ul>
<li> <router-link to="/school-distribution/pre-primary"> Pre-primary schools distribution from 2014/2015 to 2016/2017 </router-link> </li>
<li> <router-link to="/school/funding"> School funding </router-link> </li>
<li> <router-link to="/school/pre-primary-attached"> Pre-Primary schools attached to the main primary schools </router-link> </li>
<li> <router-link to="/school/distance-to-deo"> Schools by distance to DEO’s Office and Number of inspections </router-link> </li>
<li> <router-link to="/enrolment/grade-category"> Enrolment by Grade and School Category </router-link> </li>
<li> <router-link to="/enrolment/early-childhood"> Early Childhood Pupil Enrolment by Age </router-link> </li>
<li> <router-link to="/pupil/special-needs"> Special Needs Pupils in Pre-Primary Schools </router-link> </li>


<li><router-link to="/report/primary/enrolment-by-class">Primary school enrolment  by class  </router-link></li>
<li><router-link to="/report/primary/enrolment-by-age">Primary school enrolment by age </router-link></li>
<li><router-link to="/report/primary/enrolment-by-nationality-age">Primary school enrolment by nationality and age </router-link></li>
<li><router-link to="/report/primary/enrolment-by-nationality-class">Primary school enrolment by nationality and class </router-link></li>
<li><router-link to="/report/primary/enrolment-by-region">Primary school enrolment  by region  </router-link></li>



</ul>








</div><!-- .col -->

<div class="col-sm-6 col-lg-12 col-xxl-4">



</div><!-- .col -->



<div class="col-sm-6 col-lg-12 col-xxl-4">



</div><!-- .col -->







</div><!-- .row -->
</div><!-- .col -->

</div>










</div>


















































        </div>

        <!--end tab menu-->
    </div>
</template>

<script>
import SubMenu from '../Dashboard/SubMenu.vue';

export default {
    components: {
        SubMenu




    },
    data() {
        return {
           subMenu:[
{item:'Reports',url:'/reports',icon:'icon ni ni-chart-down'},
{item:'Table View Reports',url:'/reports/#',icon:'icon ni ni-chart-down'},
{item:'Graphical Reports',url:'/reports/#',icon:'icon ni ni-chart-up'},],


        }
    },




}
</script>
