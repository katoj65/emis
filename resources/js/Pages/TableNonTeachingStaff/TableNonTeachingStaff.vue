<template>
<div >





<div class="card  card-stretch" style="padding:0;">
                            <div class="card-inner-group">

                                <div>

<!---FILTER---->
<form  @submit.prevent>

<div class="nk-ibx-head">
<div class="nk-ibx-head-actions">

    <ul class="nk-ibx-head-tools g-1" v-if="search==='false'">

<li v-if="back===true" style="margin-right:20px;">
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

<li><a style="cursor:pointer;" @click="mainMenu('table1','by Type')"> Non-Teaching Staff by Type</a></li>



</ul>
</div>


</div>
</li>



<li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:120px;padding:6px" v-model="selectedRole">
<option  value="" >Select Type  </option>
<option v-for="r in allRoles" v-bind:value="r.id" >{{ r.type }}</option>

</select>
</li>
<li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:120px;padding:6px" v-model="selectedOwner">
<option  value="" >Select Ownership  </option>
<option v-for="r in tablerOwner" v-bind:value="r.id" >{{ r.status }}</option>

</select>

</li>
<li id="hideInput">
<select  class="form-control" id="default-01" placeholder="Input placeholder" style="width:110px;padding:6px" v-model="selectedGender">
<option  value="" >Select Gender </option>
<option  v-if="numRows > 0">Male</option>
<option  v-if="numRows > 0">Female</option>
</select>
</li>
<li id="hideInput">
<select class="form-control" id="default-01" placeholder="Input placeholder" style="width:80px;padding:6px" v-model="selectedYear">
    <option value="" v-if="checkYear"> {{ $store.state.enrolment_year }}</option>
<option v-for="yy in allYear"  v-bind:value="yy">{{ yy }} </option>
</select>
</li>
<li>
   <li v-if="filterLoading">
  <div style="white-space: nowrap;background:#1CA1C1;color:white" class="btn">
    <b-spinner small style="height: 16px;width:16px;"></b-spinner>
     <span style="font-weight: 600;padding-left:6px;">Loading...</span>
  </div>
  </li>
<li v-else id="hideInput">


<a href="javascript:void(0);" class="btn" style="background:#1CA1C1;color:white"  @click="filterStaff()">Filter</a></li>



  <li style="display: block">

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
<form  @submit.prevent="advancedfilter">
<div class="modal fade" tabindex="-1" id="modalDefault">
<div class="modal-dialog" role="document">
<div class="modal-content">
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
<div class="modal-header">
<h5 class="modal-title">Advanced  Filter</h5>
</div>

<span style="padding-top:6px;color:red;text-align: center;"> {{note}}</span>
<div class="modal-body" style="padding:40px;padding-bottom:0;">

<div class="row gy-4" style="padding-top:0;padding-bottom:0;">
<div class="col-sm-6">





<div class="form-group">
<label class="form-label">Start Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="fromYear">
<option value="">From </option>
<option v-for="yy in allYear"  v-bind:value="yy">{{ yy }} </option>
</select>
</div>
</div>




</div>
<div class="col-sm-6">


<div class="form-group">
<label class="form-label">End Year</label>
<div class="form-control-wrap">
<select class="form-control" id="default-06" v-model="toYear">
<option value="">To </option>
<option v-for="yy in allYear"  v-bind:value="yy">{{ yy }} </option>
</select>
</div>
</div>


</div>
<div class="col-sm-12">
<div class="form-group">
<label class="form-label">Select Ownership </label>
<div class="form-control-wrap">
<select class="form-control" v-model="toOwner">
<option value=""> Ownership</option>

<option v-for="r in tablerOwner" v-bind:value="r.id">{{ r.status }}</option>
</select>
</div>
</div>
</div>

</div>
</div>
<br/><br/>
<div class="modal-footer bg-light">
<span class="sub-text">
    <a href="javasript:void(0)" class="btn btn-primary" data-dismiss="modal" aria-label="Close"    v-if="toYear!=='' && fromYear!==''&& note==='' && toOwner!=='' " @click="advancedfilter()">Submit</a>
<a class="btn btn-primary" style="color:#fff;cursor: pointer;" v-else @click="advancedfilter()">Submit</a>
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
<div v-if="status===200 " >
    <div v-if="numRows > 0" >
<div>
    <div style="overflow: auto;width: 100%;overflow-y: hidden;">
<table class="table" id="table1">
<thead>
<tr>
<th scope="col" style="vertical-align: top;text-transform:capitalize;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">{{ head}} </th>
</tr>
</thead>

<tbody  style="border:none;" v-for="item1 in tablerole">
<tr style="border-top:solid thin #e5e9f2;background:#EBF5FB ;background:#EBF5FB ;">
<th colspan="2">
<a href="javascript:void(0);" style="color:black;text-transform: uppercase;" @click="toggleCollapseTable(item1)">
{{ item1.type }}
</a>
</th>
<td v-for="total in tableTotal" v-if="total.id===item1.id">
{{total.totals }}</td>

</tr>

<tr>
<th></th>
<td>Males</td>

<td v-for="male in tableMale" v-if="male.id===item1.id">
{{male.males }}
</td>
<!--  -->
</tr>

<tr>
<th></th>
<td>Females</td>
<td v-for="female in tableFemale" v-if="female.id===item1.id">
{{female.females }}
</td>
<!--  -->



</tr>

</tbody>

<tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
<tr>
    <th colspan="2" style="text-transform: uppercase;">Total</th>
<th v-for="all in  grandTotal">
    {{ all }}
</th>

</tr>
</tbody>




</table>





<table class="table" id="table2" style="display:none">
    <thead>
    <tr>
    <th scope="col" style="vertical-align: top;text-transform:capitalize;background:#F4F6F6;border-bottom:solid  2px #87CEFA;" v-for="head in headers">{{ head}} </th>
    </tr>
    </thead>

    <tbody  style="border:none;" v-for="item1 in tablerole">

    <tr style="border-top:solid thin #e5e9f2;background:#EBF5FB ;">
    <th :colspan="headers.length+1">
    {{ item1.type }}
    </th>
    </tr>
    <tr v-if="allGender==='Male'"  >
    <th></th>
    <td>Males</td>
    <td v-for="male in tableMale" v-if="male.id===item1.id">
    {{male.males }}
    </td>
    <!--  -->


    </tr>
    <tr v-else>
    <th></th>
    <td>Females</td>
    <td v-for="female in tableFemale" v-if="female.id===item1.id">
    {{female.females }}
    </td>
    <!--  -->


    </tr>
    </tbody>
    <tbody style="background:#F4F6F6;border-top:solid  1px #87CEFA;">
    <tr>
        <th colspan="2" style="text-transform: uppercase;">Total</th>
    <th v-for="all in  grandTotal">
        {{ all }}
    </th>
    </tr>
    </tbody>
    </table>
    </div>

</div>




    </div>
<div v-else style="padding:16px;font-weight: 500;" > No  content </div>


</div>
</div><!-- .card-inner-group -->

<div style="padding:20px" v-else-if="reportType==='chart'">



<div class="card card-full" style="padding:0;margin:0;">
<div class="card-inner" style="padding:0;margin:0;">
<!-- .card-title-group -->
<div class="nk-coin-ovwg" style="padding:20px;text-align:center;">



<div style="width:70%;margin-left:15%;margin-right:15%;">






<h6 class="nk-block-title" style="padding-bottom:20px;">TEACHERS BY PAYROLL STATUS <span style="padding-left:5px;">{{ this.$store.state.enrolment_year }}</span></h6>



<bar-chart :data="chartData" :stacked="true"  :dataset="{borderWidth: 0}" :download="true" xtitle="Number of Teachers" ytitle="School Year" height="600px" style="padding-top:10px;"
></bar-chart>


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
selectedClasses:'',
region:null,
status:null,
//allRegions:null,
regionTotal:null,
classes:null,
district:null,
toYear:'',
fromYear:'',
note:'',
'css_class':'css_class',

//table content.

headers:null,
tablerole:null,
tableMale:null,
tableFemale:null,
tableTotal:null,
enrolmentYear:null,
tableMaleSum:null,
tableFemaleSum:null,
tableTotalSum:null,
grandTotal:null,
allGenderClass:null,
tableYears:null,
toOwner:'',



content:null,

defYear:null,

region_list:null,
grandTotal:'',
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
dataLoadingdd:false,
viewOption:'customTable',
//filter
selectedNationality:'',
allGender:'',
selectedGender:'',
allRegions:'',
allAges:'',
selectedClass:'',
selectregion:'',
allDistricts:'',
dataLoading:false,
filterLoading:false,
regionDistrict:'',
selectDistrict:'',
allregion:'',
selectedYear:'',
nunRows:'',
noResults:'',
allNationality:'',
allYear:'',
numRows:'',
tableClass:'',
checkYear:true,
back:false,
//seach

countryNationality:'',

//Chart data

chartData:null,
chartObject:null,
allRoles:'',
selectedRole:'',
selectedOwner:'',
tablerOwner:'',
//colors:[['#FDD835 '],['#2E86C1 '],['#EF5350'],['#76448A '],['#17A589'],['#17202A']],



reportType:'table',


}
},
//search method
methods:{

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
 this.menu='table';
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
$('.'+this.css_class+item.id).toggle();
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
advancedfilter:function(){



  if(this.fromYear!==''&& this.toYear!=='' && this.toOwner!==''){
      if(this.fromYear < this.toYear &&
this.toYear!==this.fromYear){
    this.$store.state.loading_status=true;
this.note='';
     var session=this.$session.get('userData');
    const searchData = {fromYear:this.fromYear,toYear:this.toYear,toOwner:this.toOwner};
    const headers = {
    'Authorization':'Bearer '+session
    };
this.axios.post('/api/primary/none-teaching-staff/advanced-filter',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
    this.$store.state.loading_status=false;
if(this.selectedYear!==''){
this.checkYear=false;
}

this.headers=response.data.header;
this.tablerole=response.data.role;
this.tableTotal=response.data.body;
this.tableMale=response.data.body;
this.tableFemale=response.data.body;
this.grandTotal=response.data.bottom_total;

 this.$store.state.enrolment_year=this.fromYear+' - '+this.toYear;
 this.back=true;

if(this.selectedGender!==''){
this.allGender=this.selectedGender

$('#table2').hide();
$('#table1'). show();
}else{
$('#table2').hide();
$('#table1').show();
}
}})
.catch(error => {console.log('No Result')})
}else{
$('#table1').show();
$('#table2').hide();
this.note='End Year should be great than Start Year';
}
}else{
$('#table1').show();
$('#table2').hide();
this.note='Fill all fields';
}
},

//filter api
filterStaff:function(){

  if(this.selectedGender!==''
  || this.selectedYear!=='' || this.selectedOwner||
 this.selectedRole ){
    this.filterLoading=true;
     var session=this.$session.get('userData');
    const searchData = {gender:this.selectedGender,year:this.selectedYear,role:this.selectedRole,owner:this.selectedOwner};
    const headers = {
    'Authorization':'Bearer '+session
    };
this.axios.post('/api/filter/primary/none-teaching-staff',searchData,{headers})
.then(response => {
var status=response.status;
this.status=response.status;
if(status===200){
this.filterLoading=false;
this.headers=response.data.header;
this.tablerole=response.data.role;
this.tableTotal=response.data.body;
this.tableMale=response.data.body;
this.tableFemale=response.data.body;
this.grandTotal=response.data.bottom_total;
this.chartData=response.data.chart;
this.back=true;
if(this.selectedYear!==''){
 this.$store.state.enrolment_year=this.selectedYear;
 }
if(this.selectedGender!==''){
this.allGender=this.selectedGender

$('#table2').show();
$('#table1').hide();
}else{
$('#table2').hide();
$('#table1').show();
}
}})
.catch(error => {console.log('No Result')})
}else{
$('#table1').show();
$('#table2').hide();
this.tableApi();
this.dataLoadingdd=false;
this.errorMessaged=false;
}
},



tableApi:function(){

    var session=this.$session.get('userData');
this.selectedGender='';
 this.selectedYear='';
 this.fromYear='';
 this.toYear='';
this.toOwner='';
this.selectedOwner='';
 this.selectedRole='';
 this.dataLoadingdd=true;
    const headers = {
    'Authorization':'Bearer '+session
    };
    this.axios
.get('/api/primary/none-teaching-staff',{headers})
.then(response =>{
this.status=response.status;

if(response.status===200){
    this.back=false;
this.$store.state.data;

this.checkYear=true;

this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.tablerole=response.data.role;
this.tableTotal=response.data.body;
this.tableMale=response.data.body;
this.tableFemale=response.data.body;
this.grandTotal=response.data.bottom_total;
this.numRows=response.data.numRows;
this.chartData=response.data.chart;

this.allRoles=response.data.role;
this.tablerOwner=response.data.status;
this.allYear=response.data.selectYears;
this.$store.state.reportTitle='BY Type ';
this.$store.state.enrolment_year=response.data.enrolment_year;
this.back=false;
$('#table2').hide();
$('#table1').show();
}
} )
.catch(error => console.log('no Result'))
},

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

    }
    #hideInput{
    display:grid
    }
    }

    </style>
