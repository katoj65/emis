<template>

<div>

<ul id="myActive" class="nk-menu nk-menu-md" style="margin:0px !important;padding:0px !important;">



<li>
<h6>
<div style="margin-bottom:20px;color:black;"><strong>{{ $store.state.classData.name.toUpperCase() }}</strong> <a style="cursor: pointer;float: right;margin-top:-12px;" id="showMenu" class="nk-nav-toggle nk-quick-nav-icon"></a>
</div>
</h6>
</li>




<li class="nk-menu-heading">
<h6 style="cursor:pointer;font-size:12px;letter-spacing:1px;font-family: sans-serif" class="overline-title text-primary-alt"   @click="menu_toggle('item1')">

<span>
<b-icon-caret-right-fill class="item1"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item1"></b-icon-caret-down-fill>
</span>

INSTITUTION STATUS

</h6>

</li><!-- .nk-menu-heading -->


<li v-for="item11 in institution" :key="item11.item" class="item1" style="display:none;" >
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item11)" :class="[(itemA === item11.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item11.item }}</span>
</a>
</li>








<!---Menu 2---->


<!-- .nk-menu-item -->
<li style="padding:0;margin-top:20px;" class="nk-menu-heading" >

<h6 class="overline-title text-primary-alt"  style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item2')">

<span>
<b-icon-caret-right-fill class="item2"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item2"></b-icon-caret-down-fill>
</span>


LEARNER REPORT
</h6>
</li>
<!-- .nk-menu-heading -->


<li v-for="item in learners" :key="item.item" class="item2" style="display:none;">
<a style="padding:12px;" href="javascript:void(0)" class="nk-menu-link" @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>




<!-------menu 3------->



<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item3')">

<span>
<b-icon-caret-right-fill class="item3"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item3"></b-icon-caret-down-fill>
</span>

HUMAN RESOURCE
 </h6>
</li><!-- .nk-menu-heading -->
<li v-for="item in humanResource" :key="item.item" class="item3" style="display:none;" >
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>





<!--------menu4------->


<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item4')">

<span>
<b-icon-caret-right-fill class="item4"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item4"></b-icon-caret-down-fill>
</span>


INFRASTRUCTURE</h6>
</li><!-- .nk-menu-heading -->
<li  v-for="item in infrastracture" :key="item.item" class="item4" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>



<!----item5---->




<li class="nk-menu-heading" style="padding:0;margin-top:27px;" >
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item5')">
<span>
<b-icon-caret-right-fill class="item5"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item5"></b-icon-caret-down-fill>
</span>

    WATER AND SANITATION</h6>
</li><!-- .nk-menu-heading -->

<li  v-for="item in water_sanitation" :key="item.item" class="item5" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>




<!----item6----->




<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item6')">
<span>
<b-icon-caret-right-fill class="item6"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item6"></b-icon-caret-down-fill>
</span>


    ENERGY MANAGEMENT</h6>
</li><!-- .nk-menu-heading -->
<li  v-for="item in energy_management" :key="item.item" class="item6" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
{{ item.item }} </span>
</a>
</li>



<!-----item7------>



<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item7')">
<span>
<b-icon-caret-right-fill class="item7"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item7"></b-icon-caret-down-fill>
</span>

ICT FACILITIES</h6>
<li  v-for="item in ict_facilities" :key="item.item" class="item7" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>





<!-----item8----->

<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item8')">

<span>
<b-icon-caret-right-fill class="item8"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item8"></b-icon-caret-down-fill>
</span>

INSTRUCTION MATERIAL</h6>
</li><!-- .nk-menu-heading -->

<li  v-for="item in instruction_material" :key="item.item" class="item8" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>






<!------item9-------->

<li class="nk-menu-heading" style="padding:0;margin-top:27px;" >
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item9')">
<span>
<b-icon-caret-right-fill class="item9"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item9"></b-icon-caret-down-fill>
</span>
HEALTH INFORMATION
</h6>
</li><!-- .nk-menu-heading -->
<li  v-for="item in health_information" :key="item.item" class="item9" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>






<!------item10--------->

<li class="nk-menu-heading" style="padding:0;margin-top:27px;" >
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item10')">

<span>
<b-icon-caret-right-fill class="item10"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item10"></b-icon-caret-down-fill>
</span>

PE & SPORTS
</h6>
</li><!-- .nk-menu-heading -->
<li  v-for="item in pe_sports" :key="item.item" class="item10" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
<b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>




<!------item11-------->


<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 class="overline-title text-primary-alt" style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:  sans-serif;"  @click="menu_toggle('item11')">
<span>
<b-icon-caret-right-fill class="item11"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item11"></b-icon-caret-down-fill>
</span>

FINANCE & GRANTS
</h6>
</li><!-- .nk-menu-heading -->
<li  v-for="item in finance" :key="item.item" class="item11" style="display:none;">
<a  class="nk-menu-link" style="padding: 12px;" href="javascript:void(0)"  @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
    <b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item }} </span>
</a>
</li>





<!-----item12---------->
<li class="nk-menu-heading" style="padding:0;margin-top:27px;">
<h6 style="cursor:pointer;margin-bottom:7px;font-size:12px;letter-spacing:1px;font-family:sans-serif;" class="overline-title text-primary-alt" @click="menu_toggle('item12')">
<span>
<b-icon-caret-right-fill class="item12"></b-icon-caret-right-fill>
<b-icon-caret-down-fill style="display:none;" class="item12"></b-icon-caret-down-fill>
</span>
OTHER EMIS INDICATORS
</h6>
</li><!-- .nk-menu-heading -->


<li  v-for="item in indicator" :key="item.item6" class="item12" style="display:none;">
<a style="padding:12px;" href="javascript:void(0)" class="nk-menu-link" @click="mainMenu(item)" :class="[(itemA === item.id) ? 'myseeactive':'nk-menu-item myBtn']">
    <b-icon-chevron-right style="margin-right:10px;"></b-icon-chevron-right>
<span class="nk-menu-text" style="font-weight:500px;font-size:15px;">{{ item.item6 }} </span>
</a>
</li>

















 </ul><!-- .nk-menu -->





























</div>
</template>



<script>
export default {

data() {

 return{

mainRoute:null,
//test object
routeObject:{},
fullUrl:null,
itemA:'',



//add institution
institution:[
{item:'Operations',path:'operations',id:35,icon:'briefcase'},
{item:'Ownership',path:'ownership',id:36,icon:'back'},
{item:'Registration',path:'registration',id:37,icon:'globe'},
{item:'Licensing',path:'licensing',id:38,icon:'credit-card2-front'},
{item:'Proximity',path:'proximity',id:39,icon:'layers-half'},
{item:'Gender Composition',path:'gender-composition',id:40,icon:'person-lines-fill'},
{item:'Border Status',path:'border-status',id:41000,icon:'square-half'},
{item:'Governance',path:'governance',id:42,icon:'bricks'},
],


reports:[
{item: 'School Distribution',path:'school-distribution',id:1,icon:'circle-square'},
{item: 'Distance to key Location',path:'key-location-distance',id:2},
{item: 'Registration Status',path:'registration-status',id:3},
{item: 'School Ownership',path:'school-ownership',id:4},
{item: 'Boarding Status',path:'boarding',id:5},
{item: 'School Funding',path:'funding',id:6},
],

infrastracture:[
{item: 'Buiding Status',path:'building-status',id:7000,icon:'building'},
{item: 'Building Usage',path:'building-usage',id:8,icon:'house-door'},
// {item: 'Text Books',path1:'text-books',id:9},
// {item: 'Instructional Material',path:'instructional-material',id:10},
// {item: 'Lab Equipment',path:'lab-equipment',id:11},
// {item: 'Water Source',path:'water-sources',id:12},
// {item: 'Energy Sources',path:'energy-sources',id:13},
// {item: 'Stances Availability',path:'stances-availability',id:14}
],


//change learners menu
learners:[
{item:'Enrolment', path:'enrolment',id:15,icon:'circle-square'},
{item:'Nationality', path:'nationality',id:115,icon:'textarea-resize'},
{item:'Performance', path:'performance',id:121,icon:'view-list'},
{item:'Attendance', path:'attendance',id:116,icon:'vector-pen'},
{item:'Transfers', path:'transfers',id:117,icon:'wallet-fill'},
{item:'Dropout', path:'dropout',id:118,icon:'triangle-half'},
{item:'Spacial Needs', path:'spacial-needs',id:119,icon:'truck-flatbed'},
{item:'Orphanage', path:'orphanage',id:120,icon:'tablet-landscape'},
],

//add human resource

humanResource:[
{item:'Teaching Staff',path:'teaching-staff',id:100,icon:'people-fill'},
{item:'Non-Teaching Staff',path:'non-teaching-staff',id:101,icon:'person-bounding-box'},
{item:'In-Service Training',path:'in-service-training',id:102,icon:'person-square'},
{item:'Teacher Transfer',path:'teacher-transfer',id:103,icon:'pentagon'},
{item:'Teacher Exodus',path:'teacher-exodus',id:104,icon:'person-lines-fill'}
],




//added menu
water_sanitation:[
{item:'Source of Water',path:'source-of-water',id:105,icon:'droplet-fill'},
{item:'Source Proximity',path:'source-proximity',id:106,icon:'box'},
{item:'Consumption Rate',path:'consumption-rate',id:107,icon:'columns-gap'},
{item:'Hand Washing Facilities',path:'hand-washing-facilities',id:108,icon:'exclude'},
{item:'Garbage Disposal',path:'garbage-disposal',id:109,icon:'exclamation-octagon'},
],


//added php route


energy_management:[
{item:'Cooking Energy',path:'cooking-energy',id:110,icon:'brightness-high'},
{item:'Lighting',path:'lighting1234',id:111,icon:'brightness-alt-high'}
],


//add php route
ict_facilities:[
{item:'Computer Inventory',path:'computer-inventory',id:112,icon:'laptop'},
{item:'Internet Access',path:'internet-access',id:113,icon:'wifi'}
],


//instruction material
instruction_material:[
{item:'Text Books',path:'text-books',id:114,icon:'book'},
{item:'Teaching Guides', path:'teaching-guides',id:115,icon:'bookmark'},
{item:'Readers',path:'readers',id:116,icon:'calculator'}
],


//add php route
health_information:[
{item:'Issue Occurrence',path:'issue-occurrence',id:117,icon:'file-medical'},
{item:'Health Policy',path:'health-policy',id:118,icon:'journal-medical'},
{item:'Health Skills',path:'health-skills',id:120,icon:'heart-half'},
{item:'Feeding',path:'feeding',id:121,icon:'trash2'},
{item:'Food Sources',path:'food-sources',id:122,icon:'tree-fill'}
],


pe_sports:[
{item:'Sports Facilities',path:'sports_facilities',id:123,icon:'trophy'},
{item:'Sports Equipment',path:'sports_equipment',id:124,icon:'image-alt'},
{item:'Participation',path:'participation',id:125,icon:'award'},
{item:'Learner Training',path:'learner-training',id:126,icon:'bullseye'},
{item:'Teacher Training',path:'teacher-training',id:127,icon:'compass'},
],


finance:[
{item:'Capitation Grant',path:'capitation-grant',id:128,icon:'collection-fill'},
{item:'Other Income',path:'other-income',id:129,icon:'collection'},
],





indicator:[
{item6:'GER',path6:'ger',id:30,icon:'diagram2-fill'},
{item6:'NER',path6:'ner',id:31,icon:'diagram3-fill'},
{item6:'PTR',path6:'ptr',id:32,icon:'grid'},
{item6:'PCR',path6:'pcr',id:33,icon:'grid1x2'},
{item6:'PSR',path6:'psr',id:34,icon:'grid3x3-gap'}
],






reports1:[
{item: 'School Distribution',path:'school-distribution',id:1},
{item: 'Distance to key Location',path:'key-location-distance',id:2},
{item: 'Registration Status',path:'registration-status',id:3},
{item: 'School Ownership',path:'school-ownership',id:4},
{item: 'Boarding Status',path:'boarding',id:5},
{item: 'School Funding',path:'funding',id:6},
],


infrastracture1:[
{item1: 'Infrastructure Category',path1:'infrastructure-category',id:7},
{item1: 'Sanitation Facilities',path1:'sanitation-facilities',id:8},
{item1: 'Text Books',path1:'text-books',id:9},
{item1: 'Instructional Material',path1:'instructional-material',id:10},
{item1: 'Lab Equipment',path1:'lab-equipment',id:11},
{item1: 'Water Source',path1:'water-sources',id:12},
{item1: 'Energy Sources',path1:'energy-sources',id:13},
{item1: 'Stances Availability',path1:'stances-availability',id:14}

],



learners1:[
{item2:'Enrolment', path2:'enrolment',id:15},
{item2:'State of Orphanage',path2:'orphanage',id:16},
{item2:'Special Needs',path2:'special-needs',id:17},
{item2:'Learner Transfers',path2:'learner-transfer',id:18},
{item2:'Class Repeatition',path2:'class-repeatition',id:19},
{item2:'Seating Capacity',path2:'seating-capacity',id:20},
{item2:'Dropout Status',path2:'dropout-status',id:21},
],

curricular1:[
{item3:'Activity Categories',path3:'activity-category',id:22},
{item3:'Participation',path3:'participation',id:23},
{item3:'Budget & Expenditure',path3:'budget',id:24},
{item3:'Equipment & Facilities',path3:'equipment',id:25}
],

staff1:[
{item4:'Teaching Staff',path4:'teaching-staff',id:26},
{item4:'Non-Teaching Staff',path4:'non-teaching-staff',id:27},
{item4:'Teacher Exodus',path4:'teacher-exodus',id:28},
],

health1:[
{item5:'HIV/AIDS',path5:'hiv-aids',id:29}
],

indicator1:[
{item6:'GER',path6:'ger',id:30},
{item6:'NER',path6:'ner',id:31},
{item6:'PTR',path6:'ptr',id:32},
{item6:'PCR',path6:'pcr',id:33},
{item6:'PSR',path6:'psr',id:34}
]









 }
},


methods:{
//route redirection.
mainMenu:function(item){

var mainRoute=this.$store.state.classData.path;
var path=item.path||
item.path1||
item.path2||
item.path3||
item.path4||
item.path5||
item.path6;
this.$store.state.reportMenu='table1';
var check=this.$store.state.mainMenuTab;
if(check.length<6){
check=check.includes(item.item);
if(check==false){

this.$store.state.mainMenuTab.push(item.item);
this.$store.state.hideFirstMenuItem='hide';


}
}


this.$router.push({path:mainRoute+path});
//this.storeTabMenu(item);
this.itemA=item.id;
this.$session.set('activekey',this.itemA);

},


menu_toggle(c){
this.$store.state.active_sub_menu='';
$('.'+c).toggle();
sessionStorage.setItem('subMenu',c);
var s=sessionStorage.getItem("subMenu");
this.$store.state.active_sub_menu=s;

},




autoloadObject:function(){
var url=this.$route.path;
var splited=url.split('/');
var num =splited.length-1;
var num2=splited.length-2;
var segment1='/'+splited[num2]+'/';
var segment2=splited[num];


},

//api to fetch menu
fetchTabMenuApi:function(){
this.axios
.get('/api/users/tab/menu')
.then(response =>{
this.status=response.status;
if(response.status===200){
this.$store.state.mainTab=response.data.tabContent;
this.$store.state.mainTabSettings
={count:response.data.count,allTabs:response.data.allTabs,status:response.
status};

}else{

this.$store.state.mainTabSettings
={count:'',allTabs:'',status:response.status};

}
} )
.catch(error => alert(error+' Fetch tab menu Api'));
},







//menu information
menuItemApi:function(){
//get class name
var className=this.$store.state.classData.name;
var user=this.$store.state.userData.user;
var id=user.id;
var userPost={'id':id,'className':className};
var headers=this.$store.state.headers;

this.axios.
post('/api/users/active/menu/get',
userPost,
{headers}).then(response=>{
if(response.status===200){
this.$store.state.mainTab=response.data.tabContent;
this.$store.state.mainTabSettings={count:response.data.count,allTabs:response.data.allTabs,status:response.
status,moreTabs:response.data.moreTabs};

}else{
    this.$store.state.mainTabSettings={count:{},allTabs:{},status:response.status};
}
}).catch(error=>{
this.$store.state.alert.error=error+' could not save tab informaton. Refesh your brouser';
});



},






//store tab menu data
storeTabMenu:function(item){
//routes
var path=item.path||
item.path1||
item.path2||
item.path3||
item.path4||
item.path5||
item.path6;
//names
name=item.item||
item.item1||
item.item2||
item.item3||
item.item4||
item.item5||
item.item6;

var user=this.$store.state.userData.user;
var mainRoute=this.$store.state.classData.path;
var userPost={user_id:user.id,tab_name:name,path:path,mainPath:mainRoute};
var headers=this.$store.state.headers;
this.axios.
post('/api/users/tab/menu/add',
userPost,
{headers}).then(response=>{
if(response.status===200){

this.$store.state.mainTab=response.data.tabContent;
this.$store.state.mainTabSettings={count:response.data.count,allTabs:response.data.allTabs,status:response.
status

};


}else{
}
}).catch(error=>{
this.$store.state.alert.error=error+' could not save tab informaton. Refesh your brouser';
});
},











//show tab menu
showTabMenuApi:function(){
var user=this.$store.state.userData.user;
var mainRoute=this.$store.state.classData.path;
var getUser={user_id:user.id,mainRoute:mainRoute};
var headers=this.$store.state.headers;
this.axios.
post('/api/users/tab/menu/get',
getUser,
{headers}
).then(response=>{
if(response.status===200){
this.$store.state.mainTab=response.data.tabContent;
this.$store.state.mainTabSettings={count:response.data.count,allTabs:response.data.allTabs,status:response.
status,moreTabs:response.data.moreTabs};
console.log(response.data);
}else{
this.$store.state.mainTabSettings={count:{},allTabs:{},status:response.status};
}
}).catch(error=>{
error
});
},



//load content

loadContent:function(){
this.mainRoute=this.$store.state.classData.path;

}












},










//auto load content
mounted(){
//default class name


 var actived=this.$session.get('activekey');
 if(actived){
this.itemA=actived;
 }else{

 };
this.autoloadObject();
//this.fetchTabMenuApi();
//this.showTabMenuApi();
//fetch tab menu content
this.loadContent();

//api menu items
//this.menuItemApi();

var header = document.getElementById("myActive");
var btns = header.getElementsByClassName("myBtn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("myseeactive");
  current[0].className = current[0].className.replace(" myseeactive", "");
  this.className += " myseeactive";
  });
}

}







}
</script>
<style>
    @media only screen and (max-width:1000px){
    #showMenu{
    display:block
    }

    }
    @media only screen and (min-width:1000px){

    #showMenu{
        display:none;
    }


    }



.myseeactive, .myBtn:hover {
  background-color: #E3F2FD;border-top-left-radius:4px; border-top-left-radius:4px  ;
  color: #000;
}


.myBtn:hover {
  background-color: #f5f6fa;border-top-left-radius:4px; border-top-left-radius:4px  ;
  color: #000;
}


.nk-menu-link:hover {
color: #000;
}


.nk-menu-heading{
margin-top:35px
}



    </style>
