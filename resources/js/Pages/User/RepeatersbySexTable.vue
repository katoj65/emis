
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of  Repeaters by Sex, Grade and Ownership

</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Class  </th>
      <th scope="col"> Gender
</th>
      <th scope="col" colspan="4">Repeaters
</th>
      <th scope="col" colspan="3">Total Enrollment
</th>
      <th scope="col" colspan="4" >Proportion of Repeaters
</th>  

     
    </tr>
  </thead>
  <tbody>
      

<tr>
     
       <td>
       </td>
      <td></td>
      <td>Government</td>
      <td>Private</td>
     <td>Total</td>
     <td></td>
    <td> Government</td>
        <td>Private</td>
    <td style="border-bottom: 1px solid #ddd;">Total</td>
    

      <td></td>
    <td> Government</td>
        <td>Private</td>
    <td style="border-bottom: 1px solid #ddd;">Total</td>
    </tr>
   
      
    <tr>
     
       <td>P1</td>
      <td>Male</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td style="border-bottom: 1px solid #ddd;">2</td>
    <td style="border-bottom: 1px solid #ddd;"></td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">5</td>
    </tr>

    <tr>
     
       <td></td>
      <td>Female</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td style="border-bottom: 1px solid #ddd;">2</td>
    <td style="border-bottom: 1px solid #ddd;"></td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">5</td>
    </tr>

     <tr>
     
       <td style="border-bottom: 1px solid #ddd;"></td>
      <td style="border-bottom: 1px solid #ddd;">Total</td>
      <td style="border-bottom: 1px solid #ddd;">390</td>
      <td style="border-bottom: 1px solid #ddd;">2,177</td>
     <td style="border-bottom: 1px solid #ddd;">2,177</td>
     <td style="border-bottom: 1px solid #ddd;"></td>
    <td style="border-bottom: 1px solid #ddd;">390</td>
        <td style="border-bottom: 1px solid #ddd;">390</td>
    <td style="border-bottom: 1px solid #ddd;">2</td>
    <td style="border-bottom: 1px solid #ddd;"></td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">4</td>
    <td style="border-bottom: 1px solid #ddd;">5</td>
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
