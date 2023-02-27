<template>
    <div class="nk-ibx-head">
            <div class="nk-ibx-head-actions">

                <ul class="nk-ibx-head-tools g-1" v-if="search==='false'">
                    <li > <select class="form-control" id="default-01" placeholder="Input placeholder" style="width: 200px;">
<option>Emis</option>
<option>Book</option>
</select></li>
                    <li id="hideInput">
<input type="text" class="form-control" id="default-01" placeholder="Input placeholder" style="width: 200px;"/>

                    </li>

                     <li id="hideInput">
<input type="text" class="form-control" id="default-01" placeholder="Input placeholder" style="width: 200px;"/>

                    </li>
                    <li id="hideInput"><a href="#" class="btn btn-light">Filter</a></li>
<li id="hideInput">
                    <div class="dropdown">
                                                            <a href="#" class="btn btn-primary" data-toggle="dropdown" aria-expanded="false"><span>Action Button</span><em class="icon ni ni-chevron-down"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="">
                                                                <ul class="link-list-plain">
                                                                    <li><a href="#">Link List Item</a></li>
                                                                    <li><a href="#">Link List Item</a></li>
                                                                    <li><a href="#">Link List Item</a></li>
                                                                    <li><a href="#">Link List Item</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
</li>
                </ul>







  <ul v-if="search==='true'" style="width: 500px;">

<li>
<div class="" data-search="search">
                                                    <div class="search-content">
                                                        <a href="#" class="search-back btn btn-icon toggle-search active" data-target="search" @click="searchMethod('false')"><em class="icon ni ni-arrow-left"></em></a>
                                                        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search ...." />

                                                    </div>
                                                </div>


</li>
  </ul>










            </div>



            <div>
                <ul class="nk-ibx-head-tools g-1" >
                    <li v-if="search==='false'" style="display:block; float:right;">
                        <a
                            href="#"
                            class="btn btn-icon"
                              @click="searchMethod('true')"><em class="icon ni ni-search"></em
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


<style>
@media only screen and (max-width:900px){
    #hideInput{
        display:none
    }


}

</style>
