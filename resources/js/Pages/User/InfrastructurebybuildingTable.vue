
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of   Infrastructure by building type and completion status

</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Infrastructure Type  </th>
      <th scope="col" colspan="2">Complete In Use
</th>
      <th scope="col" colspan="2">Incomplete In Use
</th>
      <th scope="col" colspan="2">Not In Use
</th>
      <th scope="col" >Needed
</th>  

 <th scope="col">Permanent
Structures
</th>  
     
     <th scope="col">Total Structures
</th>   
    </tr>
  </thead>
  <tbody>
      

<tr >
     
       <td>
</td>
      <td>P</td>
      <td>T</td>
      <td>P</td>
     <td>T</td>
     <td>P</td>
    <td> T</td>
    <td></td>
    <td></td>
    <td></td>
    
    </tr>
   
      
    <tr v-for="n in 200">
     
       <td>Classrooms</td>
      <td>1,787</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td>3</td>
    <td>390</td>
        <td>390</td>

        <td>3</td>
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
