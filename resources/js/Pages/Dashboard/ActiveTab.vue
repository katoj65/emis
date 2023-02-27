<template>
<div>

<nav style="padding-bottom:15px;margin-bottom:0px;" class="border-bottom">


<ul class="breadcrumb breadcrumb-pipe" id="scrollTab">
<li  style="border:none;margin-right:10px;">
<strong style="color:#8094ae;font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05rem;">{{ className.toUpperCase() }}</strong>
<em class="icon ni ni-forward-ios" style="margin-left:10px;margin-top:3px;font-weight:bold;color:#8094ae;"></em>
</li>

<li class="breadcrumb-item" style="border:none;">
<router-link :to="$route.path">{{ $route.name }}</router-link>
</li>





<li  class="breadcrumb-item hideTab" v-for="tab in $store.state.mainTab" @mouseover="toggleShow(tab)" @mouseleave="toggleHide(tab)" v-if="$route.name.toLowerCase()!=tab.tab_name.toLowerCase()" :id="tab.tab_route">

<a href="javascript:void(0)" style="margin-right:10px;display:none;color:red;" :class="tab.tab_route" @click="deleteTabApi(tab)" v-if="tab.tab_route!=$route.path">X</a>
<router-link :to="tab.main_route+tab.tab_route">
{{ tab.tab_name }}
</router-link> </li>


<li  style="padding-left:30px;position:absolute;right:0;background:white;" v-if="$store.state.mainTabSettings.allTabs.length>5">
<a href="javascript:void(0)" class="btn" style="padding:0;margin:0;padding-left:10px;padding-right:10px;border-radius:0;margin-top:-10px;" data-toggle="modal" data-target="#modalSmall">
    <em class="icon ni ni-view-grid-fill"></em>
    </a>
</li>


</ul>
</nav>



<!---Tab menu modal-->








 <!-- Mopdal Small -->
    <div class="modal fade" tabindex="-1" id="modalSmall">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $store.state.classData.name.toUpperCase() }} MENU</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body" style="padding:0;height:400px;overflow:auto;">








<ul class="list-unstyled">

<li v-for="tabList in $store.state.mainTabSettings.allTabs" class="
border-bottom" data-dismiss="modal" style="padding:10px;">
<router-link :to="tabList.main_route+tabList.tab_route" class="text-soft" style="font-size:16px;">
    <em class="icon ni ni-chevron-right"></em>
    {{ tabList.tab_name }} </router-link></li>



</ul>



                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text" v-if="$store.state.mainTabSettings.allTabs.length<2">{{ $store.state.mainTabSettings.allTabs.length }} Tab Available</span>

                    <span class="sub-text" v-else>{{ $store.state.mainTabSettings.allTabs.length }} Tabs Available </span>

                </div>
            </div>
        </div>
    </div>










</div>
</template>

<script>
export default {

data(){
return{
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


}
},


//methods
methods: {
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
$('.'+css).hide();
},





//delete tab api.
deleteTabApi:function(item){
var user=this.$store.state.userData.user;
var deleteTab={user_id:user.id,mainRoute:item.main_route,tab_route:item.tab_route};
var headers=this.$store.state.headers;
this.axios.post('/api/users/tab/menu/delete',
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




//mounted functions
mounted(){
this.formatUrl();
}





}
</script>
<style>
@media only screen and (max-width:900px){
.hideTab{
    display: none;
}
}
@media only screen and (min-width:900px){
.hideTab{
    display:block;
}
}

</style>

