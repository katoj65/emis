<template>
<div>
<div class="card card-stretch" style="padding: 0">
<div class="card-inner-group">
<div>
<!---FILTER---->
<form @submit.prevent="filterSchool">
<div class="nk-ibx-head">
<div class="nk-ibx-head-actions">
<ul class="nk-ibx-head-tools g-1" v-if="search === 'false'">
<li v-if="back" style="margin-right:0px;padding:0px;">
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
<li><a  style="cursor: pointer;"    @click="mainMenu('table1','BY STATUS')">Primary School Type Border Status</a></li>
<li><a  style="cursor: pointer;"    @click="mainMenu('table2','BY  REGION')">Primary School Type By Region</a></li>

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
@change="changefilterSchool"
class="form-control"
style="width: 140px;padding:4px"
v-model="schoolType"
>
<option value="">Select School Type</option>
<option v-for="n in school_typed" v-bind:value="n.id">
{{ n.item }}
</option>
</select>
</li>


<li id="hideInput">
<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 120px;padding:4px"
v-model="selectedYear"
>
<option value="" > Select year</option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr.school_year"
>
{{yr.school_year}}
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
@click="filterSchool"
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
<label class="form-label">End Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="toYear">
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




</div>
</div>
<br/><br/>
<div class="modal-footer bg-light">
<span class="sub-text">

<a v-if="toYear!== '' && fromYear!== '' && note=== ''"
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
<div  v-if="numRows > 0" >

<div style="overflow: auto; width: 100%; overflow-y: hidden">
<table class="table">
<thead>
<tr>
<th scope="col" style="vertical-align: top;text-transform: capitalize;background: #f4f6f6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">
{{ head }}
</th>
</tr>
</thead>

<tbody v-for="list in school_type" style="border: none">
<tr
:class="list.item.replace(' ', '_')"
style="border-top: solid thin #e5e9f2"
>
</tr>

<tr
:class="list.item.replace(' ', '_')"
style="border-top:solid thin #e5e9f2;background:#EBF5FB ;"
>
<th :colspan="headers.length+1" style="padding: 10px">
<a style="color: black; text-transform: uppercase">


{{ list.item }}</a
>
</th>
</tr>

<tr>
<td></td>
<td v-for="dList in school_count" v-if="dList.id === list.id">{{ dList.item }}</td>
</tr>
</tbody>

<tbody style="background:#F4F6F6;border:none">
<th colspan="1" style="border-top:solid  1px #87CEFA;">TOTAL</th>

<th v-for="grand in grandTotal" style="border-top:solid  1px #87CEFA;">


{{ grand }}


</th>

</tbody>
</table>
</div>

<!-- .card-inner -->
</div>

<div v-else  style="padding: 16px; font-weight: 500">No content</div>


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






<h6 class="nk-block-title" style="padding-bottom:5px;">PRIMARY SCHOOL BOARDER STATUS <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<bar-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Number of Schools" ytitle="School Years" height="600px" style="padding-top:10px;"
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
school_typed:'',
status: null,
note:'',
back:false,
//allRegions:null,
regionTotal: null,
classes: null,
school_count: null,
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

//custom data
menu: "table",
dataLoadingdd: false,
viewOption: "customTable",
//filter
schoolType: "",
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
numRows: "",
toYear:'',
fromYear:'',
advClass:'',
school_count_total:'',
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

changefilterSchool: function () {
var session = this.$session.get("userData");
const searchData = { id: this.schoolType };
const headers = {
Authorization: "Bearer " + session,
};
//alert(this.schoolType);
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
filterSchool: function () {


if (
this.schoolType !== "" ||
this.selectedYear !== ""

) {
this.filterLoading = true;
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
id: this.schoolType,
year: this.selectedYear,

};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/filter/primary/school/border/status", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
    this.back=true;
this.filterLoading = false;
this.school_type = response.data.school_type;
this.grandTotal = response.data.grand_total;
this.headers = response.data.header;
this.school_count = response.data.school_count;
this.chartData=response.data.chartData;
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
this.fromYear!== ""
) {

    if(this.fromYear < this.toYear &&
this.toYear!==this.fromYear){
this.$store.state.loading_status=true;
this.note='';
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
toYear: this.toYear,
fromYear: this.fromYear,

};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/primary/school/border/status/advanced-filter", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
    this.back=true;
this.$store.state.loading_status=false;
if(this.selectedYear!==''){this.checkYear=false;}
this.school_type = response.data.school_type;
this.grandTotal = response.data.grand_total;
this.headers = response.data.header;
this.school_count = response.data.school_count;
this.$store.state.enrolment_year=this.fromYear +'-'+ this.toYear;

}
})
.catch((error) => {
console.log("No Result");
});
} else {
    this.note='End Year should be great than Start Year';
}
} else {
    this.note='Fill all fields';
}
},






tableApi: function () {
this.schoolType="" ;
this.selectedYear="";
this.toYear= "";
this.fromYear= "";
this.$store.state.enrolment_year='';
//this.checkYear=true;
var session = this.$session.get("userData");

this.dataLoadingdd = true;

$("#selected2").hide();
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.get("/api/primary/school/border/status", { headers })
.then((response) => {
this.status = response.status;

if (response.status === 200) {
    this.back=false;
this.dataLoadingdd = false;
this.errorMessaged = false;

this.school_type = response.data.school_type;
this.grandTotal = response.data.grand_total;
this.headers = response.data.header;
this.school_count = response.data.school_count;
this.chartData=response.data.chartData;
this.school_typed = response.data.school_type;
this.numRows = response.data.numRows;
this.enrolmentYear = response.data.allyears;

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
