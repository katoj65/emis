<template>
    <div class="row g-gs" style="padding-bottom:10px;">


                                        <div class="col-md-6 col-xxl-6">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">ACADEMIC INSTITUTIONS </h6>
                                                        </div>

                                                    </div>
                                                    <div>




  <pie-chart :data="[['Pre-primary',10], ['Primary', 30],['Secondary',40],['PTC',5],['BVT',5],['University',10]]" style="margin-top:25px;"></pie-chart>






                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->







                                        <div class="col-md-6 col-xxl-6">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner mb-n2">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">LEARNERS PERCENTAGE</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>


<column-chart :data="[['Boys', 65], ['Girls', 35], ['Special Needs', 12]]"></column-chart>



                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->




    </div>
</template>
