<template>
 <div class="nk-ibx-head">
            <div class="nk-ibx-head-actions" style="padding-top:20px">



<nav v-if="search==='false'">
    <ul class="breadcrumb breadcrumb-pipe">
        <li class="breadcrumb-item" v-if="subMenu!=''" v-for="n in subMenu">

           <router-link :to="n.url">
{{ n.item }}
           </router-link>
        </li>
    </ul>
</nav>












<ul v-if="search==='true'" style="width:500px !important;padding:0;">

<li style="padding:0;">
<div class="" data-search="search" style="display:block;padding:0;">
<div class="search-content" style="padding:0;">
<a href="#" class="search-back btn btn-icon toggle-search active" data-target="search" @click="searchMethod('false')"><em class="icon ni ni-arrow-left"></em></a>
<input type="text" class="form-control border-transparent form-focus-none" placeholder="Search ...." style="margin:0;"/>

</div>
</div>


</li>
</ul>










            </div>



            <div>
                <ul class="nk-ibx-head-tools g-1">
                    <li v-if="search==='false'">
                        <a
                            href="#"
                            class="btn btn-icon"
                              @click="searchMethod('true')"><em class="icon ni ni-search" style="margin-top:10px;position:absolute;"></em
                        ></a>
                    </li>





                </ul>

<!--Search -->


<!--search ends here-->
            </div>

            <!-- .search-wrap -->


        </div>
</template>


<script>
export default {
props:{
subMenu:Array,
},

data(){
    return{
path:this.$route.path,
search:'false',
    }
},

//search method
methods:{
searchMethod:function(searched){
this.search=searched;
$('#searchfocus').focus();
}
}



}
</script>
