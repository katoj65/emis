
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of  Distance from DEOs office



</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Region
    </th>
      <th scope="col" colspan="6" style="text-align: center;">Distance from DEOs Office 
</th>
      <th scope="col" colspan="2">Grand Total
</th>
    </tr>
  </thead>
  <tbody>
      

<tr>
     
       <td>

</td>
      <td>Below 10 km</td>
      <td>10 - 20 km</td>
      <td>20.1 - 30 km</td>

      <td>30.1 - 40 km</td>
     <td>40.1 -50 km</td>
     <td>
         Above 50 km
 </td>
 
  
  
    </tr>
   
      
    <tr v-for="n in 200">
     
       <td>ACHOLI</td>
      <td>1,787</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td>65</td>
    <td>390</td>
       
    <td>390</td>
   
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
</template>

<script>
import FilterTable from "./FilterTable";
export default {

components:{

    FilterTable
}




}
</script>
