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
                            ><em class="icon ni ni-undo"></em>Learners Report</a
                        >
                    </li>



                    <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('pre-primary')"
                            ><em class="icon ni ni-undo"></em>Performance Report
                             </a
                        >
                    </li>

                    <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('primary')"
                            ><em class="icon ni ni-undo"></em> Activity Report</a
                        >
                    </li>


                        <li>
                        <a
                            href="#"
                            class="btn btn-icon btn-trigger"
                            @click="tabMethod('primary')"
                            ><em class="icon ni ni-undo"></em> Infrastructure Report </a>
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

        <div class="nk-block" style="padding:10px;">




<div>


 <div class="row g-gs" style="padding-bottom:10px;">



<div class="col-md-8 col-xxl-8">
<learners-table/>
</div><!-- .col -->











  <div class="col-md-4 col-xxl-4">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">TEACHERS  </h6>
                                                        </div>

                                                    </div>
                                                    <div>




<bar-chart :data="[['Private', 50], ['Government', 25],['Instructors',15],['Lecturers',20]]"></bar-chart>



                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->









 </div>













</div>










        </div>

        <!--end tab menu-->
    </div>
</template>

<script>

import LearnersTable from '../DataTable/LearnersTable.vue';



export default {
    metaInfo: { title: "School Information" },
    components: {

    LearnersTable,

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
