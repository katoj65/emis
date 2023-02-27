
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of   Institutions by Ownership and Type

</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Institution Type  </th>
      <th scope="col" colspan="3" style="text-align: center;">School ownership
</th>
      <th scope="col">Grand Total
</th>
     
    </tr>
  </thead>
  <tbody>
      

<tr >
     
       <td>
</td>
      <td>Government</td>
      <td></td>
      <td>Private</td>
     <td></td>
     
    
   
    
    </tr>
   
      
    <tr v-for="n in 200">
       <td>Agriculture</td>
      <td>1,787</td>
      <td></td>
      <td>2,177</td>
     <td>2,177</td>
    
    </tr>
   

    <tr>
       <td>Grand Total</td>
      <td>1,787</td>
      <td></td>
      <td>2,177</td>
     <td>2,177</td>
    
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
