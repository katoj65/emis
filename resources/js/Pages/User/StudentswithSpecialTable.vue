
<template>
  <div>
    
<div class="card  card-stretch">
                                        <div class="card-inner-group">
                                            <div style="padding: 8px;"></div>  
                                            <div>
                                                
                                             <FilterTable/>
                                               
                                            </div><!-- .card-inner -->
                                            <div style="padding: 10px;"> 
                                                <h6 class="title nk-block-title" style="padding-top:6px;"> Table of  Students with Special Learning Needs by Grade, Sex and Impairment Type

</h6>
                                           
                                            </div>
                                           <table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Grade  </th>
      <th scope="col" colspan="2">Autism
</th>
      <th scope="col" colspan="2">Hearing
Impaired
</th>
      <th scope="col" colspan="2">Mentally
Impaired
</th>
      <th scope="col" colspan="2">Multiple
Handicaps
(e.g.deaf
and blind)
</th>  

 <th scope="col" colspan="2">Physically
impaired e.g.
motor
accident
</th>  
     
     <th scope="col" colspan="2">Visually
Impaired
</th> 
 <th scope="col" colspan="2">Total
</th>  
    </tr>
  </thead>
  <tbody>
      

<tr >
     
       <td>
</td>
      <td>M</td>
      <td>F</td>
      <td>M</td>
     <td>F</td>
     <td>M</td>
    <td> F</td>
    <td>M</td>
    <td> F</td>
    <td>M</td>
    <td> F</td>
    <td>M</td>
    <td> F</td>
     <td>M</td>
    <td> F</td>
    </tr>
   
      
    <tr v-for="n in 200">
     
       <td>S1</td>
      <td>1,787</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td>3</td>
    <td>390</td>
        <td>390</td>

        <td>3</td>
    <td>390</td>
        <td>390</td>
        <td>390</td>
        <td>390</td>
    <td>390</td>
        <td>390</td>
    </tr>
   
   <tr>
     
       <td>National</td>
      <td>1,787</td>
      <td>390</td>
      <td>2,177</td>
     <td>2,177</td>
     <td>3</td>
    <td>390</td>
        <td>390</td>

        <td>3</td>
    <td>390</td>
        <td>390</td>
        <td>390</td>
        <td>390</td>
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
