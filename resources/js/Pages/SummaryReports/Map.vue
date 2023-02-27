<template>
    <div class="row g-gs" style="padding-bottom:10px;">


                                        <div class="col-md-8 col-xxl-8">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">LEARNING INSTITUTIONS IN UGANDA</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Districts</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Kampala</span></a></li>
                                                                        <li><a href="#"><span>Kabaale</span></a></li>
                                                                        <li><a href="#"><span>Kitgum</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="analytics-map">

<geo-chart :data="[['United States', 44], ['Germany', 23], ['Brazil', 22]]"></geo-chart>



                                                        <table class="analytics-map-data-list">
                                                              <tr class="analytics-map-data">
                                                                <th class="country">INSTITUTION</th>
                                                                <th class="amount">NUMBER</th>
                                                                <th class="percent">PERCENTAGE</th>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">Pre-Primary Schools</td>
                                                                <td class="amount">3,000</td>
                                                                <td class="percent">10%</td>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">Primary Schools</td>
                                                                <td class="amount">7,984</td>
                                                                <td class="percent">7.16%</td>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">Secondary Schools</td>
                                                                <td class="amount">6,338</td>
                                                                <td class="percent">6.54%</td>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">PTCs</td>
                                                                <td class="amount">4,749</td>
                                                                <td class="percent">5.29%</td>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">BTVTs</td>
                                                                <td class="amount">4,749</td>
                                                                <td class="percent">5.29%</td>
                                                            </tr>
                                                            <tr class="analytics-map-data">
                                                                <td class="country">Universities</td>
                                                                <td class="amount">4,749</td>
                                                                <td class="percent">5.29%</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->



                                        <div class="col-md-4 col-xxl-4">
                                            <div class="card card-bordered h-100" style="border-radius:0;">
                                                <div class="card-inner mb-n2">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">LEARNERS AND TEACHERS</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">Sort</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>By Gender</span></a></li>
                                                                        <li><a href="#"><span>By Age</span></a></li>
                                                                        <li><a href="#"><span>By Location</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list is-compact">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span> </span></div>
                                                        <div class="nk-tb-col text-right"><span> </span></div>
                                                    </div><!-- .nk-tb-head -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Males</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>2,879</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span> <a href="#">Females</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>2,094</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Special Needs</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>1,634</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Dropouts</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>1,497</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Candidates</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>1,349</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Finalists</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>984</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Government Sponsored</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>879</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Private Students</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>598</span></span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span> <a href="#">Teachers</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>436</span></span>
                                                        </div>
                                                    </div>

                                                     <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span><a href="#"> Lectuers</a> </span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <span class="tb-sub tb-amount"><span>436</span></span>
                                                        </div>
                                                    </div>

                                                    <!-- .nk-tb-item -->
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->




    </div>
</template>
