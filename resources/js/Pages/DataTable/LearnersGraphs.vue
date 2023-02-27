<template>


<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h6 class="nk-block-title">Gross Enrolment in 10 Years (Graphical Wiew)
                                                   <span style="color:gray;font-size:15px;padding-left:20px;font-weight:normal;"> {{ year-m }} -  {{ year }}</span> </h6>

                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">






<line-chart :data="data" xtitle="Years (2010 - 2020)" :colors="colors" ytitle="Number of Learners Enroled" thousands="," :download="true"/>



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






data:[
{name:'Pre-Primary',data:{'2010':2000,'2011':330,'2012':8000,'2013':104,'2014':383,
'2015':5678,'2016':310,'2017':397,'2018':1023,'2019':1002,'2020':303}},

{name:'Primary',data:{'2010':500,'2011':900,'2012':488,'2013':4000,'2014':382,
'2015':800,'2016':3976,'2017':397,'2018':5000,'2019':1809,'2020':9000}},

{name:'Secondary',data:{'2010':899,'2011':310,'2012':6000,'2013':100,'2014':385,
'2015':1200,'2016':900,'2017':3976,'2018':1087,'2019':10021,'2020':100}},

{name:'PTC',data:{'2010':200,'2011':30,'2012':4,'2013':100,'2014':387,
'2015':485,'2016':3400,'2017':397,'2018':1087,'2019':1002,'2020':308}},

{name:'BTVET',data:{'2010':8000,'2011':3000,'2012':488,'2013':100,'2014':381,
'2015':14500,'2016':10040,'2017':397,'2018':180,'2019':1002,'2020':9000}},

{name:'University',data:{'2010':28000,'2011':300,'2012':1700,'2013':100,'2014':487,
'2015':1843,'2016':2000,'2017':6807,'2018':1600,'2019':3000,'2020':230}},

],

colors:[['#FDD835 '],['#2E86C1 '],['#EF5350'],['#76448A '],['#17A589'],['#17202A']],




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
