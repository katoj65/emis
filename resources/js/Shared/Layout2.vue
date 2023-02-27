<template>
    <div class="fixed-navbar">

    <div class="page-wrapper">

    <!-- START HEADER-->
        <header class="header" style="position:fixed;width:100%;z-index:100000;box-shadow:none;" >
            <div class="page-brand" id="sento" v-if="lToggle=='show'">
                <a class="link" style="color:white;font-weight:bold;box-shadow:none;">
                    <span class="brand">
EMIS
                    </span>

                </a>
            </div>
            <div class="flexbox flex-1" id="mycss" >
                <!-- START TOP-LEFT TOOLBAR-->


<a class="hideMenu" style="padding:20px;"><i class="ti-menu"></i></a>

                <ul class="nav navbar-toolbar">

                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler">
                        <i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here..." style="border:solid 1px #D7DBDD;">
                            </div>
                        </form>
                    </li>

                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
               <div class="nav navbar-toolbar">
<span style="padding-right:20px;">


 <b-dropdown size="lg"  variant="link" toggle-class="text-decoration-none" no-caret>
    <template #button-content>
     <span style="font-size:12px;color:gray;"><b-icon-envelope></b-icon-envelope> Messages</span>
    </template>
    <b-dropdown-item href="#">Inbox</b-dropdown-item>
    <b-dropdown-item href="#">Draft</b-dropdown-item>
    <b-dropdown-item href="#">Outbox</b-dropdown-item>
  </b-dropdown>





 <b-dropdown size="lg"  variant="link" toggle-class="text-decoration-none" no-caret>
    <template #button-content>
     <span style="font-size:13px;color:gray;"><b-icon-gear></b-icon-gear> Settings</span>
    </template>
    <b-dropdown-item href="#">Account Management</b-dropdown-item>
    <b-dropdown-item href="#">Change Language</b-dropdown-item>
    <b-dropdown-item href="#">Report</b-dropdown-item>
  </b-dropdown>





 <b-dropdown size="lg"  variant="link" toggle-class="text-decoration-none" no-caret>
    <template #button-content>
      <b-icon-box-arrow-in-right style="color:gray;width:18px;height:18px;"></b-icon-box-arrow-in-right>
    </template>
       <b-dropdown-item href="#">{{ $page.auth.user.first_name }}</b-dropdown-item>
    <b-dropdown-item href="#">User Profile</b-dropdown-item>
    <b-dropdown-item><inertia-link :href="route('logout')">Logout</inertia-link></b-dropdown-item>
  </b-dropdown>

</span>



               </div>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>





        </header>
        <!-- END HEADER-->
















        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar" v-if="lToggle=='show'" style="position:fixed">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">James Brown</div><small>Administrator</small></div>
                </div>


                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="colors.html">Colors</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="panels.html">Panels</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="tabs.html">Tabs</a>
                            </li>
                            <li>
                                <a href="alerts_tooltips.html">Alerts &amp; Tooltips</a>
                            </li>
                            <li>
                                <a href="badges_progress.html">Badges &amp; Progress</a>
                            </li>
                            <li>
                                <a href="lists.html">List</a>
                            </li>
                            <li>
                                <a href="cards.html">Card</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Forms</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="form_basic.html">Basic Forms</a>
                            </li>
                            <li>
                                <a href="form_advanced.html">Advanced Plugins</a>
                            </li>
                            <li>
                                <a href="form_masks.html">Form input masks</a>
                            </li>
                            <li>
                                <a href="form_validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="text_editors.html">Text Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="table_basic.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="datatables.html">Datatables</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="charts_flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts_morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="chartjs.html">Chart.js</a>
                            </li>
                            <li>
                                <a href="charts_sparkline.html">Sparkline Charts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                            <span class="nav-label">Maps</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="maps_vector.html">Vector maps</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                            <span class="nav-label">Icons</span>
                        </a>
                    </li>
                    <li class="heading">PAGES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label"></span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href=".html">Inbox</a>
                            </li>
                            <li>
                                <a href="mail_view.html">Mail view</a>
                            </li>
                            <li>
                                <a href="mail_compose.html">Compose mail</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="lockscreen.html">Lockscreen</a>
                            </li>
                            <li>
                                <a href="forgot_password.html">Forgot password</a>
                            </li>
                            <li>
                                <a href="error_404.html">404 error</a>
                            </li>
                            <li>
                                <a href="error_500.html">500 error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">Level 2</a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->






        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up" style="padding-top:0;">


<flash-messages />
<slot />




            </div>


            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>


<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>







    </div>
</template>



<script>
import MainMenu from '@/Shared/MainMenu'
import FlashMessages from '@/Shared/FlashMessages'

  export default {
    name: 'PermanentFull',
    components: {   MainMenu,FlashMessages },
 data() {
    return {
      showUserMenu: false,
      accounts: null,
      lToggle:'show'
    }
  },
      methods: {
    url() {
      return location.pathname.substr(1)
    },
    hideDropdownMenus() {
      this.showUserMenu = false
    },

leftToggle: function (lToggle){
    if(this.lToggle==='show'){
this.lToggle='hide';
    }else{
this.lToggle='show';
    }
}


  },


  }

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
   $('#mycss').css({"border-bottom":'solid 1px #d8dbe0'});
  } else {
   $('#mycss').css({"border-bottom":'none'});
  }
}




</script>






<style>
@media only screen and (max-width:1000px){
    .page-sidebar{
        display:none
    }
    .content-wrapper{margin-left: 0;margin-top: 0;}
.navbar-toolbar{
display: none;
}
.hideMenu{display: block;}
}



  .content-wrapper{
        margin-top:40px
    }

@media only screen and (min-width:1000px) {
.hideMenu{display: none;}
}

.ibox{

}
.ibox-head{

}
.form-control{
border-radius: 0;

}


</style>
