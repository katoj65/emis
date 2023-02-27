<template>
<div class="page_menu" style="background:rgb(244, 246, 246);margin-bottom:5px;">
<ul>

<li v-if="$store.state.hideFirstMenuItem==='show'">
<router-link :to="$route.path">
<div style="border-bottom:solid 3px rgb(79, 195, 247);">
{{ $route.name }}</div>
</router-link>




</li>



<li v-for="x in $store.state.mainMenuTab">
<router-link :to="$store.state.classData.path+x.toLowerCase().replace(' ','-')" v-if="$route.name===x">
<div style="border-bottom:solid 3px rgb(79, 195, 247);">
{{ x }}
</div>
</router-link>

<router-link :to="$store.state.classData.path+x.toLowerCase().replace(' ','-')" v-else>
<div>
{{ x }}</div>
</router-link>
<span style="position:absolute;margin-left:-30px;padding:5px;cursor:pointer;margin-top:-2px;" v-if="$route.name!=x">
 <b-icon-x scale="1.5" style="color:#D6DBDF;"></b-icon-x>
</span>


</li>



</ul>
</div>

</template>
<script>
export default {
data(){
return({


});
},



//functions
methods:{
goTo:function(item=''){
this.$store.state.hideFirstMenuItem='hide';
item=item.toLowerCase().replace(' ','-');
var class_path=this.$store.state.classData.path;
item='/'+item;
this.$router.push(this.$store.state.classData.path+item);
}





}


}
</script>

<style>


.page_menu{
padding:5px;
padding-left:10px;padding-right:10px;
margin-top:-2px;
border-bottom:solid thin rgba(0, 0, 0, 0.125);
border-top:none;
}
.page_menu ul li div{
float:left;
margin-right:5px;

padding:2px;
padding-left:10px;padding-right:10px;

width:150px;
text-align: center;
background:white;
font-weight: bold;
color:#85929E;
border:solid thin #D7DBDD;
overflow: hidden;
height:30px;
}

.page_menu ul li a{
color:#85929E;
}





</style>

