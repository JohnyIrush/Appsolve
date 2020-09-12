<template>
  <div id="details" class="Theme m-2">
      <div class="row justify-content-center">
          <div class="col-sm">
          <div class="col-xs col-sm col-md">
             <div class="spinner-border app-select-progress  offset-sm-5" role="status">
             </div>
          </div>                 
          </div>
      </div>      
    <div class="col-sm-12">
        <div class="row justify-content-center">
           <div class="col-lg-7 col-sm">
               <div class="card Theme">
                <form @submit.prevent="CustomerDetails()" >
                  <div class="card-header">
                      <div class="card-title text-center"><h3 class="heading-color"><span> <i class="fa fa-user icon-size mr-1" aria-hidden="true"></i>Customer Details </span> </h3></div>
                  </div>
                   <!--Form errors-->
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul  class="mb-0  offset-sm-3">
                            <li v-for="(error, index) in errors" :key="index" >{{error}}</li>
                        </ul>
                    </div>
                  <div class="card-body col-sm">
                      <div class="form-group offset-lg-1 form-box">
                          <label for="name" class="label-control col-lg-4 col-sm text-white form-inline"><p class="ml-4"><span></span>Name</p></label>
                          <input type="text" name="name" v-model="name" class="form-control col-lg-7 col-sm form-inline">
                      </div>
                      <div class="form-group offset-lg-1 form-box">
                          <label for="" class="label-control col-lg-4 col-sm text-white form-inline"><p class="ml-4"> <i class="fa fa-envelope" aria-hidden="true"></i> email</p></label>
                          <input type="text" name="email" v-model="email" class="form-control col-lg-7 col-sm form-inline">
                      </div>
                      <div class="form-group offset-lg-1 form-box">
                          <label for="" class="label-control col-lg-4 col-sm text-white form-inline"><p class="ml-4"> <i class="fa fa-phone" aria-hidden="true"></i> phone</p></label>
                          <input type="text" name="phone" v-model="phone" class="form-control col-lg-7 col-sm form-inline">
                      </div>
                      <div class="form-group offset-lg-1 form-box">
                          <label for="" class="label-control col-lg-4 col-sm text-white form-inline"><p class="ml-4"> <i class="fa fa-flag" aria-hidden="true"></i> country</p></label>
                          <input type="text" name="country" v-model="country" class="form-control col-lg-7 col-sm form-inline">
                      </div>
                      <div class="form-group offset-lg-1 form-box">
                          <label for="" class="label-control col-lg-4 col-sm text-white form-inline"><p class="ml-4"> <i class="fa fa-id-badge" aria-hidden="true"></i> ID</p></label>
                          <input type="text" name="id" v-model="id" class="form-control col-lg-7 col-sm form-inline">
                      </div>                                           
                  </div>
                  <div class="card-footer">
                    <button  type="submit" class="btn mb-2 btn-align-right btn-outline-primary link-color">Submit</button>
                  </div>                       
                </form>
               </div>
           </div>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
            name: '',
            email: '',
            phone: '',
            country: '',
            id: '',
            errors: []
            }
        },
        methods: {
    CustomerDetails(){
           this.errors = [];
           if(!this.name)
           {
               this.errors.push('Name is required.')
           }
           if(!this.email)
           {
               this.errors.push('Username is required.')
           }        
           if(!this.country)
           {
               this.errors.push('country is required.')
           }
           if(!this.phone)
           {
               this.errors.push('phone number is required.')
           }  
           if(!this.id)
           {
               this.errors.push('Identification number is required')
           }  
           if(!this.errors.length){
               const details = {
                   name: this.name,
                   email: this.email,
                   phone: this.phone,
                   country: this.country,
                   id: this.id,
               }
               axios.post('customer',details)
               .then(response =>{
             
               })
               .catch((error) =>{
                 this.$swal({
                  icon: 'error',
                  title: 'Oops..,.',
                  text: 'Registration failed',
                  text: 'Correct the errors above and resubmit your details',
                })                   
                 this.errors.push(error.response.data.error);
                 this.$router.push("/Details");
               });
           }                                
        },
       Ufmessage(){
           setTimeout(()=>{
        this.$swal('Please Enter your Details');
           },3000);
       }            
        },
     mounted() {  
         this.Ufmessage();
     
    }
    }
</script>

<style scoped>
.form-box{
    display: flex;
}
.form-inline{
    display: inline;
    margin-right: 5px;
}
.btn-align-right{
    float:right;
    position: static;
}
.heading-style{
  font-size: 36px;
  font-weight: 900;
  text-decoration: underline;
}
.app-select-progress{
   width: 10rem; 
   height: 10rem;
   color: lawngreen;
}
</style>