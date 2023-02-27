<template>
        <div class="card card-full">


<sub-menu v-bind="{subMenu}"/>




        <!-- .nk-ibx-head -->

        <div class="nk-block" style="padding:10px; margin-top: 20px;">

            <div>
Search results





            </div>


        </div>

        <!--end tab menu-->
    </div>
</template>

<script>

import SubMenu from './SubMenu.vue';

export default {
    metaInfo: { title: "School Information" },
    components: {

        SubMenu,

    },


data() {
        return {

subMenu:[
{item:'All Teachers',url:'all-teachers',icon:'icon ni ni-chart-down'},
{item:'Primary',url:'primary-teachers',icon:'icon ni ni-chart-up'},
{item:'Secondary',url:'secondary-teachers',icon:'icon ni ni-chart-up'},
{item:'Lecturers',url:'lecturers-teachers',icon:'icon ni ni-chart-up'},
{item:'Govt Paid',url:'government-teachers',icon:'icon ni ni-chart-up'},
{item:'Special Needs',url:'special-needs-teachers',icon:'icon ni ni-chart-up'},
],

        };
    },


};
</script>
