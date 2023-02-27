



window.Vue = require('vue');
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSessionStorage from 'vue-sessionstorage'
import {routes} from './routes';
import 'es6-promise/auto';
import Chartkick from 'vue-chartkick';
import Chart from 'chart.js';
import Vuex, { Store } from 'vuex';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueSession from 'vue-session';
import VueGoogleCharts from 'vue-google-charts';


Vue.use(VueSession);
Vue.use(VueGoogleCharts);


// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(VueSessionStorage)
Vue.use(Vuex);

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(Chartkick.use(Chart));


const router = new VueRouter({
    mode: 'history',
    routes: routes
});





//state management
const store = new Vuex.Store({
//state declaration
state: {
mainTab:{},
userData:{},
//mainTabSettings:{},
headers:{},
classData:{name:'primary',path:'/primary/'},
alertMessage:{success:null,error:null,warning:null,note:null},
enrolment_year:null,
reportTitle:null,
reportMenu:'table1',
tabData:[],
tabUrl:[],
hideFirstMenuItem:'show',
loading_status:false,
mainMenuTab:[],
data:[],

//carries data for the active api
active_data:'',
active_sub_menu:sessionStorage.getItem("subMenu"),
advanced_filter:false,

















  },

//mutations
mutations: {
    getSessionData(state) {
    var m=sessionStorage.getItem('userInfo');
    state.user=m;
    },

    getMainTab(state){

    }

  }



  });


//main component

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
    store:store

});











