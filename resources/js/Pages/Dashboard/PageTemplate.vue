<template>
    <div class="card card-full">
   <sub-menu v-bind="{subMenu}"/>
        <!-- .nk-ibx-head -->

        <div class="nk-block" style="padding:10px; margin-top: 20px;">


Some information



        </div>

        <!--end tab menu-->
    </div>
</template>

<script>

import SubMenu from './SubMenu.vue';
export default {
    components: {
     SubMenu,




    },
    data() {
        return {
           subMenu:[
{item:'menu 1',url:'menu1',icon:'icon ni ni-chart-down'},
{item:'menu 2',url:'menu2',icon:'icon ni ni-chart-up'},
{item:'menu3',url:'menu3',icon:'icon ni ni-chart-up'},

],
        };
    },


};
</script>
