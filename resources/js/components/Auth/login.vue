<template>
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content Theme">
      <div class="modal-header">
        <h5 class="modal-title heading-color" id="exampleModalLabel">login</h5>
        <button @click="ValidateClose()"  type="button" class="close" >
          <span  class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="card Theme">
                <div class="card-header heading-color">
                   Login
                </div>
                 <div class="card-body">
                   <div class="col-sm-10 offset-md-1">
                      <form @submit.prevent="handleSumit">
                          <div class="alert alert-danger" v-if="errors.length">
                              <ul class="mb-0">
                                  <li v-for="(error, index) in errors" :key="index" >{{error}}</li>
                              </ul>
                          </div>
                          <div class="form-group">
                              <label for="email " class="text-white">email</label>
                               <input  v-model="email" type="email" class="form-control" placeholder="email">
                          </div>
                          <div class="form-group">
                              <label for="password " class="text-white">password</label>
                               <input  v-model="password" type="password" class="form-control" placeholder="password">
                          </div>                       
                          <div class="card-footer">
                            <div class="row">
                                <button class="btn mb-2 bt-2 btn-success btn-lg col-sm-12" type="submit">Sign In</button>
                                <p class="col-sm-12 text-center heading-color heading-style ">Or</p>
                                <a href="http://127.0.0.1:8000/login/github" class="btn mb-2 bt-2 btn-secondary btn-lg col-sm-12" type="submit"> <i class="fab fa-github" aria-hidden="true"></i> Sign In With GitHub</a>
                            </div>
                          </div>                     
                      </form>
                   </div>                 
                 </div>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button @click="CreateAccount()" type="button" class="btn btn-primary"> Create Account </button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    name: 'login',
    props: ['app'],
    data() {
        return {
            email: '',
            password: '',
            errors: []
        }
    },
    methods: {
      /**
       * Buyer without Account 
       * Should Create a new Account
      */
     CreateAccount(){
         Event.$emit('signup_buyer');
     },
      /**
       * Check if form 
       * should be closed,
       * if user wants to buy the 
       * application the form
       * should not be closed
      */
      ValidateClose(){
           if(this.app.user==null){
            this.$swal({
              icon: 'error',
              title: 'Oops...',
              text: 'You Must Sign In To Buy The App!',
            })
           }
           else{
             $('#login').modal('hide');
           }


      },
        handleSumit(){
           this.errors = [];
           if(!this.email)
           {
               this.errors.push('Username is required.')
           }        
           if(!this.password)
           {
               this.errors.push('password is required.')
           }
           if(!this.errors.length){
               const data = {
                   email: this.email,
                   password: this.password,
               }
               this.app.req.post('auth/login',data)
               .then(response =>{
                 this.app.user = response.data;
                 $('#login').modal('hide');
               })
               .catch(error =>{
                 this.errors.push(error.response.data.error);
                 this.$router.push("/");
               });
           }                                
        }
    },
    mounted() {
      /**
       * relaunch login form
      */
         Event.$on('signin_buyer',()=>{
            $('#login').modal('show');             
         });
    },
}
</script>

<style scoped>

</style>