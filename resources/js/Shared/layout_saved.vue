<template>
  <div class="page-container md-layout-row">
    <md-app>




<md-app-toolbar class="secondary" style="position:fixed;width:100%;padding:0;margin:0;background:white;border-bottom:solid thin #e2e8f0;margin-left:230px;">
   <b-navbar toggleable="lg" variant="faded" type="light" style="width: 100%">

<span style="color:black;cursor:pointer;" v-on:click="leftToggle">
 <b-icon-justify style="width: 20px; height: 20px;"></b-icon-justify>
 </span>



<span style="margin-left:20px;">
<a href="#" style="color:black;">Home</a>
</span>


<span style="margin-left:20px;">
<a href="#" style="color:black;">
<b-icon icon="info" style="width: 16px; height: 16px;"></b-icon>
Education Information Center</a>
</span>

<span style="margin-left:20px;">
<a href="#" style="color:black;">Policy</a>
</span>



<b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
<b-collapse id="nav-collapse" is-nav>


  <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">

    <b-nav-item-dropdown text="Settings" right style="margin-right:15px;">
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>

        </b-nav-item-dropdown>






<md-chip style="margin-right:10px;">Joshua K</md-chip>






          <!-- Using 'button-content' slot -->

        <md-menu md-size="small" md-align-trigger style="font-size:14px;">
      <md-button md-menu-trigger >Account</md-button>

      <md-menu-content>
        <md-menu-item><a href="#">Profile</a> </md-menu-item>
        <md-menu-item><inertia-link :href="route('logout')">Logout</inertia-link></md-menu-item>
      </md-menu-content>
    </md-menu>


      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</md-app-toolbar>
















      <md-app-drawer md-permanent="full" v-if="lToggle==='show'" style="position:fixed">
        <md-toolbar class="md-transparent" md-elevation="0">
          Navigation
        </md-toolbar>

 <main-menu :url="url()" />
      </md-app-drawer>





      <md-app-content style="padding:0;background:#ebedef">


<slot />

      </md-app-content>
    </md-app>
  </div>
</template>

<script>
import MainMenu from '@/Shared/MainMenu'
  export default {
    name: 'PermanentFull',
    components: {   MainMenu, },
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
</script>

<style scoped>
.md-app {
  min-height: 900px !important;
  border: 1px solid rgba(#000, 0.12);
}

.md-drawer {
  width: 230px;
  max-width: calc(100vw - 125px);
}

</style>
