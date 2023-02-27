<template>
    <div style="margin:15px">



<student-statistics />
<Graphs />
<Barchart />
<Map />





    </div>
</template>

<script>
import StudentStatistics from "../SummaryReports/StudentStatistics";
import Infrastractures from "../SummaryReports/Infrastractures";
import Map from "../SummaryReports/Map";
import Graphs from "../SummaryReports/Graphs";
import Barchart from "../SummaryReports/Barchart";
import SchoolsTable from "../DataTable/SchoolsTable";
import LearnersTable from "../DataTable/LearnersTable";
import TeachersTable from "../DataTable/TeachersTable.vue";
import DistrictSchoolsTable from "../DataTable/DistrictSchoolsTable.vue";
import Search from "./Search";
import Enrollment from './Enrollment.vue';
import SubMenu from './SubMenu.vue';

export default {
    components: {
     StudentStatistics,
        Infrastractures,
        Map,
        Graphs,
        Barchart,
        SchoolsTable,
        LearnersTable,
        TeachersTable,
        DistrictSchoolsTable,
        Search,
        Enrollment,
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
    },


};
</script>
