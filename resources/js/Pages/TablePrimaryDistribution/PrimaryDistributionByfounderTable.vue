<template>
<div>
<div class="card card-stretch" style="padding: 0">
<div class="card-inner-group">
<div>
<!---FILTER---->
<form @submit.prevent="filterRegion">
<div class="nk-ibx-head">
<div class="nk-ibx-head-actions">
<ul class="nk-ibx-head-tools g-1" v-if="search === 'false'">

    <li v-if="back" style="margin-right:0px;padding:0px;">
        <a  style="color:gray;cursor:pointer;" @click="tableApi()" class="btn btn-light">
        <em class="icon ni ni-arrow-left" style="font-weight:bold;font-size:20px;"></em>
        </a>
        </li>




<li>

<div id="dropdown" class="dropdown" style="margin:0;">

<a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:180px;padding:6px;">
<span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="position:absolute">
<ul class="link-list-plain">
<li><a  style="cursor:pointer;"      @click="mainMenu('table1','BY BOARDER STATUS')">Primary School Type By  Boarder Status</a></li>
<li><a  style="cursor:pointer;"@click="mainMenu('table2','BY  REGION')">Primary School Type By Region</a></li>

</ul>
</div>


</div>

    </li>
<li id="hideInput">
<select
@change="changefilterRegion"
class="form-control"
style="width: 110px;padding:4px"
v-model="selectedRegion"
>
<option value="">Select Region</option>
<option v-for="n in allRegions" v-bind:value="n.id">
{{ n.name }}
</option>
</select>
</li>
<li id="hideInput">
<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 110px;padding:4px"
v-model="selectedDistrict"
>
<option value="">Select District</option>
<option v-for="x in allDistricts" v-bind:value="x.id">
{{ x.name }}
</option>
</select>
</li>
<li id="hideInput">
<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 110px;padding:4px"
v-model="sortStatus"
>
<option value="">Select status</option>
<option v-for="status in getstatus" v-if="nunRows > 0" v-bind:value="status.name">
{{status.name}}
</option>

</select>
</li>

<li id="hideInput">

<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 80px;padding:4px"
v-model="selectedYear"
>
<option value="" v-if="checkYear"> {{ $store.state.enrolment_year }}</option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr.school_year"
>
{{ yr.school_year }}
</option>
</select>
</li>

<li></li>
<li v-if="filterLoading">
<div style="white-space: nowrap;background:#1CA1C1;color:white" class="btn">
<b-spinner small style="height: 16px; width: 16px"></b-spinner>
<span style="font-weight: 600; padding-left: 6px">Loading...</span>
</div>
</li>

<li v-else id="hideInput">
<a
href="javascript:void(0);"
class="btn" style="background:#1CA1C1;color:white"
@click="filterRegion"
>Filter</a
>
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
<option
v-for="yr in enrolmentYear"
v-bind:value="yr.school_year"
>
{{ yr.school_year }}
</option>
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
<option
v-for="yr in enrolmentYear"
v-bind:value="yr.school_year"
>
{{ yr.school_year }}
</option>
</select>
</div>
</div>


</div>



<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select School Type </label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="statused">
<option value="">Select Status</option>
<option v-for="status in getstatus" v-if="nunRows > 0" v-bind:value="status.name">
{{status.name}}
</option>
</select>
</div>
</div>
</div>

</div>

</div>
<br/>
<br/><br/>

<div class="modal-footer bg-light">
<span class="sub-text">

<span v-if="fromYear!=='' && toYear!=='' && statused!=='' && note===''" @click="advancedFilter" style="cursor:pointer;">
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
</div>
<!-- .card-inner -->

<div>
<div v-if="reportType === 'table'">
<div v-if="status === 200">
<div id="table1" v-if="nunRows > 0">
<div style="overflow: auto; width: 100%; overflow-y: hidden">
<table class="table">
<thead>
<tr>
<th scope="col" style="vertical-align: top;text-transform: capitalize;background: #f4f6f6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">
{{ head }}
</th>
</tr>
</thead>

<tbody v-for="list in region" style="border: none">
<tr
:class="list.name.replace(' ', '_')"
style="border-top: solid thin #e5e9f2"
>
<th  style="padding: 10px">
<a
href="javascript:void(0);"
style="color: black; text-transform: uppercase"
@click="toggleCollapseTable(list)"
>
<em
class="icon ni ni-plus"
style="color: gray"
:class="list.name.replace(' ', '_')"
></em>
<em
class="icon ni ni-minus"
style="color: gray; display: none"
:class="list.name.replace(' ', '_')"
></em>
{{ list.name }}</a
>
</th>

<td>

</td>
<td  v-for="regtt in regionTotal" v-if="regtt.region === list.id" >
{{regtt.sum}}
</td>

</tr>

<tr
:class="list.name.replace(' ', '_')"
style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;"
>
<th :colspan="headers.length+1" style="padding: 10px">
<a
href="javascript:void(0);"
style="color: black; text-transform: uppercase"
@click="toggleCollapseTable(list)"
>
<em
class="icon ni ni-plus"
style="color: gray"
:class="list.name.replace(' ', '_')"
></em>
<em
class="icon ni ni-minus"
style="color: gray; display: none"
:class="list.name.replace(' ', '_')"
></em>
{{ list.name }}</a
>
</th>
</tr>

<tr
v-for="dList in district"
v-if="dList.region_id === list.id"
:class="list.name.replace(' ', '_')"
style="display: none"
>
<td></td>
<td>{{ dList.name }}</td>
<td  v-for="st in content" v-if="st.district === dList.id">
    {{st.item}}
</td>


</tr>
</tbody>

<tbody style="background: #f4f6f6;border: none">
<th colspan="2" style="border-top:solid  1px #87CEFA;">TOTAL</th>
<th  v-for="clas in classes" style="border-top:solid  1px #87CEFA;">
{{clas}}
</th>

</tbody>
</table>








</div>

<!-- .card-inner -->
</div>
<div v-else style="padding: 16px; font-weight: 500">No content</div>
<div id="hideResult" style="display: none; padding: 16px; font-weight: 500">
No Results
</div>
</div>
</div>










<!-- .card-inner-group -->
<!---Chart_view-->
<div v-else-if="reportType === 'chart'">


<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">






<div style="width:70%;margin-left:15%;margin-right:15%;">






<h6 class="nk-block-title" style="padding-bottom:5px;">PRIMARY SCHOOL OWNERSHIP BY FOUNDING ORGANISATION <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<bar-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Number of Schools" ytitle="School Founding Organisation" height="600px" style="padding-top:10px;"
></bar-chart>


</div>










</div><!-- .nk-coin-ovwg -->
</div><!-- .card-inner -->
</div>


<!---End Chart View---->




</div>
</div>






</div>
</div>
<div v-if="dataLoadingdd">
<div style="white-space: nowrap; padding: 10px">
<b-spinner small style="height: 16px; width: 16px"></b-spinner>
<span style="font-weight: 600; padding-left: 6px">Loading...</span>
</div>
</div>
</div>
</template>

<script>
export default {
props: {
subMenu: Array,
},

data() {
return {
path: this.$route.path,
search: "false",
sum_total: null,
Totalregion:null,
fromYear:'',
toYear:'',
note:'',
back:false,
region: null,
statused: '',
//allRegions:null,
regionTotal: null,
classes: null,
district: null,
headers: null,
content: null,
checkYear:true,
enrolmentYear: null,
defYear: null,

region_list: null,
grandTotal: null,
errorMessaged: false,
sorted: [{ type: "Male" }, { type: "Female" }],
sortButton: "Sort by Gender",
years: [
{ year: "2019", population: 300 },
{ year: "2018", population: 500 },
{ year: "2017", population: 700 },
{ year: "2016", population: 1300 },
],
selectYear: [
{ item: "2016" },
{ item: "2017" },
{ item: "2018" },
{ item: "2019" },
],
sum: null,
grand: null,
data: null,

//custom data
menu: "table",
dataLoadingdd: false,
viewOption: "customTable",
//filter
selectedRegion: "",
selectedDistrict: "",
selectedStatus: "",
allRegions: "",
selectedYear: "",
selectregion: "",
allDistricts: "",
dataLoading: false,
filterLoading: false,
regionDistrict: "",
selectDistrict: "",
allregion: "",
sortStatus: "",
allclasses:'',
nunRows: "",
getstatus:"",
status:"",
//seach

countryRegion: "",
filterYear:this.$store.state.enrolment_year,

//Chart data
chartData:null,
chartColor:null,


reportType:'table',



};
},

//search method
methods: {
mainMenu: function (item,title) {
this.menu = item;
this.tableTitle=title;
this.$store.state.reportTitle=title;
this.$store.state.reportMenu=item;
},



//change report type
changeReport:function(item){
this.reportType=item;
},


searchMethod: function (searched) {
this.search = searched;
$("#searchfocus").focus();
this.menu='table';

this.tableApi();
this.dataLoadingdd = false;
$("#table1").show();
$("#hideResult").hide();
},
sortButtonFunctionality: function (option) {
this.sortButton = option.type;
},
toggleCollapseTable: function (item) {
$("." + item.name).toggle();
},

//custom table menu
customMenu: function () {
this.menu = this.viewOption;
},

viewSelect: function (view) {
this.viewOption = view;
},

//exit custom report
exitCustom: function () {
this.menu = null;
},



changefilterRegion: function () {
var session = this.$session.get("userData");
const searchData = { id: this.selectedRegion };
const headers = {
Authorization: "Bearer " + session,
};

this.axios
.post("/api/filter/primary/school/distribution/category", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
this.allDistricts = response.data.allRegionsDis;
}
})
.catch((error) => {
console.log(error);
});
},

//filter Api
filterRegion: function () {
if (
this.selectedRegion !== "" ||
this.selectedDistrict !== "" ||
this.selectedYear !== "" ||
this.sortStatus !== ""
) {
this.filterLoading = true;
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
id: this.selectedRegion,
district: this.selectedDistrict,
enrolment_year: this.selectedYear,
status: this.sortStatus,
};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/filter/primary/school/distribution/category", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {

    this.back=true;
this.filterLoading = false;
if(this.selectedYear!==''){
this.checkYear=false;
}

this.region = response.data.table_region;
//this.allRegions = response.data.table_region;
this.headers = response.data.tableHeader;
this.district = response.data.table_district;
this.content = response.data.tableSchool;
this.regionTotal = response.data.sumRegion;
this.classes = response.data.uganda;
//this.allDistricts = response.data.table_district;
this.enrolmentYear = response.data.table_years;
this.chartData=response.data.chartData;
this.sum_total=response.data.sumDistrict
this.Totalregion=response.data.regionTotal;
if(this.sortStatus!==''){
    $('#table2').show();
    $('#table').hide();
}else{
    $('#table2').hide();
    $('#table').show();
}
if(this.selectedYear!==''){
this.$store.state.enrolment_year=' '+response.data.enrolment_year;
}
}
})
.catch((error) => {
console.log("No Result");
});
} else {
this.tableApi();
this.dataLoadingdd = false;
}
},



advancedFilter:function(){
if(this.fromYear!=='' && this.toYear!=='' && this.statused){
    if(this.fromYear < this.toYear &&
this.toYear!==this.fromYear){
this.note='';
this.$store.state.loading_status=true;
var session=this.$session.get('userData');
const searchData = {fromYear:this.fromYear,
toYear:this.toYear
,statused:this.statused
};
const headers = {
'Authorization':'Bearer '+session
};

if(this.selectedYear===''){
}else{
this.checkYear=false;
}

this.axios.post('/api/primary/school/distribution/category/advanced-filter',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
    this.back=true;
this.dataLoading=false;
this.$store.state.loading_status=false;
this.region = response.data.table_region;
this.headers = response.data.tableHeader;
this.district = response.data.table_district;
this.content = response.data.tableSchool;
this.regionTotal = response.data.sumRegion;
this.classes = response.data.uganda;
this.chartData=response.data.chartData;
this.sum_total=response.data.sumDistrict
this.Totalregion=response.data.regionTotal;
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
this.note='End Year should be great than Start Year';
}
}else{
this.note='Fill all fields';
}
 },


tableApi: function () {

var session = this.$session.get("userData");

this.dataLoadingdd = true;

$("#selected2").hide();
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.get("/api/primary/school/distribution/category", { headers })
.then((response) => {
this.status = response.status;

if (response.status === 200) {

    this.fromYear='';
     this.toYear='';
     this.statused='';
     this.selectedRegion="";
this.selectedDistrict="";
this.selectedYear="";
this.sortStatus="";
this.checkYear=true;
    this.back=false;
this.dataLoadingdd = false;
this.errorMessaged = false;

this.region = response.data.table_region;
this.allRegions = response.data.table_region;
this.headers = response.data.tableHeader;
this.district = response.data.table_district;
this.content = response.data.tableSchool;
this.regionTotal = response.data.sumRegion;
this.classes = response.data.uganda;
this.allDistricts = response.data.table_district;
this.enrolmentYear = response.data.table_years;
this.chartData=response.data.chartData;
this.sum_total=response.data.sumDistrict
this.Totalregion=response.data.regionTotal;
this.getstatus=response.data.getstatus;
this.$store.state.reportTitle='By founding organisation';
$('#table2').hide();
$('#table').show();

this.nunRows= response.data.numRows;
this.$store.state.enrolment_year=' '+response.data.enrolment_year;

}
})
.catch((error) => console.log(error));
},
},

mounted() {
this.tableApi();
},
};
</script>

<style>
@media only screen and (max-width: 1000px) {
#hideInput {
display: none;
}
#filterShow {
display: block;
}
table tr td,
table tr th {
text-transform: capitalize;
}
}

@media only screen and (min-width: 1000px) {
#filterShow {
display: none;
}
#hideInput {
display: grid;
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
