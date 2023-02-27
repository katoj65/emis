<template>
    <div class="card card-full">
        <div class="nk-ibx-head">
            <div class="nk-ibx-head-actions">
                <ul class="nk-ibx-head-tools g-1">


                        <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('institutions')"
                            ><em class="icon ni ni-undo"></em>All Schools</a
                        >
                    </li>



                    <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('pre-primary')"
                            ><em class="icon ni ni-undo"></em>Pre-Primary</a
                        >
                    </li>

                    <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('primary')"
                            ><em class="icon ni ni-undo"></em> Primary</a
                        >
                    </li>

                    <li class="d-none d-sm-block">
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('secondary')"
                            ><em class="icon ni ni-archived"></em> Secondary</a
                        >
                    </li>

                    <li class="d-none d-sm-block">
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('PTC')"
                            ><em class="icon ni ni-trash"></em> PTC</a
                        >
                    </li>
                    <li></li>

                    <li class="d-none d-sm-block">
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('BVTVET')"
                            ><em class="icon ni ni-trash"></em> BVTVET</a
                        >
                    </li>

                             <li class="d-none d-sm-block">
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('university')"
                            ><em class="icon ni ni-trash"></em> University</a
                        >
                    </li>



                    <li>
                        <div class="dropdown">
                            <a
                                href="#"
                                class="dropdown-toggle btn btn-icon btn-trigger"
                                data-toggle="dropdown"
                                ><em class="icon ni ni-more-v"></em
                            ></a>
                            <div class="dropdown-menu">
                                <ul class="link-list-opt no-bdr">


                                    <li>
                                        <a class="dropdown-item" href="#"
                                            ><em
                                                class="icon ni ni-archived"
                                            ></em
                                            ><span>Others</span></a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="nk-ibx-head-tools g-1">
                    <li>
                        <a
                            href="#"
                            class="btn btn-trigger btn-icon search-toggle toggle-search"
                            data-target="search"
                            @click="tabMethod('search')"
                            ><em class="icon ni ni-search"></em
                        ></a>
                    </li>

                    <li class="mr-n1 d-lg-none">
                        <a
                            href="#"
                            class="btn btn-trigger btn-icon toggle"
                            data-target="inbox-aside"
                            ><em class="icon ni ni-menu-alt-r"></em
                        ></a>
                    </li>
                </ul>
            </div>
            <div class="search-wrap" data-search="search">
                <div class="search-content">
                    <a
                        href="#"
                        class="search-back btn btn-icon toggle-search"
                        data-target="search"
                        ><em class="icon ni ni-arrow-left"></em
                    ></a>
                    <input
                        type="text"
                        class="form-control border-transparent form-focus-none"
                        placeholder="Search by user or message"
                    />
                    <button class="search-submit btn btn-icon">
                        <em class="icon ni ni-search"></em>
                    </button>
                </div>
            </div>
            <!-- .search-wrap -->
        </div>
        <!-- .nk-ibx-head -->

        <div class="nk-block" style="padding:10px; margin-top: 20px;">




<div>

<all-academic-institutions/>









</div>










        </div>

        <!--end tab menu-->
    </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import SchoolLayout from "./SchoolLayout";
import mapValues from "lodash/mapValues";
import throttle from "lodash/throttle";
import SchoolsTable from '../DataTable/SchoolsTable.vue';
import AllAcademicInstitutions from './AllAcademicInstitutions.vue';

export default {
    metaInfo: { title: "School Information" },
    layout: SchoolLayout,
    components: {
        Icon,
        SchoolsTable,
        AllAcademicInstitutions,

    },
    data() {
        return {
            tabMenu:{name:'institution',
            description:'some information'},

        };
    },

    methods: {
        tabMethod: function(option) {
            this.tabMenu.name = option;
        }
    }
};
</script>
