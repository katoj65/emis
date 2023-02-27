
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of Textbook by Subject and Grade


</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Subject  </th>
      <th scope="col"> Category
</th>
      <th scope="col">P1
</th>
      <th scope="col">P2
</th>
      <th scope="col">P3
</th>  
<th scope="col">P4
</th>  
<th scope="col">P5
</th>  
     <th scope="col">P6
</th> 
<th scope="col">P7
</th>   
<th scope="col">Total
</th>  
    </tr>
  </thead>
  <tbody>
      
   
      
    <tr>
       <td>Agriculture</td>
      <td>Textbooks</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td>2</td>
    <td>4</td>
    </tr>
<tr>
       <td></td>
      <td>Teacher's
Guide</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td>2</td>
    <td>6</td>
    </tr>
  
    
   

    <tr>
       <td>English</td>
      <td>Textbooks</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td>2</td>
    <td>4</td>
    </tr>
<tr>
       <td></td>
      <td>Teacher's
Guide</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td></td>
    <td>390</td>
        <td>390</td>
    <td>2</td>
    <td>6</td>
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
