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
<li v-if="back" style="margin-right:0px;">
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
<li><a  style="cursor: pointer;" @click="mainMenu('table2','By Class')">Enrolment by Class</a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table1','By Region')">Enrolment By Region</a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table5','By Age')">Enrolment by Age</a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table4','By Nationality and Class')">Enrolment by Nationality and Class</a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table6','By ownership and Year')">Enrolment by ownership and Year </a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table7','By  Class and  Year ')">Enrolment by Class and  Year</a></li>
</ul>
</div>


</div>

    </li>

<li id="filterShow" tyle="cursor: pointer;">
<em
class="icon ni ni-filter-alt"
style="color: #000; font-size: 18px"
></em>
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
v-model="sortGender"
>
<option value="">Sort by class</option>
<option
v-if="nunRows > 0"
v-for="c in allclasses"
v-bind:value="c.education_grade"
>
{{c.education_grade}}
</option>
</select>
</li>

<li id="hideInput">
<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width:80px;padding:4px"
v-model="selectedYear"
>
<option value="" v-if="checkYear">{{$store.state.enrolment_year}}</option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr"
>
{{yr}}
</option>
</select>
</li>

<li></li>
<li v-if="filterLoading && !$store.state.loading_status">
<div style="white-space: nowrap;background:#1CA1C1;color:white" class="btn btn-light">
<b-spinner small style="height: 16px; width: 16px"></b-spinner>
<span style="font-weight: 600; padding-left: 6px">Loading...</span>
</div>
</li>
<li v-else-if="$store.state.loading_status" id="hideInput"><a href="javascript:void(0);" class="btn" style="background:#1CA1C1;color:white">Filter</a></li>
<li v-else id="hideInput">
<a
href="javascript:void(0);"
class="btn"
 style="background:#1CA1C1;color:white"
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

<form v-if="filterLoading"></form>
<form v-else @submit.prevent="advancedFilter">
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced Filter</h5>
</div>
<div style="padding-top:6px;text-align: center;color: red;">{{note}}</div>
<div class="modal-body" style="padding: 40px; padding-bottom: 0">

    <div class="row gy-4" style="padding-top: 0; padding-bottom: 0">

<div class="col-sm-6">
<div class="form-group">
<label class="form-label">Start Years</label>
<div class="form-control-wrap">
<select class="form-control" v-model="fromYear" id="default-06">
<option value="">From</option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr"
>
{{ yr }}
</option>
</select>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label class="form-label">End Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="toYear">
<option value="">To </option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr"
>
{{ yr }}
</option>
</select>
</div>
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select Class</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="advClass">
<option value="">Class</option>

<option
v-if="nunRows > 0"
v-for="c in allclasses"
v-bind:value="c.education_grade"
>
{{ c.education_grade }}
</option>
</select>
</div>
</div>
</div>


</div>
</div>
<br/><br/>
<div class="modal-footer bg-light">
<span class="sub-text">

<a v-if="toYear!== '' && fromYear!== '' && advClass!== '' && note===''"
href="javasript:void(0)"
class="btn btn-primary"
data-dismiss="modal"
aria-label="Close"
@click="advancedFilter()"
>Submit</a
>
<a v-else  style="cursor: pointer;color:#fff;"
class="btn btn-primary"

@click="advancedFilter()">Submit</a>
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
<div v-if="reportType=== 'table'">
<div v-if="status === 200">
<div  v-if="nunRows > 0 ">

<div style="overflow: auto; width: 100%; overflow-y: hidden">
<table class="table">
<thead>
<tr>
<th scope="col" style="vertical-align: top;width: 100px;text-transform: capitalize;background: #f4f6f6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">
{{ head }}
</th>
</tr>
</thead>

<tbody v-for="list in region" style="border: none">
<tr
:class="list.name.replace(' ', '_')"
style="border-top: solid thin #e5e9f2"
>
<th colspan="2" style="padding: 10px">
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





<td
v-for="rw in row_region"
v-if="rw.region === list.id"
>
<span v-for="item3 in rw.item">
{{ item3 }}
</span>
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
<td v-for="dd in content" v-if="dd.district === dList.id">
<span v-for="ii in dd.item">{{ ii }}</span>
</td>
</tr>
</tbody>

<tbody style="background:#F4F6F6;border:none">
<th colspan="2" style="border-top:solid  1px #87CEFA;">TOTAL</th>

<th v-for="grand in grandTotal" style="border-top:solid  1px #87CEFA;">


{{ grand }}


</th>

</tbody>
</table>
</div>

<!-- .card-inner -->
</div>

<div  v-else style="padding: 16px; font-weight: 500">No content</div>


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






<h6 class="nk-block-title" style="padding-bottom:5px;">PRIMARY SCHOOL ENROLMENT BY CLASS <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<column-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Primary Classes" ytitle="Learners Population" height="600px" style="padding-top:10px;"
></column-chart>


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
region: null,
status: null,
note:'',
//allRegions:null,
regionTotal: null,
classes: null,
district: null,
checkYear:true,
headers: null,
content: null,
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
back:false,
//custom data
menu: "table",
dataLoadingdd: false,
viewOption: "customTable",
//filter
selectedRegion: "",
selectedDistrict: "",
allRegions: "",
selectedYear: "",
selectregion: "",
allDistricts: "",
dataLoading: false,
filterLoading: false,
regionDistrict: "",
selectDistrict: "",
allregion: "",
sortGender: "",
allclasses:'',
nunRows: "",
toYear:'',
fromYear:'',
advClass:'',
district_total:'',
//seach

countryRegion: "",
row_region:"",
//Chart data
chartData:null,
chartColor:null,

reportType:'table'



};
},

//search method
methods: {

changeReport:function(item){
this.reportType=item;
},

mainMenu: function (item,title) {
this.menu = item;
this.tableTitle=title;
this.$store.state.reportTitle=title;
this.$store.state.reportMenu=item;
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

//seach

changefilterRegion: function () {
var session = this.$session.get("userData");
const searchData = { id: this.selectedRegion };
const headers = {
Authorization: "Bearer " + session,
};
//alert(this.selectedRegion);
this.axios
.post("/api/filter/primary/enrolment/region/class", searchData, { headers })
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
this.sortGender !== ""
) {
this.filterLoading = true;
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
id: this.selectedRegion,
district: this.selectedDistrict,
enrolment_year: this.selectedYear,
class: this.sortGender,
};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/filter/primary/enrolment/region/class", searchData, { headers })
.then((response) => {

var status = response.status;
this.status = response.status;
if (status === 200) {
this.filterLoading = false;
this.back=true;
if(this.selectedYear!==''){this.checkYear=false;}

this.region = response.data.region;

 //this.allRegions = response.data.allRegions;
 this.headers = response.data.header;
 this.district = response.data.district;
 this.content = response.data.tableBody;
 this.regionTotal = response.data.region_total;
 this.grandTotal = response.data.bottom_total;
 this.district_total = response.data.district_total;
 this.row_region= response.data.row_region;
 //this.allclasses=response.data.allclasses;
 //this.enrolmentYear = response.data.filterYears;
 this.defYear = response.data.defYear;
 //this.allDistricts = response.data.allDistricts;
  this.chartData=response.data.tableChart;
// this.nunRows = response.data.numRows;


if(this.selectedYear!==''){
this.$store.state.enrolment_year=this.selectedYear;
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






//filter Api
advancedFilter: function () {
if (
this.toYear!== ""&&
this.fromYear!== "" &&
this.advClass!== ""
) {
if ( this.fromYear  < this.toYear && this.toYear!==this.fromYear) {
this.$store.state.loading_status=true;
this.note='';
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
toYear: this.toYear,
fromYear: this.fromYear,
advClass: this.advClass,
};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/primary/enrolment/region/class/advanced-filter", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
    this.back=true;

this.$store.state.loading_status=false;
this.region = response.data.region;
 this.headers = response.data.header;
 this.district = response.data.district;
 this.content = response.data.tableBody;
 this.regionTotal = response.data.region_total;
 this.grandTotal = response.data.bottom_total;
 this.district_total = response.data.district_total;
 this.row_region= response.data.row_region;
 //this.allclasses=response.data.allclasses;
 //this.enrolmentYear = response.data.filterYears;
 this.defYear = response.data.defYear;
 //this.allDistricts = response.data.allDistricts;
  this.chartData=response.data.tableChart;
 this.$store.state.enrolment_year=this.fromYear +'-'+ this.toYear;

}
})
.catch((error) => {
console.log("No Result");
});
}else{
    this.note='End Year should be great than Start Year';
}
}
else {
    this.note='Fill all fields';
}
},






tableApi: function () {
var session = this.$session.get("userData");

this.dataLoadingdd = true;
this.selectedRegion="" ;
this.selectedDistrict="";
this.selectedYear="";
this.sortGender="";
this.toYear= "";
this.fromYear= "";
this.advClass= "";
$("#selected2").hide();
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.get("/api/primary/enrolment/region/class", { headers })
.then((response) => {
this.status = response.status;

if (response.status === 200) {
this.dataLoadingdd = false;
this.errorMessaged = false;
this.back=false;
  this.region = response.data.region;
 this.allRegions = response.data.allRegions;
 this.headers = response.data.header;
 this.district = response.data.district;
 this.content = response.data.tableBody;
 this.regionTotal = response.data.region_total;
 this.grandTotal = response.data.bottom_total;
 this.district_total = response.data.district_total;
 this.row_region= response.data.row_region;
 this.allclasses=response.data.allclasses;
 this.enrolmentYear = response.data.filterYears;
 this.defYear = response.data.defYear;
 this.allDistricts = response.data.allDistricts;
 this.chartData=response.data.tableChart;
 this.nunRows = response.data.numRows;
this.$store.state.enrolment_year='  '+response.data.enrolment_year;



//this.errorMessage='Loading...';
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
