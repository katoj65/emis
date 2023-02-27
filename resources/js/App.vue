<template>
 <div>

<!--Login page start-->
<div v-if="$route.path==='/login' || $route.path==='/'">
<div v-if="authState===false">
<Login/>
</div>
<div v-else>
<div class="text-center" style="display:flex;
align-items:center;
justify-content:center;
background:#3495f3;min-height:100%;position:fixed;width:100%;left:0;right:0;">
<b-spinner label="Text Centered" style="color:white;"></b-spinner>
</div>
</div>
</div>
<!--End login page--->




<!--Dashboards--->

<div v-else-if="$route.path==='/dashboard'">
<div v-if="authState===true">
<SidebarMain/>
</div>
</div>
<div v-else>
<div v-if="authState===true">
<SidebarMain/>
</div>
</div>

<!--End Dashboards--->







</div>
</template>

<script>

import SidebarMain from './Pages/Dashboard/SidebarMain';
import Login from './Pages/Auth/Login';
export default {
components:{

SidebarMain,
Login

},

data(){
    return{
authState:false,

    }
},





//component mounted
 mounted() {
if(this.$session.exists('userData')){
this.authState=true;
//create user data from user session
this.$store.state.userData=this.$session.get('userInfo');
this.$store.state.headers={
 'Authorization':'Bearer '+this.$store.state.userData.token
}
}else{
if(this.$route.path!=='/login' && this.$route.path!=='/'){
window.location="/login";
}
}



   }


};




</script>

<style></style>
