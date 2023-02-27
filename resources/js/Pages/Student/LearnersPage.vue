<template>
        <div class="card card-full">
   <sub-menu v-bind="{subMenu}"/>
        <!-- .nk-ibx-head -->

        <div class="nk-block" style="padding:10px; margin-top: 20px;">




<div>

<learners-table/>




</div>


        </div>

        <!--end tab menu-->
    </div>
</template>
<script>
import LearnersTable from '../DataTable/LearnersTable.vue';
import SubMenu from '../Dashboard/SubMenu.vue';

export default {
    metaInfo: { title: "School Information" },
    components: {
        LearnersTable,
        SubMenu,
    },



data() {
        return {
           subMenu:[

{item:'Summary Reports',url:'/dashboard',icon:'icon ni ni-chart-down'},
{item:'Schools',url:'/dashboard/schools',icon:'icon ni ni-chart-up'},
{item:'Enrolment',url:'/dashboard/enrolment',icon:'icon ni ni-chart-up'},
{item:'Teachers',url:'/dashboard/teachers',icon:'icon ni ni-chart-up'},
{item:'Districts',url:'/dashboard/districts',icon:'icon ni ni-chart-up'},



],
        };
    }





}
</script>
