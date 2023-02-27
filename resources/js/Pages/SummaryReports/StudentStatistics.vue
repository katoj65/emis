<template>
<div class="row g-gs" style="padding-bottom:10px;">
 <div class="col-md-4">
                                            <div class="card card-bordered card-full" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Number of Schools</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Deposited"></em>
                                                        </div>
                                                    </div>
                                                    <router-link to="/schools">
                                                    <div class="card-amount">
                                                        <span class="amount" style="font-weight:bold;"> 49,595 <span class="currency currency-usd"> </span>
                                                        </span>
                                                        <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>6000 New Schools</span>
                                                    </div>

                                                    </router-link>

                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#1ABC9C;">Licenced</div>
                                                                <div class="amount" >2,940 <span class="currency currency-usd"> </span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#3498DB;">Registered</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd"> </span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->







 <div class="col-md-4">
                                            <div class="card card-bordered card-full" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Number of Students</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Withdraw"></em>
                                                        </div>
                                                    </div>
                                                    <router-link to="/learners">
                                                    <div class="card-amount">
                                                        <span class="amount" style="font-weight:bold;"> 49,595 <span class="currency currency-usd"> </span>
                                                        </span>
                                                        <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>20000 Dropouts</span>
                                                    </div>
                                                   </router-link>

                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#1ABC9C;">Candidates</div>
                                                                <div class="amount">2,940.59 <span class="currency currency-usd"> </span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#3498DB;">Finalists</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd"> </span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->





<div class="col-md-4">

             <div class="card card-bordered  card-full" style="border-radius:0;">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Number of Teachers</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Balance in Account"></em>
                                                        </div>
                                                    </div>
                                                    <router-link to="/teachers">
                                                    <div class="card-amount">

                                                        <span class="amount" style="font-weight:bold;"> 79,358<span class="currency currency-usd"> </span>
                                                        </span>
                                                    </div>
                                                    </router-link>

                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#1ABC9C;">Diploma Holders</div>
                                                                <div class="amount">2,940 <span class="currency currency-usd"></span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title" style="color:#3498DB;">Degree Holders</div>
                                                                <div class="amount">1,259 <span class="currency currency-usd"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->





</div>
</template>
<script>
export default {
data(){
    return{
   items:[{name:'xxxx'}]
    }
}
}
</script>
