<template>
  <div class="nk-body npc-default has-apps-sidebar has-sidebar" style="border: none; margin: 0px !important;">

<div class="nk-app-root" style="border: none; margin: 0px !important;">
<div class="nk-apps-sidebar is-dark" style="background:rgb(38, 38, 75);;z-index:1058;border: none; margin: 0px !important; padding:0px;">
    <div class="nk-apps-brand">

    <router-link to="/dashboard" class="logo-link" style="background:rgb(38, 38, 75);;height:62px;color:white;font-weight:bolder;font-size:20px;width:80px;padding-left:15px;line-height:13px;">


    EMIS
    <span style="font-size:10px;font-weight:normal;">Enterprise</span>
    </router-link>
    </div>
    <div style="border-bottom:solid 2px #283593;"></div>
    <div class="nk-sidebar-element" style="margin: 0px !important; padding:0px;">
    <div class="nk-sidebar-body" style="margin: 0px !important; padding:0px;">
    <div class="nk-sidebar-content" style="margin: 0px !important; padding:0px;" data-simplebar >
    <div class="nk-sidebar-menu" style="margin: 0px !important; padding:0px;">
    <!-- Menu -->


    <ul class="nk-menu nk-menu-md" style="z-index: 200;"  >


    <li @click="mainSidebar('dashboard')"  v-if="showActive==='dashboard'" class="nk-menu-item" style="cursor: pointer;border-bottom:solid thin  #283593;border-right:solid 5px #4FC3F7;background:#4FC3F7" >
    <a   href="javascript:void(0)" class="nk-menu-link" title="Dashboard"
     style="padding-bottom:0px;" @click="mainSidebar('dashboard')">
    <span class="nk-menu-icon">
<img src="../../icons/dashboard.png" />
    <!--<em class="icon ni ni-growth" style="font-size:30px;color:#fff"></em>-->

    </span>
    </a>
    <span style="color:white;font-size:10px;display:block;text-align:center;color:#fff;font-spacing:5px;">DASHBOARD</span>

    </li>


    <li @click="mainSidebar('dashboard')" v-else class="nk-menu-item" style="border-bottom:solid thin  #283593;cursor: pointer;" >
        <a @click="mainSidebar('dashboard')"
        href="javascript:void(0)"
        class="nk-menu-link"
        title="Dashboard"

        style="padding-bottom:0px;">
        <span class="nk-menu-icon">
     <img  src="../../icons/dashboard.png" />
        </span>
        </a>
        <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">DASHBOARD</span>

        </li>


    <li  @click="mainSidebar('pre-primary')" v-if="showActive==='pre-primary'" class="nk-menu-item" style="border-bottom:solid 1px #283593; background-color:rgb(38, 38, 75);;cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
    <a
    href="javascript:void(0)"
    class="nk-menu-link"
    title="Pre-Primary"
    @click="mainSidebar('pre-primary')">

    <span class="nk-menu-icon">
<img  src="../../icons/kindergarten.png" />
    </span>
    </a>
    <span style="color:white;font-size:10px;display:block;text-align:center;color:#fff;font-spacing:5px;">PRE-PRIMARY</span>
    </li>



    <li @click="mainSidebar('pre-primary')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
        <a
        href="javascript:void(0)"
        class="nk-menu-link"
        title="Pre-Primary"
        @click="mainSidebar('pre-primary')">

        <span class="nk-menu-icon">
     <img  src="../../icons/kindergarten.png" />
        </span>
        </a>
        <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">PRE-PRIMARY</span>
        </li>



    <li @click="mainSidebar('primary')" v-if="showActive==='primary'"  class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
    <a href="javascript:void(0)" class="nk-menu-link" title="Primary"  @click="mainSidebar('primary')">
    <span class="nk-menu-icon" >
  <img  src="../../icons/primary.png" />
    </span>
    </a>

    <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;color:#fff">PRIMARY</span>
    </li>



    <li @click="mainSidebar('primary')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
        <a href="javascript:void(0)" class="nk-menu-link" title="Primary"  @click="mainSidebar('primary')">
        <span class="nk-menu-icon" >
      <img  src="../../icons/primary.png" />

        </span>
        </a>

        <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">PRIMARY</span>
        </li>



















        <li @click="mainSidebar('secondary')"  v-if="showActive==='secondary'" class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
            <a href="javascript:void(0)" class="nk-menu-link" title="Secondary"
            @click="mainSidebar('secondary')">
            <span class="nk-menu-icon">
           <img  src="../../icons/school_white.png" />
            </span>
            </a>
            <span style="color:white;font-size:10px;display:block;text-align:center;color:#fff;font-spacing:5px;color:#fff">SECONDARY</span>
            </li>




    <li @click="mainSidebar('secondary')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
    <a href="javascript:void(0)" class="nk-menu-link" title="Secondary"
    @click="mainSidebar('secondary')">
    <span class="nk-menu-icon">
   <img  src="../../icons/school_white.png" />
    </span>
    </a>
    <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">SECONDARY</span>
    </li>






  <li @click="mainSidebar('post-primary')" v-if="showActive==='post-primary'"  class="nk-menu-item" style="border-bottom:solid 1px #283593; cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
    <a href="javascript:void(0)" class="nk-menu-link" title="Non-Tertiary"  @click="mainSidebar('post-primary')">
    <span class="nk-menu-icon" >
 <img  src="../../icons/vocational.png" />

    </span>
    </a>

    <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;color:#fff">NON-TERTIARY</span>
    </li>



    <li @click="mainSidebar('post-primary')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
        <a href="javascript:void(0)" class="nk-menu-link" title="Non-Tertiary"  @click="mainSidebar('post-primary')">
        <span class="nk-menu-icon" >
       <img  src="../../icons/vocational.png" />

        </span>
        </a>

        <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">NON-TERTIARY</span>
        </li>

















    <li @click="mainSidebar('tertiary')" v-if="showActive==='tertiary'" class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
        <a
        href="javascript:void(0)"
        class="nk-menu-link"
        title="Tertiary"
        @click="mainSidebar('tertiary')">
        <span class="nk-menu-icon"
        > <img  src="../../icons/wrench.png" /></span>
        </a>
        <span style="color:white;font-size:10px;display:block;text-align:center;font-spacing:5px;color:#fff">TERTIARY</span>
        </li>



    <li @click="mainSidebar('tertiary')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
    <a
    href="javascript:void(0)"
    class="nk-menu-link"
    title="Tertiary"
    @click="mainSidebar('tertiary')">
    <span class="nk-menu-icon"
    > <img  src="../../icons/wrench.png" /></span>
    </a>
    <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">TERTIARY</span>
    </li>





    <li   @click="mainSidebar('university')" v-if="showActive==='university'" class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;border-right:solid 5px #4FC3F7;background:#4FC3F7;">
        <a
        href="javascript:void(0)"
        class="nk-menu-link"
        title="University"
        @click="mainSidebar('university')"
        >
        <span class="nk-menu-icon"
        >

       <img  src="../../icons/campus.png" />
        </span>
        </a>

        <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;color:#fff;">UNIVERSITY</span>
        </li>







    <li   @click="mainSidebar('university')" v-else class="nk-menu-item" style="border-bottom:solid 1px #283593;cursor: pointer;">
    <a
    href="javascript:void(0)"
    class="nk-menu-link"
    title="University"
    @click="mainSidebar('university')"
    >
    <span class="nk-menu-icon"
    >

  <img  src="../../icons/campus.png" />
    </span>
    </a>

    <span style="color:white;font-size:10px;display:block;text-align:center;color:#D0D3D4;font-spacing:5px;">UNIVERSITY</span>
    </li>
    </ul>










    </div>
    <div
    class="nk-sidebar-footer"
    style="background: rgb(38, 38, 75);"
    >
    <ul class="nk-menu nk-menu-md">
    <li class="nk-menu-item">
    <a
    href="javascript:void(0)"
    class="nk-menu-link"
    title="Settings"
    >
    <span class="nk-menu-icon"
    >

    <em
    class="icon ni ni-setting"
    ></em
    >

    </span>
    </a>
    </li>
    </ul>
    </div>
    </div>
    <div
    class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown"
    style="background:rgb(38, 38, 75);;"
    >
    <a
    href="javascript:void(0)"
    data-toggle="dropdown"
    data-offset="50,-60"
    >
    <div class="user-avatar">
    <span>AB</span>
    </div>
    </a>
    <div
    class="dropdown-menu dropdown-menu-md ml-4"

    >
    <div
    class="dropdown-inner user-card-wrap d-none d-md-block"
    >
    <div class="user-card">
    <div class="user-avatar">
    <span>AB</span>
    </div>
    <div class="user-info">
    <span class="lead-text"
    >Abu Bin Ishtiyak</span
    >
    <span class="sub-text text-soft"
    >info@softnio.com</span
    >
    </div>
    </div>
    </div>
    <div
    class="dropdown-inner"

    >
    <ul class="link-list">
    <li>
    <a
    href="html/user-profile-regular.html"
    ><em
    class="icon ni ni-user-alt"
    ></em
    ><span>View Profile</span></a
    >
    </li>
    <li>
    <a
    href="html/user-profile-setting.html"
    ><em
    class="icon ni ni-setting-alt"
    ></em
    ><span>Account Setting</span></a
    >
    </li>
    <li>
    <a
    href="html/user-profile-activity.html"
    ><em
    class="icon ni ni-activity-alt"
    ></em
    ><span>Login Activity</span></a
    >
    </li>
    </ul>
    </div>
    <div class="dropdown-inner">
    <ul class="link-list">
    <li>
    <em
    class="icon ni ni-signout"
    ></em
    ><span>
    Sign out</span
    >
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



<div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap">
    <!-- main header @s -->
    <Header/>
    <!-- main header @e -->

    <SidebarSec/>

<!-- <nav style="margin-bottom:0px;background:white;margin-top:-2px;padding:2px;background:#F4F6F6;" class="border-bottom">
<ul class="breadcrumb breadcrumb-pipe" id="scrollTab" style="padding:6px">

 <li v-if="$store.state.hideFirstMenuItem==='show'"  style="color: #666;font-weight: 600;margin-right:2px;margin-left:2px;border:none;width:150px; overflow: hidden;padding-left:0px;padding-top: 0px; font-size:12px;background-color: #fff;"
        class="nav-item actived">
        <div style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width:150px;text-align:center;background-color: #fff;padding:6px">
    <router-link :to="$route.path"
    style="padding:10px;font-size:14px;color:#526484;font-family:Roboto, sans-serif;font-weight: 500;letter-spacing: -0.01rem;text-transform:capitalize;"
    >{{ $route.name }}</router-link>
        </div>
    </li>
<li v-for="m in $store.state.mainMenuTab" style="color: #666;font-weight: 600;margin-right:2px;margin-left:2px;border:none;width:150px; overflow: hidden;padding-left:0px;padding-top: 0px;background-color: #fff;" :id="m.replace(' ','-')"  :class="[($route.name.toLowerCase().replace(' ','') === m.toLowerCase().replace(' ','') ) ? 'nav-item actived ':'nav-item  border']">
<div style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width:110px;text-align:center;background-color: #fff;">
<router-link data-toggle="tab"  class="nav-link"  :to="m.replace(' ','-').toLowerCase()" style="color: #666;font-weight: 600;font-size: 12px; padding:10px;padding-top: 6px;"> {{m}}</router-link>
</div>
<a v-if="$route.name.toLowerCase().replace(' ','') === m.toLowerCase().replace(' ','') ">
    </a>
    <a v-else  href="javascript:void(0)" style="float:right;color:#000;margin-top: -26px; position: absolute;margin-left: 126px;"  @click="deleteTabApi(m)">
    <em class="icon ni ni-cross-circle" style="font-size:14px;margin-top:10px;"></em>
    </a>


</li>




</ul>
</nav> -->


<Tab/>





<div style="margin-top:-5px;">
 <router-view></router-view>
</div>



<div>
    <!-- Tabs with card integration -->


    <!-- Control buttons-->

  </div>
    <!---Alert Messages----->
    <div class="alert alert-fill alert-success alert-icon" v-if="$store.state.alertMessage.success!=null" style="position:fixed;bottom:20px;width:30%;z-index:10000;margin-left:35%;margin-right:35%;min-width:400px;left:0;" id="alertMessage">
    <em class="icon ni ni-check-circle"></em> {{ $store.state.alertMessage.success }}</div>



    <div class="alert alert-fill alert-warning alert-icon" v-else-if="$store.state.alertMessage.warning!=null" style="position:fixed;bottom:20px;width:30%;z-index:10000;margin-left:35%;margin-right:35%;min-width:400px;left:0;" id="alertMessage">
    <em class="icon ni ni-alert-circle"></em>{{ $store.state.alertMessage.warning }} </div>



    <div class="alert alert-fill alert-danger alert-icon" v-else-if="$store.state.alertMessage.error!=null" style="position:fixed;bottom:20px;width:30%;z-index:10000;margin-left:35%;margin-right:35%;min-width:400px;left:0;" id="alertMessage">
    <em class="icon ni ni-cross-circle"></em>  {{ $store.state.alertMessage.error }} </div>



    <div class="alert alert-fill alert-info alert-icon" v-else-if="$store.state.alertMessage.note!=null" style="position:fixed;bottom:20px;width:30%;z-index:10000;margin-left:35%;margin-right:35%;min-width:400px;left:0;" id="alertMessage">
    <em class="icon ni ni-alert-circle"></em> {{ $store.state.alertMessage.note }} </div>






    </div>
    <!-- content @e -->
    </div>




</div>
  </div>
</template>

<script>
    import Header from './Header';
    import SidebarSec from './SidebarSec';
    import ActiveTab from './ActiveTab';
    import Tab from './Tab';

    export default {
    components:{
    Header,
    SidebarSec,
    ActiveTab,
    Tab,



    },

    data() {
    return {
    mainMenu: "primary",
    showActive:'primary',

url:this.$route.path,
routeName:this.$route.name,
mainTab:this.$store.state.mainTab,
tabSettings:this.$store.state.mainTabSettings,
formattedUrl:null,
mainUrl:null,
status:null,
count:null,
allTabs:null,
active:'style="color:blue"',
className:null,
    };
    },

    methods: {
    mainSidebar: function(mainMenu) {
    this.showActive=mainMenu;
    if(mainMenu=='post-primary'){mainMenu='non-tertiary';}
    this.$store.state.classData={name:mainMenu,path:'/'+mainMenu+'/'};
this.$store.state.mainMenuTab=[];
this.$store.state.hideFirstMenuItem='show';
this.$store.state.reportMenu='table1';
this.$store.state.active_sub_menu='';
//dashboard





    },


mainMenu:function(item){
this.menu=item;
},


//format the url
formatUrl:function(){
var url=this.$route.path;
var splited=url.split('/');
var num1 =splited.length-1;

var num2=splited.length-2;
this.className=splited[num2];

},

//show
toggleShow:function(item){
var css=item.tab_route;
$('.'+css).show();
},
//hide
toggleHide:function(item){
var css=item.tab_route;
$('.'+css).show();
},




//delete tab api.
deleteTabApi:function(item){
//$('#'+item.replace(' ','-')).hide();
var m=this.$store.state.mainMenuTab;
var x;
this.$store.state.mainMenuTab=[];
for(x=0;x<=m.length;x++){
if(item!=m[x]){
this.$store.state.mainMenuTab.push(m[x]);
}
}








// var user=this.$store.state.userData.user;
// var deleteTab={user_id:user.id,mainRoute:item.main_route,tab_route:item.tab_route};
// var headers=this.$store.state.headers;
// this.axios.post('/api/users/tab/menu/delete',
// deleteTab,
// {headers}).then(response=>{
// if(response.status===200){
// //$('#'+item.tab_route).hide();
// this.$store.state.mainTab=response.data.tabContent;
// this.$store.state.mainTabSettings={count:response.data.count,allTabs:response.data.allTabs,status:response.status,moreTabs:response.data.moreTabs};
// }else{
// alert('Invalid menu tab');
// }
// }
// ).catch(error=>{
// this.$store.state.alert.error=error+' could not delete user tab. Refesh your brouser';
// });










},




//clear tab api.
clearMenuTabApi:function(){

var user=this.$store.state.userData.user;
var deleteTab={user_id:user.id};
var headers=this.$store.state.headers;
this.axios.post('/api/users/tab/menu/clear',
deleteTab,
{headers}).then(response=>{
if(response.status===200){
//$('#'+item.tab_route).hide();
this.$store.state.mainTab=response.data.tabContent;
this.$store.state.mainTabSettings={count:response.data.count,allTabs:response.data.allTabs,status:response.status,moreTabs:response.data.moreTabs};
}else{
alert('Invalid menu tab');
}
}
).catch(error=>{
this.$store.state.alert.error=error+' could not delete user tab. Refesh your brouser';
});

},













},



mounted(){
//hide alert message after the interval
setInterval(function(){
$('#alertMessage').hide();
},4000);
this.formatUrl();
this.clearMenuTabApi();

    }
    };

    </script>


<style>
.actived{
 border-bottom: 2px solid rgb(28, 161, 193) !important;
}





</style>
