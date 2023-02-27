<template>
<div>
    
<div class="card " style="border-radius:0;margin:0;">
<div class="card-aside-wrap">
<div class="card-inner card-inner-lg">
<div class="nk-block-head nk-block-head-lg">
<div class="nk-block-between">
<div class="nk-block-head-content">
<h4 class="nk-block-title">Personal Information</h4>
<div class="nk-block-des">
<p>Basic info, like your name and address, that you use on Nio Platform.</p>
</div>
</div>
<div class="nk-block-head-content align-self-start d-lg-none">
<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
</div>
</div>
</div><!-- .nk-block-head -->
<div class="nk-block">
<div class="nk-data data-list">
<div class="data-head">
<h6 class="overline-title">Basics</h6>
</div>
<div class="data-item" data-toggle="modal" data-target="#profile-edit">
<div class="data-col">
<span class="data-label">Full Name</span>
<span class="data-value">{{ username }}</span>
</div>
<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
</div><!-- data-item -->
<div class="data-item" data-toggle="modal" data-target="#profile-edit">
<div class="data-col">
<span class="data-label">Display Name</span>
<span class="data-value">{{ username }}</span>
</div>
<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
</div><!-- data-item -->
<div class="data-item">
<div class="data-col">
<span class="data-label">Email</span>
<span class="data-value">{{ email }}</span>
</div>
<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
</div><!-- data-item -->
<div class="data-item" data-toggle="modal" data-target="#profile-edit">
<div class="data-col">
<span class="data-label">Phone Number</span>
<span class="data-value text-soft">Not add yet</span>
</div>
<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
</div><!-- data-item -->
<div class="data-item" data-toggle="modal" data-target="#profile-edit">
<div class="data-col">
<span class="data-label">Date of Birth</span>
<span class="data-value">29 Feb, 1986</span>
</div>
<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
</div><!-- data-item -->
<div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
<div class="data-col">
<span class="data-label">Address</span>
<span class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
</div>
<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
</div><!-- data-item -->
</div><!-- data-list -->




<change-password/>



</div><!-- .nk-block -->
</div>
</div><!-- .card-aside-wrap -->
</div>
</div>
</template>







<script>
import  ChangePassword from './ChangePassword';
export default {

components:{
ChangePassword,

},

data(){
return{
username:null,
email:null,
role:null

}

},


methods:{
userInfo(){
var info=this.$session.get('userInfo');
this.username=info.user.first_name +' '+ info.user.last_name ;
this.email=info.user.email;
},


},

//mounted functions
mounted(){
this.userInfo();
}



}

</script>
