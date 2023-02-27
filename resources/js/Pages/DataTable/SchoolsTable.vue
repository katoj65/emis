
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                                <div>
                                                   
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
                                                    
                                                    
                                                  
                                                </div><!-- .card-title-group -->
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of  Schools</h6>
                                           
                                            </div>
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist is-compact">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        
                                                        <div class="nk-tb-col"><span class="sub-text">School</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Region</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span class="sub-text">District</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Sub county</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Village</span></div>

                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Students</span></div>
                                                        
                                                        
                                                    
                                                        
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item" v-for="n in 200" :key="n">
                                                       
                                                        <div class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-avatar xs bg-primary">
                                                                    <span>AB</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span>Customer</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span>info@softnio.com</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span>+811 847-4958</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span>Bangladesh</span>
                                                        </div>
                                                       
                                                          <div class="nk-tb-col tb-col-lg">
                                                            <span>Bangladesh</span>
                                                        </div>
                                                       
                                                        
                                                        
                                                    </div><!-- .nk-tb-item -->
                                                    
                                                    
                                                   
                                                   
                                                    
                                                 
                                                   
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
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