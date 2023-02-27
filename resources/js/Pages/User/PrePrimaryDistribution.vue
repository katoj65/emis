
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 12px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of  Regional Distribution of Pre-Primary Schools by Category</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
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
<th scope="col">Grand
Total</th><th scope="col">%TOTAL</th>
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
      <td>4%</td>
      <td>24%</td>
    </tr>
    <tr>
      
       <td>Grand Total</td>
      <td>13</td>
      <td>1</td>
      <td>1</td>
      <td>274</td>
      <td>288</td>
      <td>4%</td>
      <td>24%</td>
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
