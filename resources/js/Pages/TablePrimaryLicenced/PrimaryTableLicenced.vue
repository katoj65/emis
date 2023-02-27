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

<a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:190px;">
<span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="position:absolute">
<ul class="link-list-plain">

<li><a style="cursor:pointer;" @click="mainMenu('table1','By Ownership')">Primary School Licensing by Ownership</a></li>

</ul>
</div>


</div>
</li>




        <li id="hideInput">
    <select class="form-control"  style="width:150px;padding:6px" v-model="select_founder">
        <option  value="">Select Founder</option>
<option v-for="found in  option_founder" v-bind:value="found.id">{{ found.name }}</option>
</select>
</li>


 <li id="hideInput">
    <select class="form-control"  style="width:200px;padding:6px;text-transform: capitalize;" v-model="select_reg">
        <option  value="" >Select Registration Status</option>
<option v-for="reg in  option_reg" v-bind:value="reg.id">{{ reg.status }}</option>
</select>




<li id="hideInput">
<select class="form-control" id="default-01"  style="width:70px;padding:6px" v-model="select_year">
<option value="">{{ year }} </option>
<option v-for="yy in option_year"  v-bind:value="yy.school_year" v-if="year!=yy.school_year">{{ yy.school_year }}</option>
</select>
</li>









<li>
   <li v-if="filterLoading">
  <div style="white-space: nowrap;width: 122px;background:#1CA1C1;color:white" class="btn btn-light">
    <b-spinner small style="height: 15px;width:15px;"></b-spinner>
     <span style="font-weight: 600;padding-left:6px;font-size: 12px;">Loading...</span>
  </div>

  </li>

<li v-else id="hideInput"><a href="javascript:void(0);" class="btn" @click="filter" style="background:#1CA1C1;color:white">Filter</a></li>

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
<option v-for="yy in option_year"  v-bind:value="yy.school_year">{{ yy.school_year }}</option>
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
<option v-for="yy in option_year"  v-bind:value="yy.school_year">{{ yy.school_year }}</option>
</select>
</div>
</div>


</div>





<div class="col-sm-12">

<div class="form-group">
<label class="form-label">Select School Registration Status</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_reg" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="sr in option_reg" v-bind:value="sr.id">{{sr.status}} </option>
</select>
</div>
</div>

</div>




<div class="col-sm-12">

<div class="form-group">
<label class="form-label">Select  School Founding Organisation </label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="select_founder" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="ff in option_founder" v-bind:value="ff.id">{{ff.name}} </option>
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
<th scope="col" style="vertical-align: top;background: #e8e8eb;border-bottom:solid  2px #87CEFA;text-transform: uppercase;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>
<tbody  style="border:none;" v-for="f in founder">

<tr style="border-top:solid thin #e5e9f2;">
<th style="padding:10px;padding-left:15px;">{{ f.name.toUpperCase() }} </th>
<td v-for="c in content" v-if="c.id==f.id">
{{ c.item }}
</td>
</tr>
</tbody>
<tbody style="background: #e8e8eb;border-top:solid  1px #87CEFA;">
<tr>
<th  style="text-transform: uppercase;">Total</th>
<th v-for="tt in total">
{{ tt }}
</th>
</tr>
</tbody>
</table>



<table class="table" v-else>
<thead>
<tr>
<th scope="col" style="vertical-align: top;background:#e8e8eb;border-bottom:solid  2px #87CEFA;text-transform: uppercase;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>



<tbody  style="border:none;" v-for="yr in list_year">

<!--outer layer--->

<tr style="border-top:solid thin #e5e9f2;" :class="yr.year">
<th style="padding:10px;padding-left:15px;">
<a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(yr)">

<em class="icon ni ni-plus" style="color:gray;" :class="yr.year.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="yr.year.replace(' ','_')"></em>

    {{ yr.year }}
</a>
</th>
<td></td>
<td v-for="yt in year_total" v-if="yr.year==yt.year">
{{ yt.num }}
</td>
</tr>

<!--inner layer-->
<tr style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB;" :class="yr.year">
<th style="padding:10px;padding-left:15px;" :colspan="year_total.length+1">
<a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(yr)">

<em class="icon ni ni-plus" style="color:gray;" :class="yr.year.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="yr.year.replace(' ','_')"></em>
 {{ yr.year }}
</a>
</th>



<tr style="border-top:solid thin #e5e9f2;display:none;" :class="yr.year" v-for="fl in founder_list" v-if="fl.year===yr.year">
<th style="padding:10px;padding-left:15px;"></th>
<th>{{ fl.name }}</th>

<td v-for="fd in founder_data" v-if="yr.year===fd.year && fd.founderID===fl.id">
{{ fd.num }}
</td>



</tr>
</tbody>

<tbody style="background: #e8e8eb;border-top:solid  1px #87CEFA;">
<tr>
<th  style="text-transform: uppercase;">Total</th>
<td></td>
<th v-for="gt in grand_total">
{{ gt }}
</th>
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






<h6 class="nk-block-title" style="padding-bottom:20px;text-transform: capitalize;">Teachers   by Gender and Ownership  <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


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



//table content.
headers:null,
content:null,
registration:null,
founder:null,
year:null,
count:null,
year_list:null,
total:null,
maxY:null,
minY:null,

active_api:'main',


//select
select_year:'',
select_founder:'',
select_reg:'',
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
founder_list:null,
founder_data:null,



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







}


},

//search method
methods:{

changeReport:function(item){
this.reportType=item;
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
var select_reg=this.select_reg;
var select_founder=this.select_founder;

if(start!='' && end!=''){
if(end>start){


this.active_api='advanced';
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};

//filter data
const filterData={s:start,e:end,r:select_reg,f:select_founder};

this.axios.post(
'/api/primary/school/licensed/advanced-filter',
filterData,
{headers})
.then(
response=>{

if(response.status===200){
this.back=false;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.founder=response.data.founder;
this.registration=response.data.registration;
//this.content=response.data.school;
this.list_year=response.data.list_year;
this.year_total=response.data.year_total;
this.grand_total=response.data.grand_total;
this.founder_list=response.data.founder_list;
this.founder_data=response.data.founder_data;
this.advanced_filter_message=null;
//return console.log(response.data);

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
var founder=this.select_founder;
var reg=this.select_reg;
var yy=this.select_year;
///check for empty filters
this.active_api='main';

if(founder!='' || reg!='' || yy!=''){
const session=this.$session.get('userData');
//set the token bareer
 const headers = {
    'Authorization':'Bearer '+session
    };
//filter data
const filterData={r:reg,y:yy,f:founder};
this.axios.post(
'/api/primary/school/licensed/filter',
filterData,
{headers})
.then(
response=>{
if(response.status===200){

this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.$store.state.enrolment_year=' '+response.data.year;
this.count=response.data.count;
this.founder=response.data.founder;
this.registration=response.data.registration;
this.content=response.data.school;
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
//clear previous active data
this.$store.state.active_data='';
//check for active data before loading new data
if(this.$store.state.active_data!=''){
var api_data=this.$store.state.active_data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=api_data.header;
this.$store.state.enrolment_year=' '+api_data.year;
this.count=api_data.count;
this.year=api_data.year;
this.region=api_data.region;
this.district=api_data.district;
this.region_class=response.data.region_class;
this.district_class=api_data.district_class;
this.year=api_data.enrolment_year;
this.classes=api_data.classes;
this.year_list=api_data.year_list;
this.total=api_data.total;


this.minY=api_data.minY;
this.maxY=api_data.maxY;
this.chartData=api_data.chartData;
this.active_api='main';
//options
this.option_year=api_data.option_year;
this.option_reg=api_data.option_reg;
this.option_founder=api_data.option_founder;


}else{
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};
this.axios
.get('/api/primary/school/licensed',{headers})
.then(response =>{
this.status=response.status;
if(response.status===200){
this.$store.state.active_data=response.data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.$store.state.enrolment_year=' '+response.data.year;
this.count=response.data.count;
this.founder=response.data.founder;
this.registration=response.data.registration;
this.content=response.data.school;
this.year=response.data.year;
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
