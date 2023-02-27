<template>
    <div class="row g-gs" style="padding-bottom:10px;">


                                        <div class="col-md-6 col-xxl-6">
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







                                        <div class="col-md-6 col-xxl-6">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner mb-n2" style="background:#ECEFF1;">
                                                    <div class="card-title-group" >
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">INFRASTRUCTURE DEVELOPMENT</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="padding-top:20px;">


<pie-chart :donut="true" :data="[['Health',10], ['Sports', 30],['Equipment',10],['Classrooms',60]]"></pie-chart>



                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->




    </div>
</template>
