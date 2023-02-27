<template>
    <div class="card card-full">
   <sub-menu v-bind="{subMenu}"/>
        <!-- .nk-ibx-head -->

        <div class="nk-block" style="padding:10px;">




<div class="nk-fmg-listing nk-block" style="border:none;">

                                            <div class="toggle-expand-content expanded" data-content="recent-files" style="border:none;">
                                                <div class="nk-files nk-files-view-group" style="border:none;">
                                                    <div class="nk-files-group" style="border:none;">







<all-academic-institutions/>


















                                                    </div>
                                                </div><!-- .nk-files -->
                                            </div>
                                        </div>

        </div>

        <!--end tab menu-->
    </div>
</template>

<script>
import SubMenu from '../Dashboard/SubMenu.vue';
import AllAcademicInstitutions from './AllAcademicInstitutions.vue';


export default {
components: {
SubMenu,
AllAcademicInstitutions



    },
    data() {
        return {

    subMenu:[
{item:'All schools',  url:'/dashboard/schools',   icon:''},
{item:'Other',  url:'/dashboard/schools#', icon:''},


],
        };
    },


};
</script>
