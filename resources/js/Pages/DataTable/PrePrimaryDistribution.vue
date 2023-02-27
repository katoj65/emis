
<template>
  <div>

<div class="card  card-stretch" style="padding:0;">
                                        <div class="card-inner-group">

                                            <div>


<!---FILTER---->


  <div class="nk-ibx-head">
            <div class="nk-ibx-head-actions">

                <ul class="nk-ibx-head-tools g-1" v-if="search==='false'">
                    <li > <select class="form-control" id="default-01" placeholder="Input placeholder" style="width:138px;">
<option>Select Region</option>
<option v-for="n in region">{{ n.name }} </option>
</select></li>
                    <li id="hideInput">
<input type="text" class="form-control" id="default-01" placeholder="School Type" style="width:138px;"/>

                    </li>

                     <li id="hideInput">
<input type="text" class="form-control" id="default-01" placeholder="Number of schools" style="width:138px;"/>

                    </li>

<li id="hideInput">
                    <div class="dropdown">
                                                            <a href="#" class="btn btn-primary" data-toggle="dropdown" aria-expanded="false"><span>{{ sortButton }}</span><em class="icon ni ni-chevron-down"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-auto mt-1" style="">
                                                                <ul class="link-list-plain">
                                                                    <li>
                                                                    <a href="#" v-for="c in sorted" :key="c.type"  @click="sortButtonFunctionality(c)">{{ c.type }} </a></li>

                                                                </ul>
                                                            </div>
                                                        </div>
</li>

    <li ><a href="#" class="btn btn-light">Filter</a></li>



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








<!--END FILTER-->




</div><!-- .card-inner -->

<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Region</th>
      <th scope="col">Community
Based</th>
      <th scope="col">Day
Care</th>
      <th scope="col">Home Based</th>
      <th scope="col">Nursery</th>
       <th scope="col">Grand
Total</th>
<th scope="col">%TOTAL</th>
    </tr>
  </thead>
  <tbody>

    <tr v-for="n in 200">
       <td>ACHOLI</td>
      <td>13</td>
      <td>1</td>
      <td>1</td>
      <td>274</td>
      <td>288</td>
      <td>24%</td>
    </tr>
    <tr>

<th>Grand Total</th>
<th>13</th>
<th>1</th>
<th>1</th>
<th>274</th>
<th>288</th>
<th>24%</th>
    </tr>

  </tbody>
</table>
<div class="card-inner">
<ul class="pagination justify-content-center justify-content-md-start">
<li class="page-item"><a class="page-link" href="#">Prev</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
<li class="page-item"><a class="page-link" href="#">6</a></li>
<li class="page-item"><a class="page-link" href="#">7</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul><!-- .pagination -->
</div><!-- .card-inner -->
</div><!-- .card-inner-group -->
</div>
</div>
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
region:[{name:'Acholi'},{name:'West Nile'},{name:'Toro'},{name:'Buganda'},{name:'Busoga'},{name:'Ankole'}],
sorted:[{type:'Community Based'},{type:'Day Care'},{type:'Home Based'},{type:'Nursary'}],

sortButton:'Sort by School Type',

    }


},

//search method
methods:{
searchMethod:function(searched){
this.search=searched;
$('#searchfocus').focus();
},

sortButtonFunctionality:function(option){
this.sortButton=option.type;
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
