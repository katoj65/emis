<template>
<div>



<div>
<!---FILTER---->

<form  @submit.prevent>
    <div>

    </div>
<div class="nk-ibx-head">

<div class="nk-ibx-head-actions">

<ul class="nk-ibx-head-tools g-1" v-if="search==='false'">

<li v-if="back" style="margin-right:0px;padding:0px;">
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

<li><a style="cursor:pointer;" @click="mainMenu('table1','by Ownership and Region')">Water  Source  by Ownership and Region </a></li>

</ul>
</div>


</div>
</li>

 <li id="filterShow" style="cursor: pointer;padding :4px;">
     <em class="icon ni ni-filter-alt" style="color: #000;font-size: 18px;" ></em>
 </li>
<li id="hideInput">
<select  @change="changefilterRegion" class="form-control"  style="width:100px;padding :4px;" v-model="selectedRegion">
<option  value="">Select Region</option>
<option v-for="n in allRegions" v-bind:value="n.id">{{ n.name }}</option>
</select>
</li>
<li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:110px;padding :4px;" v-model="selectedDistrict">
<option  value="" >Select District </option>
<option v-for="x in allDistricts"  v-bind:value="x.id">{{ x.name}} </option>
</select>
</li>
<li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:90px;padding :4px;" v-model="tgender">

<option  value=""> Select Ownership </option>
<option  v-for="s in qualification" v-bind:value="s.id">{{s.status}} </option>

</select>

</li>

<li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:110px;padding :4px;" v-model="qualificationId">

<option  value="" > Select Distance</option>
<option v-for="q in tdistance" v-bind:value="q.id">{{ q.distance }} </option>

</select>

</li>


<li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:80px;padding :4px;" v-model="selectedYear">

<option  value="" v-if="checkYear" >{{$store.state.enrolment_year}} </option>
<option v-for="yr in tableYears" v-bind:value="yr">{{ yr }} </option>

</select>

</li>



<li>
<li v-if="dataLoading && !$store.state.loading_status">
<div style="white-space: nowrap; background:#1CA1C1;color:white" class="btn">
<b-spinner small style="height: 16px;width:16px;"></b-spinner>
<span style="font-weight: 600;padding-left:6px;">Loading...</span>
</div>

</li>

<li v-else-if="$store.state.loading_status" id="hideInput"><a href="javascript:void(0);" class="btn" style="background:#1CA1C1;color:white">Filter</a></li>

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
<form v-if="dataLoading"></form>
<form v-else  @submit.prevent="advancedFilter">
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced  Filter</h5>
</div>
<div style="color: red;padding-top: 6px;text-align: center;"> {{note}}</div>

<div class="modal-body" style="padding:40px;padding-bottom:0;">


<div class="row gy-4" style="padding-top:0;padding-bottom:0;">
<div class="col-sm-6">


<div class="form-group">
<label class="form-label"> Start  Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="fromYear">
<option value="">From </option>
<option v-for="yr in tableYears" v-bind:value="yr" >{{ yr }} </option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">End Year</label>
<div class="form-control-wrap">
<select class="form-control"  v-model="toYear">
<option value="">To </option>
<option v-for="yr in tableYears" v-bind:value="yr" >{{ yr }} </option>
</select>
</div>
</div>


</div>



</div>
<br/>
<div>
<div class="form-group">
<label class="form-label">Select Distance</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model=" selectedId">
<option value=""> Distance</option>
<option v-for="q in tdistance" v-bind:value="q.id">{{ q.distance }} </option>
</select>
</div>
</div>
</div>
</div>

<br/>
<br/><br/>

<div class="modal-footer bg-light">
<span class="sub-text">

<span v-if="fromYear!=='' && toYear!=='' && note==='' && selectedId!=='' " @click="advancedFilter" style="cursor:pointer;">
<a href="javasript:void(0)"  class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="customMenu()">Submit</a>
</span>

<span v-else @click="advancedFilter" style="cursor:pointer;">
<a  style="color:#fff;cursor: pointer;" class="btn btn-primary"  @click="customMenu()">Submit</a>
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
<div id="table" v-if="numRows > 0">
    <div style="overflow: auto;width:100%;overflow-y: hidden;">


        <table class="table" id="table1" style="padding:0px;margin:0px;">
            <thead>
            <tr>
            <th scope="col" style="vertical-align: top;text-transform:capitalize;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in tableHeader" >{{ head}}</th>
            </tr>
            </thead>
            <tbody v-for="item1 in tableRegions" style="border:none;">
            <!--Region level-->
            <tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;">
            <th colspan="3">
            <a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(item1)">

            <em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
            <em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>

            {{ item1.name }}
            </a>

            </th>

            <td v-for="rtt in tableRegionSum" v-if="rtt.id===item1.id">
            {{ rtt.total }}
            </td>

            </tr>



            <tr  :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;">
            <th :colspan="tableHeader.length">

            <a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
            <em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
            <em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
            {{ item1.name }}
            </a>
            </th>

            </tr>
            <!--District Leavel-->



            <tr v-for="item2 in tableDistricts" v-if="item1.id===item2.region_id" style="display:none;" :class="item1.name.replace(' ','_')">


            <td style="padding:0;">


            <div style="padding:7px;color:rgb(244, 246, 246);background:rgb(244, 246, 246)">
            {{ item2.name.toUpperCase()}}
            </div>

            <div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125)">
            {{ item2.name.toUpperCase()}}
            </div>
            <div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125)">
            {{ item2.name.toUpperCase()}}
            </div>



            </td>





            <td style="padding:0;">
            <div style="padding:7px;background:rgb(244, 246, 246);font-weight:bold;">
            {{ item2.name.toUpperCase()}}
            </div>

            <div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125);">
            {{ item2.name.toUpperCase()}}
            </div>
            <div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125);">
            {{ item2.name.toUpperCase()}}
            </div>


            </td>
            <td style="padding:0;">
            <div style="padding:7px;color:rgb(244, 246, 246);background:rgb(244, 246, 246);">
            {{ item2.name.toUpperCase()}}
            </div>
            <div style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">Government</div>
            <div style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">Private</div>
            </td>

            <td v-for="item3 in tableTotals" v-if="item2.id===item3.id" style="width:100px;padding:0;">
            <div style="padding:7px;background:rgb(244, 246, 246);font-weight:bold;">
            {{item3.totals}}
            </div>

            <div style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">{{  item3.government }}</div>
            <div style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">{{  item3.private }}</div>

            </td>




            </tr>




            </tbody>
            <tbody style="background:#F4F6F6;border:none;margin:0px;">
                <tr>
            <th colspan="3" style="border-top:solid thin #87CEFA">TOTAL</th>
            <th v-for="grandSum in tableGrandTotal" style="border-top:solid thin #87CEFA">
             {{ grandSum }}
            </th>
            </tr>
            </tbody>
            </table>






<table class="table" id="table2" style="padding:0px;margin:0px;display: none;">
<thead>
<tr>
<th scope="col" style="vertical-align: top;text-transform:capitalize;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in tableHeader" >{{ head}}</th>
</tr>
</thead>
<tbody v-for="item1 in tableRegions" style="border:none;">
<!--Region level-->
<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;">
<th colspan="3">
<a href="javascript:void(0);" style="color:black;" @click="toggleCollapseTable(item1)">

<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>

{{ item1.name }}
</a>

</th>

<td v-for="rtt in tableRegionSum" v-if="rtt.id===item1.id">
{{ rtt.total }}
</td>

</tr>



<tr  :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;">
<th colspan="3">

<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
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


<td style="padding:0px;">
<div style="padding:7px;color:rgb(244, 246, 246);background:rgb(244, 246, 246)">
{{ item2.name.toUpperCase()}}
</div><div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125)">
{{ item2.name.toUpperCase()}}
</div>

</td>

<td style="padding:0;">
<div style="padding:7px;background:rgb(244, 246, 246);font-weight:bold;">
{{ item2.name.toUpperCase()}}
</div>

<div style="padding:7px;color:white;border-top:solid thin rgba(0, 0, 0, 0.125);">
{{ item2.name.toUpperCase()}}
</div>
</td>
<td style="padding:0;">
<div style="padding:7px;color:rgb(244, 246, 246);background:rgb(244, 246, 246);">
{{ item2.name.toUpperCase()}}
</div><div v-if="genderName===1" style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">Government</div>
<div v-else-if="genderName===2" style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">Private</div>
</td>
<td v-for="item3 in tableTotals" v-if="item2.id===item3.id" style="width:100px;padding:0;">
<div style="padding:7px;background:rgb(244, 246, 246);font-weight:bold;">
{{item3.totals}}
</div><div v-if="genderName===1" style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">{{  item3.government }}</div>
<div v-else-if="genderName===2" style="padding:7px;border-top:solid thin rgba(0, 0, 0, 0.125);border-left:solid thin rgba(0, 0, 0, 0.125)">{{  item3.private }}</div>
</td>




</tr>




</tbody>
<tbody style="background:#F4F6F6;border:none;margin:0px;">
    <tr>
<th colspan="3" style="border-top:solid thin #87CEFA">TOTAL</th>
<th v-for="grandSum in tableGrandTotal" style="border-top:solid thin #87CEFA">
 {{ grandSum }}
</th>
</tr>
</tbody>
</table>





</div>




</div><!-- .card-inner -->




<div v-else >No  content</div>
</div>

</div>

<div v-if="dataLoadingdd">
<div style="white-space: nowrap; padding:10px">
<b-spinner small style="height: 16px;width:16px;"></b-spinner>
<span style="font-weight: 600;padding-left:6px;">Loading...</span>
</div>
</div>
<!---Chart_view-->
<div v-else-if="reportType==='chart'">


<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">


<div style="width:70%;margin-left:15%;margin-right:15%;">

<h6 class="nk-block-title" style="padding-bottom:20px;"> Water  Source  by Ownership and Region  <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span> </h6>

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
note:'',
 selectedId:'',
back:false,

//table content
tableHeader:null,
tableBody:null,
tableRegions:null,
tableDistricts:null,
tableRegionSum:null,
tableGrandTotal:null,
tableYears:null,
toYear:'',
fromYear:'',
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
genderName:'',
allDistricts:'',
numRows:'',
//seach

countryRegion:'',
allFilteryear:'',
tableMale:'',
tableFemale:'',
tableTotals:'',
qualification:'',
qualificationId:'',
tgender:'',
tablequalification:'',
tdistance:'',
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
this.tableTitle=title;
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
if(this.selectedRegion!=='' ||
 this.selectedDistrict!=='' ||
 this.selectedYear!==''||
this.qualificationId!==''||
this.tgender!==''
){

this.dataLoading=true;
var session=this.$session.get('userData');
const searchData = {
    region:this.selectedRegion,district:this.selectedDistrict,year:this.selectedYear,distance:this.qualificationId,status:this.tgender};
const headers = {
'Authorization':'Bearer '+session
};

if(this.selectedYear===''){
}else{
this.checkYear=false;
}

this.axios.post('/api/filter/primary/school/distance/water/source',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
this.dataLoading=false;
this.back=true;
this.genderName=this.tgender;
if(this.genderName!==''){
    $('#table1').hide();
    $('#table2').show();
}else{
    $('#table1').show();
    $('#table2').hide();
}
this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.region;
this.tableDistricts=response.data.district;
this.tableMale=response.data.males;
this.tableFemale=response.data.females;
this.tableTotals=response.data.body;
 this.tableRegionSum=response.data.region_total;
 this.tableGrandTotal=response.data.bottom_total;
this.chartData=response.data.tableChart;

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



advancedFilter:function(){
    $('#table1').show();
    $('#table2').hide();
if(this.fromYear!=='' && this.toYear!=='' && this.selectedId!==''){
if(this.fromYear < this.toYear &&
this.toYear!==this.fromYear){
this.note='';
this.$store.state.loading_status=true;
var session=this.$session.get('userData');
const searchData = {fromYear:this.fromYear,toYear:this.toYear,selectedId:this.selectedId};
const headers = {
'Authorization':'Bearer '+session
};

if(this.selectedYear===''){
}else{
this.checkYear=false;
}

this.axios.post('/api/primary/school/distance/water/source/advanced-filter',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
    this.$store.state.loading_status=false;
this.dataLoading=false;
this.back=true;
this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.region;
this.tableDistricts=response.data.district;
this.tableMale=response.data.males;
this.tableFemale=response.data.females;
this.tableTotals=response.data.body;
 this.tableRegionSum=response.data.region_total;
 this.tableGrandTotal=response.data.bottom_total;
 this.chartData=response.data.tableChart;
if(this.selectedYear===''){
}else{
this.$store.state.enrolment_year='  '+this.selectedYear;
}

if(this.fromYear!==''&&this.toYear!==''){
    this.$store.state.enrolment_year= this.fromYear+'-'+this.toYear;
}else{

}
}})
.catch(error => {console.log('No Result')})
}else{
this.note=' End Year should be great than Start Year  ';
}
 }else{
   this.note='Fill all fields';
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
.get('/api/primary/school/distance/water/source',{headers})
.then(response =>{
this.status=response.status;

if(response.status===200){
this.selectedRegion='';
this.selectedDistrict='';
this.toYear='';
this.fromYear='';
this.selectedYear='';
this.qualificationId='';
this.tgender='';
this.checkYear=true;
// if(this.selectedYear===''){
// }else{

// this.$store.state.enrolment_year=response.data.fromTo;

// }

this.back=false;
this.dataLoadingdd=false;

this.tableHeader=response.data.header;
this.tableBody=response.data.body;
this.tableRegions=response.data.region;
this.tableDistricts=response.data.district;
this.allRegions=response.data.tableRegions;

this.tableMale=response.data.males;
this.tableFemale=response.data.females;
this.tableTotals=response.data.body;
 this.tableRegionSum=response.data.region_total;
 this.tableGrandTotal=response.data.bottom_total;
this.chartData=response.data.tableChart;

  this.allDistricts=response.data.district;
 this.tableYears=response.data.select_year;
 this.allRegions=response.data.region;

this.numRows=response.data.numRows;

this.qualification=response.data.status;
this.tdistance=response.data.distance;

this.tablequalification=response.data.select_qualification;
 this.$store.state.enrolment_year=response.data.school_year;

 this.$store.state.reportTitle='by Ownership and Region';



}else{

//this.errorMessage='Loading...';
}
} )
.catch(error => console.log(error));
$('#table1').show();
    $('#table2').hide();
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
