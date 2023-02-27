<template>
<div>






<div class="card card-bordered" style="margin-top:10px;border-radius:0;">
    <div class="card-header border-bottom" style="font-weight:bold;border-radius:0;">Customize Report</div>
    <div class="card-body">

<div class="row gy-4">
<div class="col-sm-4">
<div class="form-group">
<label class="form-label">Range Date</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">The Year</option>
<option value="option_select_name" v-for="yr in years">{{ yr.year }} </option>
</select>
</div>
</div>







<div class="form-group">
<label class="form-label">Select Gender</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">All Genders</option>
<option value="option_select_name" v-for="fm in gender">{{ fm.sex }} </option>
</select>
</div>
</div>






</div>
<div class="col-sm-4">
<div class="form-group">
<label class="form-label">Compare With</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">Previous Period(s)</option>
<option value="option_select_name" v-for="yr in years">{{ yr.year }} </option>
</select>
</div>
</div>





<div class="form-group">
<label class="form-label">Select Country</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">All Counties</option>
<option value="option_select_name" v-for="nation in country">{{ nation.name }} </option>
</select>
</div>
</div>










</div>



<div class="col-sm-4">
<div class="form-group">
<label class="form-label">Class</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">Select Class</option>
<option value="option_select_name" v-for="x in 7">Primary {{ x }}</option>
</select>
</div>
</div>


<div class="form-group">
<div class="preview-block">
<span class="preview-title overline-title">Change View Format</span>
<div style="padding-top:10px;">
<span>
<label><input type="radio" name="view" style="width:15px;height:15px;" value="table"/> Table View</label>
</span>



<span style="margin-left:50px;">
<label><input type="radio" name="view" style="width:15px;height:15px;" value="chart"/> Chart View</label>
</span>

</div>



</div>
</div>












</div>
</div>
</div>
<div class="card-footer border-top text-muted" style="background:none;">


<div class="form-group">
<a href="javascript:void(0);">Advanced Filter</a>
<button class="btn btn-sm btn-primary" style="float:right;">Save Report</button>
</div>


</div>
</div>






</div>
</template>



<script>
export default {

data(){
return {

years:[{year:2020},{year:2019},{year:2018},{year:2017},{year:2016},{year:2015}],
gender:[{sex:'Male'},{sex:'Female'}],
country:[{name:'Uganda'},{name:'Kenya'},{name:'Tanzania'},{name:'Rwanda'},{name:'Burundi'},{name:'South Sudan'},{name:'DRC'},{name:'Zambia'}],

}
}



}
</script>
