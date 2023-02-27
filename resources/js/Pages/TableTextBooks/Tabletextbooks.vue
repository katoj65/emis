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

<a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:200px;">
<span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="position:absolute">
<ul class="link-list-plain">

<li><a style="cursor:pointer;" @click="mainMenu('table1','By School Ownership')">Primary School Textbooks By School Ownership</a></li>

</ul>
</div>
</div>
</li>




<li id="hideInput">
<select  class="form-control"  style="width:170px;padding:6px" v-model="select_founder">
<option  value="">Select School Founder</option>
<option v-for="fl in founder_list" v-bind:value="fl.id">
{{ fl.name }}
</option>
</select>
</li>


<li id="hideInput">
<select class="form-control"  style="width:170px;padding:6px;text-transform: capitalize;" v-model="select_subject">
<option  value="" >Select Subject</option>
<option v-for="sl in  subject_list" v-bind:value="sl.id">{{ sl.subject }}</option>
</select>



<li id="hideInput">
<select class="form-control" id="default-01"  style="width:70px;padding:6px" v-model="select_year" v-if="active_api==='main'">
<option value="">{{ year }}</option>
<option v-for="yy in year_list"  v-bind:value="yy.school_year" v-if="year!=yy.school_year">{{ yy.school_year }}</option>
</select>


<select class="form-control" id="default-01"  style="width:70px;padding:6px" v-model="select_year" v-else>
<option value="">{{ year }}</option>
<option v-for="yy in option_year"  v-bind:value="yy.school_year">{{ yy.school_year }}</option>
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

<form>
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced Filter</h5>
</div>

<div style="color:red;text-align:center;padding-top:15px;">{{ advanced_filter_message }}</div>

<div class="modal-body" style="padding:40px;padding-bottom:0;">



<div class="row gy-4" style="padding-top:0;padding-bottom:0;">
<div class="col-sm-6">





<div class="form-group">
<label class="form-label">Start Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="advanced_select_min">
<option value="">From </option>
<option v-for="yy in year_list"  v-bind:value="yy.school_year">
{{ yy.school_year }}
</option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">End Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="advanced_select_max">
<option value="">To</option>
<option v-for="yy in year_list"  v-bind:value="yy.school_year">
{{ yy.school_year }}
</option>

</select>
</div>
</div>
</div>


<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select Subject </label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="advanced_select_subject" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="asl in subject_list" v-bind:value="asl.id">{{asl.subject}} </option>
</select>
</div>
</div>
</div>


<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select School Founder</label>
<div class="form-control-wrap">
<select   class="form-control" id="default-06" v-model="advanced_select_founder" style="text-transform: capitalize;">
<option value="">Select</option>
<option v-for="asf in founder_list" v-bind:value="asf.id">{{asf.name}} </option>
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
<span @click="advancedFilter()" v-if="advanced_select_min!=''&&advanced_select_max!='' && advanced_select_max>advanced_select_min">
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



<tbody  style="border:none;">

<tr style="border-top:solid thin #e5e9f2;" v-for="s in subjects">
<th>
{{ s.subject.toUpperCase()}}
</th>
<td v-for="i in mainItems" v-if="i.id===s.id">
{{ i.item }}
</td>
</tr>
</tbody>
<tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
<tr>
<th  style="text-transform: uppercase;">Total</th>
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
<th scope="col" style="vertical-align: top;background:#F4F6F6;border-bottom:solid  2px #87CEFA;text-transform: uppercase;width:200px" v-for="head in headers">{{ head}} </th>
</tr>
</thead>

<tbody v-for="tl in tableLeft" style="border:none;">


<tr style="border-top:solid thin #e5e9f2;" :class="tl.school_year">
<th style="width:130px;" colspan="2">
<a href="javascript:void(0)" style="color:black;" @click="showHideAdvanced(tl)">
<b-icon-plus></b-icon-plus> {{ tl.school_year }}
</a>
</th>
<td v-for="yt in year_total" v-if="yt.year===tl.school_year">
{{ yt.item }}
</td>
</tr>

<tr style="border-top:solid thin #e5e9f2;display:none;"  :class="tl.school_year">

<th style="width:150px;background: rgb(235, 245, 251);" colspan="2">

<a href="javascript:void(0)" style="color:black;" @click="showHideAdvanced(tl)"> <b-icon-dash></b-icon-dash>
{{ tl.school_year }}
</a>
</th>

<th v-for="yt in year_total" v-if="yt.year===tl.school_year" style="background: rgb(235, 245, 251)">
{{ yt.item }}
</th>
</tr>

<tr v-for="sub in subjects" :class="tl.school_year" style="display:none;">
<td></td>
<th>
{{ sub.subject.toUpperCase()}}
</th>
<td v-for="st in subject_total" v-if="tl.school_year===st.year&&st.sid===sub.id" >
{{ st.item }}
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

<h6 class="nk-block-title" style="padding-bottom:20px;text-transform: capitalize;">Primary Primary School Textbooks by School Ownership <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<column-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Subjects" ytitle="Number of Textbooks" height="600px" style="padding-top:10px;"
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





//loading button
btn_loading:false,
//table content.
headers:null,
subjects:null,
founder:null,
mainItems:null,

//option
option_subject:null,
option_founder:null,
option_year:null,



year:null,
count:null,
year_list:null,
subject_list:null,
founder_list:null,
total:null,
maxY:null,
minY:null,

active_api:'main',


//select for filter
select_year:'',
select_subject:'',
select_founder:'',
select_maxY:'',
select_minY:'',


//advanced filter select
advanced_select_min:'',
advanced_select_max:'',
advanced_select_subject:'',
advanced_select_founder:'',




//advanced filter

year_total:null,
grand_total:null,
//left menu
tableLeft:null,
subject_total:null,


//response messages
errorMessaged:false,
advanced_filter_message:'',

//custom data
menu:'table',
dataLoadingdd:false,
viewOption:'customTable',
dataLoading:false,
filterLoading:false,



//Chart data
chartData:null,
reportType:'table',
status:null,



}


},

//search method
methods:{


showHideAdvanced:function(item){
$('.'+item.school_year).toggle();
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

var start=this.advanced_select_min;
var end=this.advanced_select_max;
var s=this.advanced_select_subject;
var f=this.advanced_select_founder;


if(start!='' && end!=''){
if(end>start){
this.active_api='advanced';
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};
//filter data
const filterData={start:start,end:end,select_subject:s,select_founder:f};
this.axios.post(
'/api/primary/school/textbooks/advanced-filter',
filterData,
{headers})
.then(
response=>{

if(response.status===200){
this.status=response.status;
this.back=false;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.advanced_filter_message='';

//filter type
this.headers=response.data.header;
this.tableLeft=response.data.tableLeft;
this.$store.state.enrolment_year=' '+start+' - '+end;
this.subjects=response.data.subjects;
this.year_total=response.data.year_total;
this.subject_total=response.data.subject_total;

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

var ss=this.select_subject;
var sf=this.select_founder;
var sy=this.select_year;


///check for empty filters
if(ss!='' || sf!='' || sy!=''){
const session=this.$session.get('userData');
this.btn_loading=true;
//set the token bareer
 const headers = {
    'Authorization':'Bearer '+session
    };
//filter data
const filterData={s_year:sy, s_subject:ss, s_founder:sf};
this.axios.post(
'/api/primary/school/textbooks/filter',
filterData,
{headers})
.then(
response=>{
if(response.status===200){
this.status=response.status;
if(response.status===200){
this.btn_loading=false;
this.active_api='filter';
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.count=response.data.count;

this.year=response.data.enrolment_year;
this.total=response.data.total;
this.minY=response.data.minY;
this.maxY=response.data.maxY;
this.chartData=response.data.chartData;

this.founder=response.data.founder;
this.subjects=response.data.subject;
this.mainItems=response.data.mainItems;
this.$store.state.enrolment_year=' '+response.data.year;
this.year=response.data.year;

//options
this.option_year=response.data.option_year;
this.option_subject=response.data.option_subject;
this.option_founder=response.data.option_founder;

//list
this.subject_list=response.data.subject_list;
this.founder_list=response.data.founder_list;
this.year_list=response.data.year_list;
this.status=response.status;













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
if(this.$store.state.active_data!=''){

this.active_api='main';
var api_data=this.$store.state.active_data;
this.dataLoadingdd=false;
this.errorMessaged=false;

//main content
this.headers=api_data.header;
this.count=api_data.count;
this.year=api_data.enrolment_year;
this.total=api_data.total;
this.minY=api_data.minY;
this.maxY=api_data.maxY;
this.chartData=api_data.chartData;
this.active_api='main';
this.founder=api_data.founder;
this.subjects=api_data.subject;
this.mainItems=api_data.mainItems;
this.$store.state.enrolment_year=' '+api_data.year;
this.year=api_data.year;

//options
this.option_year=api_data.option_year;
this.option_subject=api_data.option_subject;
this.option_founder=api_data.option_founder;

//list
this.subject_list=api_data.subject_list;
this.founder_list=api_data.founder_list;
this.year_list=api_data.year_list;
this.status=200;






}else{
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};
this.axios
.get('/api/primary/school/textbooks',{headers})
.then(response =>{
this.status=response.status;
if(response.status===200){

this.$store.state.active_data=response.data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.count=response.data.count;
this.year=response.data.enrolment_year;
this.total=response.data.total;
this.minY=response.data.minY;
this.maxY=response.data.maxY;
this.chartData=response.data.chartData;
this.active_api='main';
this.founder=response.data.founder;
this.subjects=response.data.subject;
this.mainItems=response.data.mainItems;
this.$store.state.enrolment_year=' '+response.data.year;
this.year=response.data.year;
this.status=response.status;

//options
this.option_year=response.data.option_year;
this.option_subject=response.data.option_subject;
this.option_founder=response.data.option_founder;

//list
this.subject_list=response.data.subject_list;
this.founder_list=response.data.founder_list;
this.year_list=response.data.year_list;




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
