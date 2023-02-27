<template>
    <div>


<div class="card border" style="margin:10px;">

<div style="padding:10px;" class="border-bottom">


<em class="icon ni ni-list" style="font-size:20px;position:absolute;"></em>
<strong style="margin-right:20px;margin-left:35px;">
PRIMARY SCHOOL SOURCE OF WATER
<span style="color:#0D47A1;text-transform: uppercase;">
-
{{ this.$store.state.reportTitle
}}</span> <span style="padding-left:5px;color:#0D47A1;" >
 {{ this.$store.state.enrolment_year }}</span>
</strong>





<span style="float:right;">


<button v-if="$store.state.loading_status"
class="btn btn-light "
 style="white-space: nowrap;" >
<b-spinner small style="height: 16px;width:16px;"></b-spinner>
<span style="font-weight: 600;padding-left:6px;">Loading...</span></button>

<button v-else
type="button"
class="btn btn-light "
data-target="#modalDefault"
data-toggle="modal"
>
<em class="icon ni ni-opt-dot-alt" title="Advanced  Filter"></em>
Advanced Filter
</button>



<a href="javascrip:void(0)" style="padding-left:15px;color:#1CA1C1;">
<em class="icon ni ni-printer-fill" style="font-size: 20px;" ></em>
</a>

<a href="javascrip:void(0)" style="padding-left:15px;color:#1CA1C1;">
<em class="icon ni ni-share-fill" style="font-size: 20px;" ></em>
</a>

<a href="javascrip:void(0)" style="padding-left:15px;color:#1CA1C1;">
<em class="icon ni ni-file-download" style="font-size: 20px;" ></em>
</a>
</span>

</div>






<div class="change_content" v-if="$store.state.reportMenu==='table1'">


<PrimaryWaterSourceTable/>


</div>


</div>





















</div>

</template>



<script>
import PrimaryWaterSourceTable from '../TablePrimaryWaterSource/PrimaryWaterSourceTable'
export default {
components:{
PrimaryWaterSourceTable,
},

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
menu:'table1',
tableTitle:'Primary  Schools Distribution by ',



viewOption:'customTable',

//seach

countryRegion:'',

//Chart data



chartData: [
["", "Female", "Male", "Total"],
["Community Based", 1000, 400, 1400],
["Day Care", 1100, 460, 1560],
["Home Based", 660, 800, 1460],
["Nursary", 1030, 540, 1590],
["Grand Total", 1030, 540, 1570],

],
options: {
chart: {
title: 'Company Performance',
subtitle: 'Sales, Expenses, and Profit: 2014-2017',
}
}








}


},

//search method
methods:{

mainMenu:function(item,title){
this.menu=item;
this.tableTitle=title;
 }
,
searchMethod:function(searched){
this.search=searched;
$('#searchfocus').focus();
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







//autoload
autoloadFunction:function(){

this.$store.state.reportTitle='BY DISTANCEAND REGION';
//this.$store.state.enrolment_year='2006 - 2011';

}




},




mounted(){
this.autoloadFunction();
this.$store.state.reportMenu='table1';
}







}


</script>


<style>
@media only screen and (max-width:900px){
#hideInput{
display:none
}
#showHide{
    display:inline;
}
#dropdown{
    display: none;
}
#hideWord{
    display: none;
}

table tr td, table tr th{
text-transform: capitalize;
}


}
@media only screen and (min-width:900px){

#showHide{
    display:none;
}


}

</style>














