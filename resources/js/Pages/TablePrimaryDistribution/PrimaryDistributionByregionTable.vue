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
<li id="filterShow" tyle="cursor: pointer;">
<em
class="icon ni ni-filter-alt"
style="color: #000; font-size: 18px"
></em>
</li>

<li id="hideInput">
<select

class="form-control"
style="width: 120px;padding:4px"
v-model="selectedRegion"
>
<option value="">Select founder</option>
<option v-for="n in allfounder" v-bind:value="n.name">
{{ n.name }}
</option>
</select>
</li>

<li id="hideInput">
<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 118px;padding:4px"
v-model="sortStatus"
>
<option value="">Select status</option>
<option v-for="status in getstatus" v-if="nunRows > 0" v-bind:value="status.	school_region">
{{status.school_region}}
</option>

</select>
</li>

<li id="hideInput">

<select
class="form-control"
id="default-01"
placeholder="Input placeholder"
style="width: 118px;padding:4px"
v-model="selectedYear"
>
<option value="" v-if="checkYear"> {{ $store.state.enrolment_year }}</option>
<option
v-for="yr in enrolmentYear"
v-bind:value="yr"
>
{{ yr }}
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
<ul class="nk-ibx-head-tools g-1">

</ul>

<!--Search -->
<!--Filter-->
<form @submit.prevent="filterRegion">
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced Filter</h5>
</div>
<div class="modal-body" style="padding: 40px; padding-bottom: 0">
<div class="row gy-4" style="padding-top: 0; padding-bottom: 0">
<div class="col-sm-6">
<div class="form-group">
<label class="form-label">Range of Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06">
<option value="default_option">From Year</option>
<option
value="option_select_name"
v-for="yr in years"
>
{{ yr.year }}
</option>
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
<option
value="option_select_name"
v-for="yr in years"
>
{{ yr.year }}
</option>
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
<option
v-bind:value="rg.region"
v-for="rg in allregion"
>
{{ rg.region }}
</option>
</select>
</div>
</div>
</div>

<div class="col-sm-12" style="text-align: center">
<div class="form-group">
<div class="preview-block">
<span class="preview-title overline-title"
>Change Report View Format</span
>
<div style="padding-top: 10px">
<span>
<label
><input
type="radio"
name="view"
style="width: 15px; height: 15px"
value="table"
@click="viewSelect('customTable')"
checked
/>
Table View</label
>
</span>

<span style="margin-left: 50px">
<label
><input
type="radio"
name="view"
style="width: 15px; height: 15px"
value="chart"
@click="viewSelect('customChart')"
/>
Chart View</label
>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer bg-light">
<span class="sub-text">
<a
href="javasript:void(0)"
class="btn btn-primary"
data-dismiss="modal"
aria-label="Close"
@click="customMenu()"
>Submit</a
>
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
<div v-if="menu === 'table'">
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
<tbody v-for="list in founder" style="border: none">
<tr

style="border-top: solid thin #e5e9f2;background:#EBF5FB;"
>
<th  style="padding: 10px">
<a
href="javascript:void(0);"
style="color: black; text-transform: uppercase"
>
{{ list.name }}</a
>
</th>
<td  v-for="regtt in tableBody" v-if="regtt.founder === list.name" >
{{regtt.item}}
</td>
<td   v-for="tt in founderTotal" v-if="tt.founder === list.name" >
{{tt.total}}
</td>
</tr>
</tbody>
<tbody style="background: #f4f6f6;border-top:solid  1px #87CEFA;">
<th>TOTAL</th>
<th  v-for="clas in classes">
{{clas}}
</th>
</tbody>
</table>


</div>

<!-- .card-inner -->
</div>
<div v-else style="padding: 16px; font-weight: 500">No content</div>

</div>
</div>










<!-- .card-inner-group -->
<!---Chart_view-->
<div v-else-if="menu === 'chart'">


<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">



<a href="javascript:void(0)" style="right:20px;position:absolute;color:black;" @click="mainMenu('table')">
<em class="icon ni ni-cross-circle" style="font-size:25px;"></em>
</a>




<div style="width:70%;margin-left:15%;margin-right:15%;">






<h6 class="nk-block-title" style="padding-bottom:5px;">PRIMARY SCHOOLS DISTRIBUTION BY REGION AND FOUNDING BODY <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


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
founder: null,
status: null,
//allRegions:null,
regionTotal: null,
tableBody:'',
sfounder:'',
classes: null,
founderTotal:null,
allfounder:null,
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
//seach

founder: "",
filterYear:this.$store.state.enrolment_year,

//Chart data
chartData:null,
chartColor:null,





};
},

//search method
methods: {
mainMenu: function (item) {
this.menu = item;
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

//search
searchRegion: function () {
var countWord = this.sfounder.length;

if (countWord > 3 || countWord === 3) {
var session = this.$session.get("userData");
const searchData = { founder: this.sfounder };
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/search/primary/school/distribution/school_region", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
this.founder = response.data.schoolFounder;
this.tableBody = response.data.tableBody;
this.founderTotal=response.data.founderTotal;

$('#table2').hide();
if (response.data.noResults > 0) {
$("#table1").show();
$("#hideResult").hide();
} else {
$("#table1").hide();
$("#hideResult").show();
}
}
})
.catch((error) => {
console.log("No Result");
});
} else {
this.tableApi();
$("#table1").show();
$("#hideResult").hide();
this.dataLoadingdd = false;
}
},



//filter Api
filterRegion: function () {
if (
this.selectedRegion !== "" ||
this.selectedYear !== "" ||
this.sortStatus !== ""
) {
this.filterLoading = true;
//this.dataLoading=true;
var session = this.$session.get("userData");
const searchData = {
id: this.selectedRegion,
enrolment_year: this.selectedYear,
status: this.sortStatus,
};
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.post("/api/filter/primary/school/distribution/school_region", searchData, { headers })
.then((response) => {
var status = response.status;
this.status = response.status;
if (status === 200) {
this.filterLoading = false;
if(this.selectedYear!==''){
this.checkYear=false;
}

this.founder = response.data.schoolFounder;
this.tableBody = response.data.tableBody;
this.founderTotal=response.data.founderTotal;
this.classes = response.data.grandTotal;
this.headers = response.data.header;

this.chartData=response.data.chartData;

if(this.selectedYear!==''){
this.$store.state.enrolment_year=' '+this.selectedYear;
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






tableApi: function () {
var session = this.$session.get("userData");

this.dataLoadingdd = true;

$("#selected2").hide();
const headers = {
Authorization: "Bearer " + session,
};
this.axios
.get("/api/primary/school/distribution/school_region", { headers })
.then((response) => {
this.status = response.status;

if (response.status === 200) {
this.dataLoadingdd = false;
this.errorMessaged = false;

this.founder = response.data.schoolFounder;
this.tableBody = response.data.tableBody;
this.founderTotal=response.data.founderTotal;
this.classes = response.data.grandTotal;
this.enrolmentYear = response.data.filterYear;
this.headers = response.data.header;
this.allfounder= response.data.allFounder;



this.chartData=response.data.chartData;

this.getstatus=response.data.schoolRegion;

this.nunRows= response.data.numRows;
this.$store.state.enrolment_year=' '+response.data.defaultYear;
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
