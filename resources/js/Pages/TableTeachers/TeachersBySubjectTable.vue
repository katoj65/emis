<template>
<div>



<div>
<!---FILTER---->

<form  @submit.prevent="filterRegion">
    <div  >

    </div>
<div class="nk-ibx-head">

<div class="nk-ibx-head-actions">

<ul class="nk-ibx-head-tools g-1" v-if="search==='false'">


<li>

<div id="dropdown" class="dropdown" style="margin:0;">

<a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:190px;">
<span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="position:absolute">
<ul class="link-list-plain">
<li><a href="javascript:voud(0)" @click="mainMenu('table1','BY TEACHING  SUBJECT  CATEGORY')">Teachers by teaching  category </a></li>
<li><a href="javascript:voud(0)" @click="mainMenu('table2','Teachers By Payroll Status')">Teacher  by payroll status</a></li>

</ul>
</div>


</div>
</li>


 <li id="filterShow" style="cursor: pointer;">
     <em class="icon ni ni-filter-alt" style="color: #000;font-size: 18px;" ></em>
 </li>
<li id="hideInput">
<select  @change="changefilterRegion" class="form-control"  style="width:138px;" v-model="selectedRegion">
<option  value="">Select Region</option>
<option v-for="n in allRegions" v-bind:value="n.id">{{ n.name }}</option>
</select>
</li>
<li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:138px;" v-model="selectedDistrict">
<option  value="" >Select District </option>
<option v-for="x in allDistricts"  v-bind:value="x.id">{{ x.name}} </option>
</select>
</li>




<li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:150px;" v-model="selectedYear">

<option  value="" v-if="checkYear" >{{$store.state.enrolment_year}} </option>
<option v-for="yr in tableYears" v-bind:value="yr.school_year">{{ yr.school_year }} </option>

</select>

</li>



<li>
<li v-if="dataLoading">
<div style="white-space: nowrap; background:#1CA1C1;color:white" class="btn">
<b-spinner small style="height: 16px;width:16px;"></b-spinner>
<span style="font-weight: 600;padding-left:6px;">Loading...</span>
</div>

</li>

<li v-else id="hideInput"><a href="javascript:void(0);" class="btn" @click="filterRegion" style="background:#1CA1C1;color:white">Filter</a></li>




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
<form  @submit.prevent="filterRegion">
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced  Filter</h5>
</div>
<div class="modal-body" style="padding:40px;padding-bottom:0;">


<div class="row gy-4" style="padding-top:0;padding-bottom:0;">
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">Range of Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">From Year</option>
<option value="option_select_name" v-for="yr in years">{{ yr.year }} </option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">Range of Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">To Year</option>
<option value="option_select_name" v-for="yr in years">{{ yr.year }} </option>
</select>
</div>
</div>


</div>





<div class="col-sm-12">

<div class="form-group">
<label class="form-label">Select Region</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">All Region</option>
<option v-bind:value="rg.region" v-for="rg in allregion">{{ rg.region }} </option>
</select>
</div>
</div>


</div>





<div class="col-sm-12" style="text-align:center;">


<div class="form-group">
<div class="preview-block">
<span class="preview-title overline-title">Change Report View Format</span>
<div style="padding-top:10px;">
<span>
<label><input type="radio" name="view" style="width:15px;height:15px;" value="table" @click="viewSelect('customTable')" checked/> Table View</label>
</span>



<span style="margin-left:50px;">
<label><input type="radio" name="view" style="width:15px;height:15px;" value="chart" @click="viewSelect('customChart')"/> Chart View</label>
</span>

</div>


</div>
</div>

</div>

</div>

</div>
<div class="modal-footer bg-light">
<span class="sub-text">

<a href="javasript:void(0)" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="customMenu()">Submit</a>
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
<div v-if="dataLoadingdd">
<div style="white-space: nowrap; padding:10px">
<b-spinner small style="height: 16px;width:16px;"></b-spinner>
<span style="font-weight: 600;padding-left:6px;">Loading...</span>
</div>
</div>



<div v-if="reportType==='table'">
<div v-if="status===200">
<div id="table" v-if="numRows > 0 ">
    <div style="overflow: auto;width:100%;overflow-y: hidden;">


<table class="table" style="padding:0px;margin:0px;">
<thead>
<tr>
<th scope="col" style="vertical-align: top;width:100px;text-transform:capitalize;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in tableHeader" >{{ head}}</th>
</tr>
</thead>
<tbody v-for="item1 in tableRegions" style="border:none;">
<!--Region level-->
<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;">
<th colspan="2">
<a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>
<td v-for="rtt in tableRegionSum" v-if="rtt.id===item1.id">
{{ rtt.population }}
</td>

</tr>



<tr  :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;">
<th colspan="2">
<a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>

<th v-for="rtt in tableRegionSum" v-if="rtt.id===item1.id">
{{ rtt.population }}
</th>
</tr>
<!--District Leavel-->






<tr v-for="item2 in tableDistricts" v-if="item1.id===item2.region_id" style="display:none;" :class="item1.name.replace(' ','_')">
<td></td>



<!--Left---->


<td style="padding:0;display:none;" :class="item2.name.replace(' ','_')+11">
 <table style="width:100%;" class="border-left">
<tr style="border:none;">
<td style="border:none;"><a href="javascript:void(0)" @click="toggleDistrictContent(item2)" >
<em class="icon ni ni-minus-sm" style="color:gray;margin-right:10px;"></em>
{{ item2.name.toUpperCase()}}
</a>
</td>
</tr>
<tr>
<td >Males</td>
</tr>
<tr>
<td>Females</td>
</tr>
 </table>

</td>



<!--Left2---->
<td :class="item2.name.replace(' ','_')+11">
<a href="javascript:void(0)" @click="toggleDistrictContent(item2)" >
<em class="icon ni ni-plus-sm" style="color:gray;margin-right:10px;"></em>
{{ item2.name.toUpperCase()}}
</a>
</td>






<!---Right----->



<td v-for="item3 in tableBody" v-if="item2.id===item3.district_id" :class="item2.name.replace(' ','_')+11">
<div v-for="sm in item3.sum">{{sm}}</div>
</td>

<td style="display:none;padding:0;" :class="item2.name.replace(' ','_')+11">



<table style="width:100%;">

<tr class="border-bottom">
<td v-for="item3 in tableBody" v-if="item2.id===item3.district_id" style="width:200px;">
<div v-for="sm in item3.sum">{{sm}}</div>
</td>
</tr>


<tr class="border-bottom">
<td v-for="item3 in tableBody" v-if="item2.id===item3.district_id" style="width:200px;">
<div v-for="sm in item3.sum">{{item3.males}}</div>
</td>
</tr>


<tr style="border:none;">
<td v-for="item3 in tableBody" v-if="item2.id===item3.district_id" style="width:200px;">
<div v-for="sm in item3.sum">{{item3.females}}</div>
</td>
</tr>




</table>

</td>
</tr>





















</tbody>
<tbody style="background:#F4F6F6;border:none;margin:0px;">
    <tr>
<th colspan="2" style="border-top:solid thin #87CEFA">TOTAL</th>
<th v-for="grandSum in tableGrandTotal" style="border-top:solid thin #87CEFA">
 {{ grandSum.sum }}
</th>
</tr>
</tbody>
</table>
</div>


</div><!-- .card-inner -->




<div v-else>No  content</div>
<div id="hideResult" style="padding:10px;display:none"> No results</div>




</div>

</div>

<!---Chart_view-->
<div v-else-if="reportType==='chart'">


<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">


<div style="width:70%;margin-left:15%;margin-right:15%;">

<h6 class="nk-block-title" style="padding-bottom:20px;"> <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span> </h6>

<column-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Enrolment Year" ytitle="Learners Population" height="600px" style="padding-top:10px;"
></column-chart>


</div>







</div><!-- .nk-coin-ovwg -->
</div><!-- .card-inner -->
</div>






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
sum_total:null,
region:null,
status:null,
allRegions:null,

//table content
tableHeader:null,
tableBody:null,
tableRegions:null,
tableDistricts:null,
tableRegionSum:null,
tableGrandTotal:null,
tableYears:null,





region_list:null,
grandTotal:null,
content:null,
errorMessaged:false,
data:null,
sorted:[{type:'Male'},{type:'Female'}],
sortButton:'Sort by Gender',
years:[{year:'2019',population:300},{year:'2018',population:500},{year:'2017',population:700},{year:'2016',population:1300}],
selectYear:[{item:'2016'},{item:'2017'},{item:'2018'},{item:'2019'}],
sum:null,
grand:null,

//custom data
menu:'table',
tableTitle:'BY TEACHING  SUBJECT  CATEGORY',
//report content
reportType:'table',



viewOption:'customTable',
//filter
selectedRegion:'',
checkYear:true,
selectedDistrict:'',
selectedYear:'',
selectregion:'',
dataLoading:false,
dataLoadingdd:false,
regionDistrict:'',
selectDistrict:'',
allregion:'',
sortGender:'',
allDistricts:'',
numRows:'',
//seach

countryRegion:'',

//Chart data



chartData:null,









}


},

//search method
methods:{
toggleDistrictContent:function(item){
$('.'+item.name.replace(' ','_')+11).toggle();
},
//change report type
changeReport:function(item){
this.reportType=item;
},



mainMenu:function(item,title){
this.menu=item;
this.tableTitle='BY TEACHING  SUBJECT  CATEGORY';
this.$store.state.reportTitle=title;
this.$store.state.reportMenu=item;

 }
,
searchMethod:function(searched){
this.search=searched;
$('#searchfocus').focus();
this.menu='table';
this.tableApi();
this.dataLoadingdd=false;
$('#hideTable').show();
$('#hideResult').hide();
$('#hideTablePag').show();
},

sortButtonFunctionality:function(option){
this.sortButton=option.type;
},

toggleCollapseTable:function(item){
$('.'+item.name.replace(' ','_')).toggle();
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

//seach
searchRegion:function(){
var countWord=this.countryRegion.length;
this.dataLoadingdd=false;
if(countWord > 3 || countWord===3 ){
this.dataLoading=true;
var session=this.$session.get('userData');
const searchData = {region:this.countryRegion};
const headers = {
'Authorization':'Bearer '+session
};
this.axios.post('/api/search/primary/enrolment/region',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.tableRegions;
this.tableDistricts=response.data.tableDistricts;
this.tableRegionSum=response.data.regionSum;
this.tableGrandTotal=response.data.grandTotal;
this.tableYears=response.data.years;
if(response.data.noResults>0){
$('#table').show();
$('#hideResult').hide();
}else{
$('#table').hide();
$('#hideResult').show();
}
}})
.catch(error => {console.log('No Result')})
}else{
this.tableApi();
this.dataLoadingdd=false;
$('#table').show();
$('#hideResult').hide();

}

},

changefilterRegion:function(){
var session=this.$session.get('userData');
const headers = {
'Authorization':'Bearer '+session
};
const searchData = {region:this.selectedRegion};
this.axios.post('/api/filter/primary/enrolment/region',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
if(this.selectedRegion!==''){
this.allDistricts=response.data.getDistrictall;
}
//this.regionDistrict=response.data.district;

}})
.catch(error => {console.log('No Result')})



},
filterRegion:function(){

if(this.selectedRegion!=='' || this.selectedDistrict!=='' || this.selectedYear!==''){
this.dataLoading=true;
var session=this.$session.get('userData');
const searchData = {region:this.selectedRegion,district:this.selectedDistrict,year:this.selectedYear};
const headers = {
'Authorization':'Bearer '+session
};

if(this.selectedYear===''){
}else{
this.checkYear=false;
}

this.axios.post('/api/filter/primary/enrolment/region',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
this.dataLoading=false;

this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.tableRegions;
 //this.allRegions=response.data.tableRegions;
this.tableDistricts=response.data.tableDistricts;
//this.allDistricts=response.data.tableDistricts;
this.chartData=response.data.tableChart;
this.tableRegionSum=response.data.regionSum;
this.tableGrandTotal=response.data.grandTotal;
this.tableYears=response.data.years;
if(this.selectedYear===''){
}else{
this.$store.state.enrolment_year='  '+this.selectedYear;
}
}})
.catch(error => {console.log('No Result')})
}else{
    //alert();
this.tableApi();
this.dataLoadingdd=false;
}
},
tableApi:function(){
var session=this.$session.get('userData');
this.dataLoadingdd=true;
$('#selected2').hide();
const headers = {
'Authorization':'Bearer '+session
};
this.axios
.get('/api/primary/enrolment/region',{headers})
.then(response =>{
this.status=response.status;

if(response.status===200){

this.dataLoadingdd=false;
this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.tableRegions;
 this.allRegions=response.data.tableRegions;
this.tableDistricts=response.data.tableDistricts;
this.allDistricts=response.data.tableDistricts;
this.tableRegionSum=response.data.regionSum;
this.tableGrandTotal=response.data.grandTotal;
this.tableYears=response.data.years;

this.chartData=response.data.tableChart;
this.numRows=response.data.numRows;
this.$store.state.enrolment_year=response.data.fromTo;
this.$store.state.reportTitle='BY TEACHING  SUBJECT  CATEGORY';
}else{

//this.errorMessage='Loading...';
}
} )
.catch(error => console.log(error))
}
},

mounted(){

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

thead{
border-bottom:solid thin #87CEFA;
}







}

</style>
