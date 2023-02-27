
tableApi:function(){
//clear previous active data
this.$store.state.active_data='';
//check for active data before loading new data
if(this.$store.state.active_data!=''){
var api_data=this.$store.state.active_data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=api_data.header;
this.$store.state.enrolment_year=' '+api_data.year;
this.count=api_data.count;
this.founder=api_data.founder;
this.registration=api_data.registration;
this.content=api_data.school;
this.year=api_data.year;
this.year_list=api_data.year_list;
this.total=api_data.total;
this.minY=api_data.minY;
this.maxY=api_data.maxY;
this.chartData=api_data.chartData;
this.active_api='main';
//options
this.option_year=api_data.option_year;
this.option_reg=api_data.option_reg;
this.option_founder=api_data.option_founder;


}else{
var session=this.$session.get('userData');
this.dataLoadingdd=true;
const headers = {
'Authorization':'Bearer '+session
};
this.axios
.get('/api/primary/school/licensed',{headers})
.then(response =>{
this.status=response.status;
if(response.status===200){
this.$store.state.active_data=response.data;
this.dataLoadingdd=false;
this.errorMessaged=false;
this.headers=response.data.header;
this.$store.state.enrolment_year=' '+response.data.year;
this.count=response.data.count;
this.founder=response.data.founder;
this.registration=response.data.registration;
this.content=response.data.school;
this.year=response.data.year;
this.year_list=response.data.year_list;
this.total=response.data.total;
this.minY=response.data.minY;
this.maxY=response.data.maxY;
this.chartData=response.data.chartData;
this.active_api='main';
//options
this.option_year=response.data.option_year;
this.option_reg=response.data.option_reg;
this.option_founder=response.data.option_founder;
}
} )
.catch(error => console.log(error))
}
}
