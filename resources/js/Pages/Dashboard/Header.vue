<template>

      <div class="nk-header nk-header-fixed is-light">
<div class="container-fluid">
                        <div class="nk-header-wrap" style="height: 62px;display: flex;justify-content: center; align-items: left">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                                <em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-app-name" style="cursor:pointer;margin-left:-10px;">
                                <div class="nk-header-app-logo" style="margin-right:0;">
<router-link to="/dashboard" class="nk-menu-link" style="padding:0;margin:0;">
<img src="../../logo/uganda2.png" style="width:65px;height:35px;margin-top:-4px;"/>
</router-link>

                                </div>
                                <div class="nk-header-app-info" style="cursor:pointer;margin-left:0;padding-left:5px;">
                                    <router-link to="/dashboard" class="nk-menu-link">
                                       <span class="lead-text">The Republic of Uganda</span>
                                    <span class="sub-text" style="color:#1CA1C1;border-top:solid 1px black;">
                                     Ministry of Education & Sports
                                    </span>

                                    </router-link>
                                </div>
                            </div>
                            <div class="nk-header-menu is-light" >
                                <div class="nk-header-menu-inner" >
                                    <!-- Menu -->
                                    <ul class="nk-menu nk-menu-main">
                                        <li class="nk-menu-item">
                                            <router-link to="/dashboard" class="nk-menu-link">
                                                <span class="nk-menu-text">Home</span>
                                            </router-link>


                                        </li>
                                        <li class="nk-menu-item">
                                             <router-link to="/reports" class="nk-menu-link">
                                                <span class="nk-menu-text">Reports</span>
                                            </router-link>
                                        </li>
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-text">Documents</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <router-link to="/documents/downloads" class="nk-menu-link"><span class="nk-menu-text">Download</span></router-link>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <router-link to="/documents/uploads" class="nk-menu-link"><span class="nk-menu-text">Upload</span></router-link>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <router-link to="/documents/templates" class="nk-menu-link"><span class="nk-menu-text">Templates</span></router-link>
                                                </li>

                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->



                                            <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-text">Help</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="/demo2/ecommerce/index.html" class="nk-menu-link"><span class="nk-menu-text">FAQ</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="/demo3/apps/file-manager.html" class="nk-menu-link"><span class="nk-menu-text">Support Center</span></a>
                                                </li>


                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->



                                    </ul>
                                    <!-- Menu -->
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown chats-dropdown hide-mb-xs">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <ul class="chat-list">
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <span>IH</span>
                                                                <span class="status dot dot-lg dot-gray"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Iliash Hossain</div>
                                                                    <span class="time">Now</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: Please confrim if you got my last messages.</div>
                                                                    <div class="status delivered">
                                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item is-unread">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar bg-pink">
                                                                <span>AB</span>
                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Abu Bin Ishtiyak</div>
                                                                    <span class="time">4:49 AM</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                                    <div class="status unread">
                                                                        <em class="icon ni ni-bullet-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">

                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">George Philips</div>
                                                                    <span class="time">6 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Have you seens the claim from Rose?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar user-avatar-multiple">
                                                                <div class="user-avatar">

                                                                </div>
                                                                <div class="user-avatar">
                                                                    <span>AB</span>
                                                                </div>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Softnio Group</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">

                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Larry Hughes</div>
                                                                    <span class="time">3 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi Frank! How is you doing?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar bg-purple">
                                                                <span>TW</span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Tammy Wilson</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                </ul><!-- .chat-list -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <router-link to="/user/notifications">View All</router-link>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash shared <span>Dashlite-v2</span> with you.</div>
                                                            <div class="nk-notification-time">Just now</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-info-dim ni ni-edit"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash <span>invited</span> you to edit <span>DashLite</span> folder</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have shared <span>project v2</span> with Parvez.</div>
                                                            <div class="nk-notification-time">7 days ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-spark"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Subscription</span> renew successfully.</div>
                                                            <div class="nk-notification-time">2 month ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <router-link to="/user/notifications">View all</router-link>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown list-apps-dropdown d-lg-none">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-body">
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="html/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-dashlite bg-primary text-white"></em></span>
                                                            <span class="list-apps-title">Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/chats.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-chat-circle bg-info-dim"></em></span>
                                                            <span class="list-apps-title">Chats</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-inbox bg-purple-dim"></em></span>
                                                            <span class="list-apps-title"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/messages.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-chat bg-success-dim"></em></span>
                                                            <span class="list-apps-title">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/file-manager.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-folder bg-purple-dim"></em></span>
                                                            <span class="list-apps-title">File Manager</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/components.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-layers bg-secondary-dim"></em></span>
                                                            <span class="list-apps-title">Components</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="/demo2/ecommerce/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-cart bg-danger-dim"></em></span>
                                                            <span class="list-apps-title">Ecommerce Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo4/subscription/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-calendar-booking bg-primary-dim"></em></span>
                                                            <span class="list-apps-title">Subscription Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo5/crypto/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-bitcoin-cash bg-warning-dim"></em></span>
                                                            <span class="list-apps-title">Crypto Wallet Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo6/invest/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-invest bg-blue-dim"></em></span>
                                                            <span class="list-apps-title">HYIP Invest Panel</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- .nk-dropdown-body -->
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm" style="background:#1CA1C1;">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ username }} </span>
                                                        <span class="sub-text">{{ email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><router-link to="/user/profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></router-link></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>

                                                    <a @click="logout" style="cursor:pointer"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

<!------
                <hr style="border:solid 2px black;margin:0"/>
                <hr style="border:solid 2px #FFD700;margin:0"/>
                <hr style="border:solid 2px red;margin:0"/>

                ----->
                </div>

</template>

<script>
export default {


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
this.username=info.user.first_name;
this.email=info.user.email;
},




logout:function(){
var session=this.$session.get('userData');
this.axios.get('/api/user/logout',{
headers:{
'Content-Type':'application/json',
'Authorization':'Bearer '+session}
    }).then(
response=>{
this.$session.clear('userData');
sessionStorage.clear();
window.location = '/';
})

 .catch(error => console.log(error))

}

},

//mounted functions
mounted(){
this.userInfo();
}



}
</script>
