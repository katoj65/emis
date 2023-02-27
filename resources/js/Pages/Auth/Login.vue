<template>

 <div style="margin:0; font-family: sans-serif; height: 100% !important;padding:0px;width: 100%;position: fixed; top:0;left:0;right: 0;">
    <div style="background: #29347a; !important; height: 100% !important; width: 100%;">
        <div style="height:60px;"></div>
        <center>
           <form  @submit.prevent="login" method="post">
                <div style="text-align:center;">
                    <strong style="color:white;font-weight:bold;font-size:50px;"
                        >CEMIS</strong
                    >
                </div>
                <div style="height:30px;"></div>
                <div id="login"
                    style=" min-height: 400px;background-color: #fff; border-radius: 5px; "
                >
                    <div style="height: 342px; padding: 20px;">
                        <span
                            style="font-size: 28px; font-weight: bold; border-bottom: solid 2px #ddd; padding-bottom: 20px;"
                        >
                            Login
                        </span>
                        <div style="height: 60px;color:red">

      <div style="color:red" v-if="errormessage!==''">
          <br/>
            {{errormessage}}
      </div>

        </div>                <input
                            type="text"
                            name="email"
                            v-model="loginuser.email"
                            style="width: 100%; padding:12px;border-radius: 4px; border: solid 1px #ddd;"
                            value="school@emis.com"
                        />
                        <div style="height: 40px;"></div>
                        <input
                            type="password"
                            name="password"
                            style="width: 100%; padding:12px;border-radius: 4px;border: solid 1px #ddd;"
                            v-model="loginuser.password"
                            value="secret"
                        />
                        <div
                            style="height: 50px;text-align: left;padding-top: 14px;"
                        >
                            <input
                                id="remember"

                                class="mr-1"
                                type="checkbox"
                            />
                            <span class="text-sm">Remember Me</span>
                        </div>
                    </div>
                    <div
                        style="background-color:#ddd;padding: 20px; height:60px;text-align: left;padding-top:6px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; "
                    >
                        <div style="height:6px;"></div>
                        Forget password
                        <span v-if="sending">
                        <button style="float: right; padding: 6px; background: #29347a;  color: #fff; border:none ; font-size: 16px; border-radius: 4px; cursor: pointer;">
     <b-spinner  label="Text Centered" style="height: 20px;width: 20px;color:#fff"></b-spinner> Login...

                        </button>


                        </span>
                        <span v-else>
                        <input

                            type="submit"
                            value="login"
                            style="float: right; padding: 6px; background: #29347a;  color: #fff; border:none ; font-size: 16px; border-radius: 4px; cursor: pointer;width:60px"
                        />

                        </span>

                    </div>
                </div>
            </form>
        </center>
    </div>
</div>

</template>

<script>

export default {

data() {
        return {
            sending: false,
            errormessage:null,
            loginuser:{
            email:'school@emis.com',
            password:'secret',
           }
        };
    },

mounted() {


if(this.$session.exists('userData')){
 window.location="/home";
}else{


}

},




methods:{
  login: function() {
           this.sending = true
this.axios.post(`/api/user/login`,this.loginuser).then(response =>{
if(response.status===200){
if(this.loginuser.email===''|| this.loginuser.password===''){
this.errormessage=response.data.message;
this.sending = false;
}else if(response.data.error){
    this.errormessage=response.data.message;
    this.sending = false;
}
else{

this.$session.set('userData',response.data.token);
sessionStorage.setItem("user",response.data.token);
this.$session.set('userInfo',response.data);



//sessionStorage.setItem("userItem",response.data.user);
//this.$router.push({path: '/dashboard'})

window.location="/home";
}

}
else if(response.status===400){
this.errormessage=response.data.message;
this.sending = false;
}
else if(response.status===500){
this.errormessage=response.data.message;
this.sending = false;
}
}
).catch(error =>{
    this.errormessage='Checkout connection'
    this.sending = false;

});
}
}
}


</script>

<style>
@media screen {

}

@media only screen and (max-width:400px){
     #login{
         width: 100%;
     }
}

@media only screen and (min-width:400px){
     #login{
         width: 400px;
     }
}

</style>
