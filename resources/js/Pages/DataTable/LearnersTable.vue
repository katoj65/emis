<template>


<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h6 class="nk-block-title">Gross Enrolment in 10 Years
                                                   <span style="color:gray;font-size:15px;padding-left:20px;font-weight:normal;"> {{ year-m }} -  {{ year }}</span> </h6>

                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-ulogs">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="tb-col-os"><span class="overline-title">Education Level <span class="d-sm-none">/ IP</span></span></th>

                                                        <th class="tb-col-ip" v-for="n in y"><span class="overline-title">{{ n }}</span></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
<tr v-for="l in level">
 <td class="tb-col-os" >{{ l }}</td>

 <td class="tb-col-os" v-for="u in 11"> 100{{ u  }} </td>

</tr>

                                                </tbody>
                                            </table>
                                        </div><!-- .card-preview -->
                                    </div>

</template>
<script>
export default {
data(){
    return {
y:'',
m:'',
year:'',

level:['Pre-primary',
'Primary','Secondary','PTC',
'BTVET','University'],

}
},

methods: {
yearsArray:function(){
var year=new Date();
year =year.getFullYear()
//this.y=year;
this.m=10;

//this.y=year;
var yearCount = new Array();
var x;
for(x=10;x>=0;x--){
yearCount[x]=year-x;
}

this.y=yearCount.reverse();
this.year=year;

}
},

mounted(){
this.yearsArray()
}



}
</script>
