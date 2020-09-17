<template>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content Theme">
      <div class="modal-header">
        <h5 class="modal-title heading-color" id="exampleModalLabel">Create Account</h5>
        <button @click="LaunchLogin()" type="button" class="close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="card Theme">
                <div class="card-header heading-color">
                   Register 
                </div>
                 <div class="card-body">
                   <div class="col-md-12">
                      <form @submit.prevent="handleSumit">
                          <div class="alert alert-danger" v-if="errors.length">
                              <ul class="mb-0">
                                  <li v-for="(error, index) in errors" :key="index" >{{error}}</li>
                              </ul>
                          </div>
                          <div class="form-group">
                              <label for="name" class="text-white">Name</label>
                              <input  v-model="name" type="text" class="form-control" placeholder="Name">
                          </div>
                          <div class="form-group">
                              <label for="email" class="text-white">email address</label>
                               <input  v-model="email" type="text" class="form-control" placeholder="email address">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-white">password</label>
                               <input  v-model="password" type="password" class="form-control" placeholder="password">
                          </div> 
                          <div class="form-group">
                              <label for="password again" class="text-white">password again</label>
                               <input  v-model="password_again" type="password" class="form-control" placeholder="password again">
                          </div>                       
                          <div class="card-footer">
                              <button class="btn btn-success" type="submit">Register</button>
                          </div>                     
                      </form>
                   </div>                 
                 </div>
            </div>

        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    name: 'register',
    props: ['app'],
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_again: '',
            errors: []
        }
    },
    methods: {
      /**
       * Fail Registration 
       * Launch login form
      */
      LaunchLogin(){
         if(this.app.user == null){
           Event.$emit('signin_buyer');
         }
         else{
           $('#register').modal('hide');
         }
      },
        handleSumit(){
           this.errors = [];
           if(!this.name)
           {
               this.errors.push('Name is required.')
           }
           if(!this.email)
           {
               this.errors.push('Username is required.')
           }        
           if(!this.password)
           {
               this.errors.push('password is required.')
           }
           if(!this.password_again)
           {
               this.errors.push('password confirmation is required.')
           }  
           if(this.password != this.password_again)
           {
               this.errors.push('password do not match')
           }  
           if(!this.errors.length){
               const data = {
                   name: this.name,
                   email: this.email,
                   password: this.password,
               }
               this.app.req.post('auth/register',data)
               .then(response =>{
                 this.app.user = response.data;
                 $('#register').modal('hide');
               })
               .catch(error =>{
                 this.errors.push(error.response.data.error);
                 this.$router.push("/");
               });
           }                                
        }
    },
}
</script>

<style scoped>

</style>