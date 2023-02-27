<template>
    <div class="row g-gs" style="padding-bottom:10px;">


                                        <div class="col-md-6 col-xxl-6">
                                            <div class="card card-bordered card-full" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-1">
                                                        <div class="card-title">
                                                            <h6 class="title">Learner's Overview</h6>
                                                            <p>The investment overview of your platform. <a href="#">All Investment</a></p>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#thisyear">This Year</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#alltime">All Time</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-0">
                                                        <div class="tab-pane active" id="overview">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently registerd students</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395,395</div>
                                                                        <div class="title">Total</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">3456</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Schools</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">395,395 </div>
                                                                        <div class="title">Candidates</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Females</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395</div>
                                                                        <div class="title">Females</div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->



                                        <div class="col-md-6 col-xxl-6">
                                            <div class="card card-bordered card-full" style="border-radius:0;">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <div class="card-title-group mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Learners </h6>
                                                            <p>----</p>
                                                        </div>
                                                        <div class="card-tools mt-n4 mr-n1">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-list gy-3">
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Strater Plan</div>
                                                                <div class="progress-amount">58%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar" data-progress="58"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Silver Plan</div>
                                                                <div class="progress-amount">18.49%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-orange" data-progress="18.49"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Dimond Plan</div>
                                                                <div class="progress-amount">16%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-teal" data-progress="16"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Platinam Plan</div>
                                                                <div class="progress-amount">29%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-pink" data-progress="29"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Vibranium Plan</div>
                                                                <div class="progress-amount">33%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-top-ck mt-auto">
                                                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->




    </div>
</template>
