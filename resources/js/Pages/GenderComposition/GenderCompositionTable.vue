<template>
<div>





<div class="card  card-stretch" style="padding:0;">


    <div class="card-inner-group">

                                <div>


<!---FILTER---->



<form  @submit.prevent="filter">

<div class="nk-ibx-head">
<div class="nk-ibx-head-actions">

<ul class="nk-ibx-head-tools g-1" v-if="search==='false'">
<li  style="margin-right:0px;padding:0px;" v-if="active_api!='main'">
<a href="javascript:void(0)" style="color:gray;" @click="tableApi()" class="btn btn-light">
<em class="icon ni ni-arrow-left" style="font-weight:bold;font-size:20px;"></em>
</a>
</li>

<li>

<div id="dropdown" class="dropdown" style="margin:0;">

<a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:180px;">
<span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="position:absolute">
<ul class="link-list-plain">

<li><a style="cursor:pointer;" @click="mainMenu('table1','By Gender Composition')">Primary Enrolment by Gender Composition</a></li>

</ul>
</div>
</div>
</li>




<li id="hideInput">
<select @change="filter_region" class="form-control"  style="width:120px;padding:6px" v-model="select_region">
<option  value="">Select Region</option>
<option v-for="sr in  all_region" v-bind:value="sr.id">{{ sr.name }}</option>
</select>
</li>


<li id="hideInput">
<select class="form-control"  style="width:120px;padding:6px;text-transform: capitalize;" v-model="select_district">
<option  value="" >Select District</option>
<option v-for="sd in  all_district" v-bind:value="sd.id">{{ sd.name }}</option>
</select>



<li id="hideInput">
<select class="form-control"  style="width:110px;padding:6px;text-transform: capitalize;" v-model="select_class">
<option  value="">Select Class</option>
<option v-for="cl in  all_class" v-bind:value="cl.id">{{ cl.education_grade }}</option>
</select>





<li id="hideInput">
<select class="form-control" id="default-01"  style="width:70px;padding:6px" v-model="select_year" v-if="active_api==='main'">
<option value="">{{ year }}</option>
<option v-for="yy in all_year"  v-bind:value="yy" v-if="year!=yy">{{ yy }}</option>
</select>

<select class="form-control" id="default-01"  style="width:70px;padding:6px" v-model="select_year" v-else>
<option value="">{{ year }}</option>
<option v-for="yy in all_year"  v-bind:value="yy">{{ yy }}</option>
</select>

</li>







   <li v-if="filterLoading">
  <div style="white-space: nowrap;width: 120px;background:#1CA1C1;color:white" class="btn btn-light">
    <b-spinner small style="height: 15px;width:15px;"></b-spinner>
     <span style="font-weight: 600;padding-left:6px;font-size: 12px;">Loading...</span>
  </div>

  </li>

<li v-else id="hideInput">





    <a href="javascript:void(0);" class="btn" @click="filter" style="background:#1CA1C1;color:white" v-if="btn_loading===false">Filter</a>

     <a href="javascript:void(0);" class="btn" @click="filter" style="background:#1CA1C1;color:white" v-else-if="btn_loading===true"> <b-spinner small style="height: 16px;width:16px;"></b-spinner> Loading....</a>



    </li>

<li v-if="search === 'false'" style="display: block">


<div class="btn-group" aria-label="Basic example">


<button type="button" class="btn btn-light" @click="changeReport('chart')" style="padding-left:10px;padding-right:10px;" v-if="reportType==='table'">
<em class="icon ni ni-bar-chart" style="color:#1CA1C1;font-size:14px;margin-right:5px;"></em>
Chart View
</button>


<button type="button" class="btn btn-light" @click="changeReport('table')" style="padding-left:10px;padding-right:10px;" v-else>
<em class="icon ni ni-table-view" style="color:#1CA1C1;font-size:14px;margin-right:5px;"></em>
 Table View
</button>





</div>
</li>
    </ul>








</div>
<div>


<!--Search -->
<!--Filter-->
<form v-if="filterLoading"></form>
<form v-else >
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced  Filter</h5>
</div>

<div style="color:red;text-align:center;padding-top:15px;">{{ advanced_filter_message }}</div>

<div class="modal-body" style="padding:40px;padding-bottom:0;">



<div class="row gy-4" style="padding-top:0;padding-bottom:0;">
<div class="col-sm-6">





<div class="form-group">
<label class="form-label">Start Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_minY">
<option value="">From </option>
<option v-for="yy in all_year"  v-bind:value="yy">{{ yy }}</option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">End Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_maxY">
<option value="">To</option>
<option v-for="yy in all_year"  v-bind:value="yy">{{ yy }}</option>
</select>
</div>
</div>
</div>


<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select Class</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_class" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="cl in all_class" v-bind:value="cl.id">{{cl.education_grade}} </option>
</select>
</div>
</div>
</div>


<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select Region</label>
<div class="form-control-wrap">
<select  @change="filter_region" class="form-control" id="default-06" v-model="select_region" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="sr in region" v-bind:value="sr.id">{{sr.name}} </option>
</select>
</div>
</div>
</div>


<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select  District </label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_district" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="ff in all_district" v-bind:value="ff.id">{{ff.name}} </option>
</select>
</div>
</div>
</div>

</div>
</div>
<br/>
<br/>
<div class="modal-footer bg-light">

<span class="sub-text">
<span @click="advancedFilter()" v-if="select_maxY!=''&&select_minY!='' && select_maxY>select_minY">
<a href="javasript:void(0)" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="customMenu()" >Submit</a>
</span>
<span style="cursor: pointer;color: #fff;" v-else @click="advancedFilter()">
<a  class="btn btn-primary" @click="customMenu()">Submit</a>
</span>
</span>
</div>
</div>
</div>
</div>
</form>
<!--End Filter-->


<!--search ends here-->

</div>

<!-- .search-wrap -->


</div>


</form>





<!--END FILTER-->

</div><!-- .card-inner -->
<div>



<div v-if="reportType==='table'">
<div v-if="status===200">
<div  v-if="count>0">
<div id="table1" >
<div style="overflow: auto;width: 100%;overflow-y: hidden;">

<table class="table" v-if="active_api==='main' || active_api==='filter'">
<thead>
<tr>
<th scope="col" style="vertical-align: top;background:#F4F6F6;border-bottom:solid  2px #87CEFA;text-transform: uppercase;width:80px;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>
<tbody  style="border:none;" v-for="r in region">

<tr style="border-top:solid thin #e5e9f2;" :class="r.name">
<th><a href="javascript:voild(0)" style="color:#526484;" @click="showHide(r);">
<b-icon-plus></b-icon-plus>
    {{ r.name }}</a> </th>
<td></td>
<td></td>
<td v-for="rc in region_class" v-if="r.id===rc.id">
 {{ rc.total }}
</td>
</tr>


<tr style="border-top:solid thin #e5e9f2; background: rgb(235, 245, 251);display:none;" :class="r.name">
<th>
<a href="javascript:voild(0)" style="color:#526484;" @click="showHide(r);">
<b-icon-dash></b-icon-dash>
    {{ r.name }}
</a>
</th>
<td></td>
<td></td>
<td v-for="rc in region_class" v-if="r.id===rc.id">
</td>
</tr>


<!---District level----->

<tr v-for="d in district" v-if="d.regionID===r.id" :class="r.name" style="display:none;">
<td></td>
<td>{{ d.name }}</td>
<td style="padding:0;">

<div style="padding:5px;margin:0;border-left:solid thin #e5e9f2;font-weight:bold;padding-left:10px;">
Males
</div>
<div style="padding:5px;border-top:solid thin #e5e9f2;margin:0;border-left:solid thin #e5e9f2;font-weight:bold;padding-left:10px;">
Females
</div>


</td>
<td  v-for="dc in district_class" v-if="dc.districtID===d.id" style="padding:0;">

<div style="padding:5px;margin:0;">
{{ dc.males }}
</div>
<div style="padding:5px;margin:0;border-top:solid thin #e5e9f2;">
{{ dc.females }}
</div>
</td>
</tr>


</tbody>
<tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
<tr>
<th  style="text-transform: uppercase;" colspan="3">Total</th>
<th v-for="tt in total">
{{ tt }}
</th>
</tr>
</tbody>
</table>



<!-----Advanced filter----------->

<table v-else-if="active_api==='advanced'" class="table">
<thead>
<tr>
<th scope="col" style="vertical-align: top;background:#F4F6F6;border-bottom:solid  2px #87CEFA;text-transform: uppercase;width:80px;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>
<tbody v-for="ay in ayears" style="border:none;">

<tr  style="border-top:solid thin #e5e9f2;" :class="ay.school_year+ay.school_year">
<th>
<a href="javascript:voild(0)" style="color:#526484;" @click="showHideAdvanced(ay);">
<b-icon-plus></b-icon-plus>
 {{ ay.school_year }}
</a>
</th>
<td colspan="2"></td>
<td v-for="yt in ayear_total" v-if="yt.year===ay.school_year">
{{ yt.item }}
</td>
</tr>

<tr style="border-top:solid thin #e5e9f2;display:none;background: rgb(235, 245, 251);" :class="ay.school_year+ay.school_year">
<th>
<a href="javascript:voild(0)" style="color:#526484;" @click="showHideAdvanced(ay);">
<b-icon-dash></b-icon-dash>
 {{ ay.school_year }}
</a>
</th>
<td :colspan="ayear_total.length+1"></td>
</tr>


<tr v-for="ar in aregion" style="display:none;" :class="ay.school_year+ay.school_year">
<td>
</td>
<th>
{{ ar.name }}
</th>
<td style="padding:0;">

<div style="padding:5px;margin:0;border-left:solid thin #e5e9f2;font-weight:bold;padding-left:10px;">
Males
</div>
<div style="padding:5px;border-top:solid thin #e5e9f2;margin:0;border-left:solid thin #e5e9f2;font-weight:bold;padding-left:10px;">
Females
</div>
</td>
<td v-for="rt in aregion_total" v-if="rt.id===ar.id && rt.year===ay.school_year" style="padding:0;">

<div style="padding:5px;margin:0;">
{{ rt.males }}
</div>
<div style="padding:5px;margin:0;border-top:solid thin #e5e9f2;">
{{ rt.females }}
</div>
</td>
</tr>




</tbody>
</table>




</div>
</div>
</div>
<div style="padding:16px;font-weight: 500;" v-else> No  content </div>
<div id="hideResult" style="display:none;padding:16px;font-weight: 500;"> No  Results </div>
</div>
</div><!-- .card-inner-group -->
<div style="padding:20px" v-else-if="reportType==='chart'">

<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">


<div style="width:70%;margin-left:15%;margin-right:15%;">

<h6 class="nk-block-title" style="padding-bottom:20px;text-transform: capitalize;">Primary Enrolment by Gender Composition <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<column-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Learners Age" ytitle="Learners Population" height="600px" style="padding-top:10px;"
></column-chart>


</div>










</div><!-- .nk-coin-ovwg -->
</div><!-- .card-inner -->
</div>















</div>
</div>
</div>
</div>
<div v-if="dataLoadingdd">
  <div style="white-space: nowrap; padding:10px">
    <b-spinner small style="height: 16px;width:16px;"></b-spinner>
     <span style="font-weight: 600;padding-left:6px;">Loading...</span>
  </div>

  </div>




</div>

</template>


<script>
export default {
props:{
subMenu:Array,
},

data(){
return{
path:this.$route.path,
search:'false',


//auto select
auto_district:null,
auto_region:null,



//loading button
btn_loading:false,

//table content.
headers:null,
region:null,
district:null,
region_class:null,
district_class:null,
classes:null,


year:null,
count:null,
year_list:null,
total:null,
maxY:null,
minY:null,

active_api:'main',


//select
select_year:'',
select_district:'',
select_class:'',
select_region:'',
select_maxY:'',
select_minY:'',

advanced_filter_message:'',

//options
option_year:null,
option_reg:null,
option_founder:null,

//advanced filter
list_year:null,
year_total:null,
grand_total:null,


errorMessaged:false,

//custom data
menu:'table',
dataLoadingdd:false,
viewOption:'customTable',
dataLoading:false,
filterLoading:false,



//Chart data
chartData:null,
reportType:'table',


//all selected items

all_year:null,
all_district:null,
all_region:null,
all_class:null,

//adanced filter
ayears:null,
ayear_total:null,
aregion:null,
aregion_total:null,


}


},

//search method
methods:{

filter_region:function(){
var reg=this.select_region;
if(reg!=''){
const session=this.$session.get('userData');
const headers = {
'Authorization':'Bearer '+session
};
const select={item:reg};
this.axios.post(
'/api/primary/admin-units/region-district',
select,
{headers}).then(
response=>{
if(response.status===200){
this.select_district='';
this.all_district=response.data.all_district;

}
}
).catch();
}
},






filter_district:function(){
var dis=this.select_district;
if(dis!=''){
const session=this.$session.get('userData');
const headers = {
'Authorization':'Bearer '+session
};
const select={item:dis};
this.axios.post(
'/api/primary/admin-units/district-region',
select,
{headers}).then(
response=>{
if(response.status===200){
//this.select_region='';
this.auto_region=response.data.select_region;

}
}
).catch();
}

},


showHideAdvanced:function(item){
$('.'+item.school_year+item.school_year).toggle();
},


changeReport:function(item){
this.reportType=item;
},

showHide:function(r){
$('.'+r.name).toggle();
},

mainMenu:function(item,title){
this.menu=item;
this.tableTitle=title;
this.$store.state.reportTitle=title;
this.$store.state.reportMenu=item;
 }
,

searchMethod:function(searched){
this.search=searched;
$('#searchfocus').focus();

this.tableApi();
this.dataLoadingdd=false;
$('#table1').show();
$('#hideResult').hide();
},
sortButtonFunctionality:function(option){
this.sortButton=option.type;
},
toggleCollapseTable:function(item){
$('.'+item.year.replace(' ','_')).toggle();
},

//custom table menu
customMenu:function(){
this.menu=this.viewOption;
},

viewSelect:function(view){
this.viewOption=view;
},

//exit custom report
exitCustom:function(){
this.menu=null;
},













//advanced search
advancedFilter:function(){

var start=this.select_minY;
var end=this.select_maxY;
var c=this.select_class;
var r=this.select_region;
var d=this.select_district;

if(start!='' && end!=''){
if(end>start){


this.active_api='advanced';
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};

//filter data
const filterData={s:start,e:end,r:r,d:d,c:c};

this.axios.post(
'/api/primary/school/gender/composition/advanced-filter',
filterData,
{headers})
.then(
response=>{

if(response.status===200){
this.back=false;
this.dataLoadingdd=false;
this.errorMessaged=false;

this.headers=response.data.header;
this.ayears=response.data.ayears;
this.ayear_total=response.data.ayear_total;
this.aregion=response.data.aregion;
this.aregion_total=response.data.aregion_total;

//select all items
this.all_year=response.data.all_year;
this.all_district=response.data.all_district;
this.all_class=response.data.all_class;
this.all_region=response.data.all_region;


return console.log(response.data);

}else{
return(response.status);
}
}).catch(error=>{console.log(error)});

}else{
this.advanced_filter_message='Start year must be less than end year';
}
}else{
this.advanced_filter_message='Select start and end year';
}
},







//filter api
filter:function(){

var reg=this.select_region;
var dis=this.select_district;
var yy=this.select_year;
var cla=this.select_class;

///check for empty filters
if(reg!='' || dis!='' || yy!='' || cla!=''){
const session=this.$session.get('userData');
this.btn_loading=true;
//set the token bareer
 const headers = {
    'Authorization':'Bearer '+session
    };
//filter data
const filterData={r:reg,y:yy,d:dis,c:cla};
this.axios.post(
'/api/primary/school/gender/composition/filter',
filterData,
{headers})
.then(
response=>{
if(response.status===200){
this.status=response.status;
if(response.status===200){
this.btn_loading=false;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.$store.state.enrolment_year=' '+response.data.enrolment_year;
this.count=response.data.count;
this.region=response.data.region;
this.district=response.data.district;

this.region_class=response.data.region_class;
this.district_class=response.data.district_class;
this.year=response.data.enrolment_year;
this.classes=response.data.classes;
//this.select_year=response.data.enrolment_year;

this.year_list=response.data.year_list;
this.total=response.data.total;
this.minY=response.data.minY;
this.maxY=response.data.maxY;
this.chartData=response.data.chartData;
this.active_api='filter';


//options
this.option_year=response.data.option_year;
this.option_reg=response.data.option_reg;
this.option_founder=response.data.option_founder;

//select all items
this.all_year=response.data.all_year;
this.all_district=response.data.all_district;
this.all_class=response.data.all_class;
this.all_region=response.data.all_region;






}

}else{

}

return console.log(response.data);

}

)
.catch(error=>{console.log(error)});
;

}else{

}



},








tableApi:function(){
//clear selected filter
this.select_district='';
this.select_class='';
this.select_region='';



if(this.$store.state.active_data!=''){
var api_data=this.$store.state.active_data;

this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=api_data.header;
this.count=api_data.count;
this.region=api_data.region;
this.district=api_data.district;
this.year_list=api_data.year_list;
this.total=api_data.total;
this.region_class=api_data.region_class;
this.district_class=api_data.district_class;
this.year=api_data.enrolment_year;
this.classes=api_data.classes;
this.$store.state.enrolment_year=' '+api_data.enrolment_year;



this.minY=api_data.minY;
this.maxY=api_data.maxY;
this.chartData=api_data.chartData;
this.active_api='main';

//options
this.option_year=api_data.option_year;
this.option_reg=api_data.option_reg;
this.option_founder=api_data.option_founder;


//select all items
this.all_year=api_data.all_year;
this.all_district=api_data.all_district;
this.all_class=api_data.all_class;
this.all_region=api_data.all_region;



}else{
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};
this.axios
.get('/api/primary/school/gender/composition',{headers})
.then(response =>{
this.status=response.status;
if(response.status===200){
this.$store.state.active_data=response.data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.$store.state.enrolment_year=' '+response.data.enrolment_year;
this.count=response.data.count;
this.region=response.data.region;
this.district=response.data.district;

this.region_class=response.data.region_class;
this.district_class=response.data.district_class;
this.year=response.data.enrolment_year;
this.classes=response.data.classes;

this.year_list=response.data.year_list;
this.total=response.data.total;
this.minY=response.data.minY;
this.maxY=response.data.maxY;
this.chartData=response.data.chartData;
this.active_api='main';

//options
this.option_year=response.data.option_year;
this.option_reg=response.data.option_reg;
this.option_founder=response.data.option_founder;

//select all items
this.all_year=response.data.all_year;
this.all_district=response.data.all_district;
this.all_class=response.data.all_class;
this.all_region=response.data.all_region;
}
} )
.catch(error => console.log(error))
}
}







},

mounted(){
this.$store.state.active_data='';
this.tableApi();


}



}
</script>


<style>
    @media only screen and (max-width:1000px){
    #hideInput{
    display:none
    }
    #filterShow{
        display:block;
    }
    table tr td, table tr th{
    text-transform: capitalize;
    }


    }


    @media only screen and (min-width:1000px){

    #filterShow{
        display:none;
    }
    #hideInput{
    display:grid
    }
    }



    .ctooltip {
  position: relative;
  display: inline-block;

}

.ctooltip .ctooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 110%;
  left: 50%;
  margin-left: -60px;
}

.ctooltip .ctooltiptext::after {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent black transparent;
}

.ctooltip:hover .ctooltiptext {
  visibility: visible;
}



    </style>
