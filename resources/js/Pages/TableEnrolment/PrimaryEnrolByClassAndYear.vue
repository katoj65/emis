
<template>
<div>





<div class="card  card-stretch" style="padding:0;">


    <div class="card-inner-group">

                                <div>


<!---FILTER---->
<form  @submit.prevent="filterRegion">

<div class="nk-ibx-head">
<div class="nk-ibx-head-actions">

    <ul class="nk-ibx-head-tools g-1" v-if="search==='false'">
        <li v-if="back" style="margin-right:20px;">
<a href="javascript:void(0)" style="color:gray;" @click="tableApi()" class="btn btn-light">
<em class="icon ni ni-arrow-left" style="font-weight:bold;font-size:20px;"></em>
</a>
</li>
       <li>


    <div id="dropdown" class="dropdown" style="margin:0;">
    <div>
    <a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="dropdown" aria-expanded="false" style="width:190px;">
    <span id="hideWord">Select Report</span><em class="icon ni ni-chevron-down" style="float:right;margin-left:50px;"></em></a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1">
    <ul class="link-list-plain">
    <li><a style="cursor: pointer;" @click="mainMenu('table2','By Class')">Enrolment by Class</a></li>
    <li><a style="cursor: pointer;" @click="mainMenu('table1','By Region')">Enrolment By Region</a></li>
    <li><a style="cursor: pointer;" @click="mainMenu('table5','By Age')">Enrolment by Age</a></li>
    <li><a style="cursor: pointer;" @click="mainMenu('table4','By Nationality and Class')">Enrolment by Nationality and Class</a></li>

    <li><a style="cursor: pointer;" @click="mainMenu('table6','By ownership and Year')">Enrolment by ownership and Year </a></li>
<li><a style="cursor: pointer;" @click="mainMenu('table7','By  Class and  Year ')">Enrolment by Class and  Year</a></li>

    </ul>
    </div>
        </div>

    </div>
    </li>





        <li id="hideInput">
    <select class="form-control"  style="width:132px;" v-model="selectedClass">
        <option  value="" >Select Class</option>
<option v-for="n in  allClasses" v-bind:value="n.id">{{ n.education_grade }}</option>
</select>

</li>
        <li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:120px;" v-model="selectedGender">
<option  value="" >Select Gender </option>
<option  v-if=" numRows > 0">Male</option>
<option  v-if=" numRows > 0">Female</option>
</select>
        </li>

       <li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:120px;" v-model="selectedYear">
    <option value="">Select year</option>
<option v-for="yy in tableYears"  v-bind:value="yy.school_year">{{ yy.school_year }}</option>
</select>

</li>


<li>
   <li v-if="filterLoading">
  <div style="white-space: nowrap;width: 122px;background:#1CA1C1;color:white" class="btn btn-light">
    <b-spinner small style="height: 15px;width:15px;"></b-spinner>
     <span style="font-weight: 600;padding-left:6px;font-size: 12px;">Loading...</span>
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







<ul v-if="search==='true'" style="width: 500px;">


</ul>
</div>
<div>
    <ul class="nk-ibx-head-tools g-1" >

    </ul>

<!--Search -->
<!--Filter-->
<form v-if="dataLoadingdd"></form>
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
<label class="form-label">Start Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="fromYear">
<option value="">From </option>
<option v-for="yy in tableYears"  v-bind:value="yy.school_year">{{yy.school_year}}</option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">End Years</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="toYear">
<option value="">To</option>
<option v-for="yy in tableYears"  v-bind:value="yy.school_year">{{yy.school_year}}</option>
</select>
</div>
</div>


</div>













</div>

</div>

<br/><br/><br/>
<div class="modal-footer bg-light">
<span class="sub-text">

<a v-if="toYear!=='' && fromYear!=='' && note==='' " href="javasript:void(0)" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="advancedFilter()">Submit</a>

<a v-else class="btn btn-primary"   style="color:#fff;cursor: pointer;" @click="advancedFilter()">Submit</a>
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
<div v-if="status===200 ">
    <div v-if="numRows >0">
<div id="table1">
    <div style="overflow: auto;width: 100%;overflow-y: hidden;">
<table class="table" id="tableshow1">
<thead>
<tr>
<th scope="col" style="vertical-align: top;width:100px;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>

<tbody  style="border:none;" v-for="item1 in tableClass">
<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;">
<th colspan="2">
<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>

<td v-for="total in tableBody" v-if="total.id===item1.id">
{{total.totals }}
</td>



</tr>


<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;">
<th :colspan="headers.length">
<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>
</tr>

<tr  :class="item1.name.replace(' ','_')" style="display:none;">
<th></th>
<td>Males</td>

<td v-for="male in tablemales" v-if="male.id===item1.id">
{{male.males }}
</td>
</tr>

<tr :class="item1.name.replace(' ','_')" style="display:none;">
<th></th>
<td>Females</td>
<td v-for="female in tablefemales" v-if="female.id===item1.id">
{{female.females }}
</td>
</tr>

<tr :class="item1.name.replace(' ','_')" style="display:none;">
<th></th>
<td>Total</td>
<td v-for="total in tableBody" v-if="total.id===item1.id">
{{total.totals }}
</td>

<td v-for="totalSum in tableTotalSum" v-if="totalSum.id===item1.id">
{{ totalSum.genderSum }}
</td>


</tr>

</tbody>

<tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
<tr>
    <th colspan="2" style="text-transform: uppercase;">Total</th>
<th v-for="all in  bottomTotal">
{{ all }}
</th>


</tr>
</tbody>




</table>






<table class="table" id="tableshow2" style="display: none;">
<thead>
<tr>
<th scope="col" style="vertical-align: top;width:100px;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>

<tbody  style="border:none;" v-for="item1 in tableClass">
<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;">
<th colspan="2">
<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>

<td v-for="total in tableBody" v-if="total.id===item1.id">
{{total.totals }}
</td>

</tr>


<tr :class="item1.name.replace(' ','_')" style="border-top:solid thin #e5e9f2;display:none;background:#EBF5FB ;">
<th :colspan="headers.length">
<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
<em class="icon ni ni-plus" style="color:gray;" :class="item1.name.replace(' ','_')"></em>
<em class="icon ni ni-minus" style="color:gray;display:none;" :class="item1.name.replace(' ','_')"></em>
{{ item1.name }}
</a>
</th>
</tr>

<tr v-if="allGender==='Male'"  :class="item1.name.replace(' ','_')" style="display:none;">
<th></th>
<td>Males</td>

<td v-for="male in tablemales" v-if="male.id===item1.id">
{{male.males }}
</td>

<td v-for="sumMale in tableBodySum" v-if="sumMale.id===item1.id">
{{ sumMale.males }}
</td>
</tr>

<tr v-if="allGender==='Female'" :class="item1.name.replace(' ','_')" style="display:none;">
<th></th>
<td>Females</td>
<td v-for="female in tablefemales" v-if="female.id===item1.id">
{{female.females }}
</td>
</tr>

</tbody>

<tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
<tr>
    <th colspan="2" style="text-transform: uppercase;">Total</th>
<th v-for="all in  bottomTotal">
{{ all }}
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




<h6 class="nk-block-title" style="padding-bottom:20px;">PRIMARY SCHOOL ENROLMENT BY CLASS AND YEAR <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>


<column-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Enrolment Years" ytitle="Learners Population" height="600px" style="padding-top:10px;"
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
sum_total:null,
region:null,
status:null,
//allRegions:null,
regionTotal:null,
classes:null,
district:null,
toYear:'',
fromYear:'',
note:'',
//table content.

headers:null,
tableClass:null,
tableBody:null,
tableFemale:null,
tableTotal:null,
enrolmentYear:null,
tableBodySum:null,
tableFemaleSum:null,
tableTotalSum:null,
bottomTotal:null,
allGenderClass:null,
tableYears:null,
back:false,



content:null,

defYear:null,

region_list:null,
grandTotal:null,
errorMessaged:false,
sorted:[{type:'Male'},{type:'Female'}],
sortedClass:[{class:'Primary 1',classid:'P1'},{class:'Primary 2',classid:'P2'},{class:'Primary 3',classid:'P3'},{class:'Primary 4',classid:'P4'},{class:'Primary 5',classid:'P5'},{class:'Primary 6',classid:'P6'},{class:'Primary 7',classid:'P7'},

],
sortButton:'Sort by Gender',
years:[{year:'2019',population:300},{year:'2018',population:500},{year:'2017',population:700},{year:'2016',population:1300}],
selectYear:[{item:'2016'},{item:'2017'},{item:'2018'},{item:'2019'}],
sum:null,
grand:null,
data:null,


//custom data
menu:'table',
tablemales:'',
tablefemales:'',
dataLoadingdd:false,
viewOption:'customTable',
//filter
selectedClass:'',
allGender:'',
selectedGender:'',
allRegions:'',
allAges:'',
selectedAge:'',
selectregion:'',
allDistricts:'',
dataLoading:false,
filterLoading:false,
regionDistrict:'',
selectDistrict:'',
allregion:'',
selectedYear:'',
numRows:'',
allClasses:'',
checkYear:true,
//seach

countryRegion:'',

//Chart data

chartData:null,

reportType:'table'







}


},

//search method
methods:{

changeReport:function(item){
this.reportType=item;
},


mainMenu:function(item,title){
this.menu = item;
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

advancedFilter:function(){

    if(this.toYear!=='' && this.fromYear!==''){
        if(this.fromYear < this.toYear &&
this.toYear!==this.fromYear){
      this.$store.state.loading_status=true;
      this.note='';
     //this.dataLoading=true;
     var session=this.$session.get('userData');
    const searchData = {toYear:this.toYear,fromYear:this.fromYear};
    const headers = {
    'Authorization':'Bearer '+session
    };
this.axios.post('/api/primary/school/enrolment/class/year/advanced-filter',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
    this.$store.state.loading_status=false;
if(this.selectedYear!==''){
this.checkYear=false;
}
this.back=true;
this.headers=response.data.header;
this.headers=response.data.header;
this.tableClass=response.data.class;
this.tablemales=response.data.males;
this.tablefemales=response.data.females;
this.tableBody=response.data.totals;
this.bottomTotal=response.data.grandTotal;
this.$store.state.enrolment_year=this.fromYear +'- '+this.toYear;
 this.chartData=response.data.tableChart;
}})
.catch(error => {console.log('No Result')})

}else{
    this.note='End Year should be great than Start Year';
}
}else{
    this.note='Fill all fields';
}
},
//filter api
filterRegion:function(){

  if(this.selectedClass!=='' || this.selectedGender!==''|| this.selectedYear!==''){
    this.filterLoading=true;
     //this.dataLoading=true;
     var session=this.$session.get('userData');
    const searchData = {class:this.selectedClass,gender:this.selectedGender,year:this.selectedYear};

    const headers = {
    'Authorization':'Bearer '+session
    };
this.axios.post('/api/filter/primary/school/enrolment/class/year',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
this.filterLoading=false;
if(this.selectedYear!==''){
this.checkYear=false;
}
this.back=true;
this.headers=response.data.header;

this.headers=response.data.header;
this.tableClass=response.data.class;
this.tablemales=response.data.males;
this.tablefemales=response.data.females;
this.tableBody=response.data.totals;
this.bottomTotal=response.data.grandTotal;

this.chartData=response.data.tableChart;
 if(this.selectedYear!==''){
this.$store.state.enrolment_year=this.selectedYear;
 }
if(this.selectedGender!==''){

    this.allGender=this.selectedGender

$('#tableshow2').show();
$('#tableshow1').hide();
}else{
$('#tableshow1').show();
}
}})
.catch(error => {console.log('No Result')})
}else{
    $('#table1').show();
this.tableApi();
 this.dataLoadingdd=false;
}
},



tableApi:function(){

    var session=this.$session.get('userData');
    this.selectedClass='';
     this.selectedGender='';
      this.selectedYear='';
      this.toYear='';
      this.fromYear='';

this.dataLoadingdd=true;
    const headers = {
    'Authorization':'Bearer '+session
    };
    this.axios
.get('/api/primary/school/enrolment/class/year',{headers})
.then(response =>{
this.status=response.status;

if(response.status===200){
    this.back=false;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.tableClass=response.data.class;
this.tablemales=response.data.males;
this.tablefemales=response.data.females;
this.tableBody=response.data.totals;
this.bottomTotal=response.data.grandTotal;
this.tableYears=response.data.years;
this.numRows=response.data.numRows;
this.allClasses=response.data.selectClass;

// this.$store.state.enrolment_year=response.data.fromTo;
this.chartData=response.data.tableChart;



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


