<template>

<div style="border:none;">
<nav style="padding:0;margin:-10px;border:none;">
    <ul class="breadcrumb breadcrumb-pipe" style="border:none;padding:0;margin:0;">
        <li class="breadcrumb-item"><a href="#" @click="enrollmentMethod('table')">Table View</a></li>
          <li class="breadcrumb-item"><a href="#" @click="enrollmentMethod('graph')">Grapgical View</a></li>

    </ul>
</nav>
<div style="padding-top:30px;">
<div v-if="enrollMenu==='table'">

<learners-table/>
</div>
<div v-else-if="enrollMenu==='graph'">


<learners-graphs/>

</div>


</div>

</div>

</template>


<script>
import LearnersGraphs from '../DataTable/LearnersGraphs.vue';
import LearnersTable from '../DataTable/LearnersTable.vue';
export default {
  components: { LearnersTable, LearnersGraphs },

data() {

return {
enrollMenu:'table',
}
},

methods: {
    enrollmentMethod: function(item){
this.enrollMenu=item;
    }
},





}
</script>




