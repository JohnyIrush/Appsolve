<template>
<div class="modal Sb-annimate Sb-bg-underlay fade" id="subscribe" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content Theme">
      <div class="modal-header"> 
        <h5 class="modal-title heading-color heading-style" id="exampleModalLabel"><span class="logo">A</span> News Letter Subscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!--@submit="Subscribe"-->
      <div class="modal-body">
          <form action="/subscribers" method="get" >
             <div class="alert alert-danger" role="alert" v-if="errors.length">
               <ul class="list-unstyled text-center">
                 <li v-for="(error, index) in errors" :key="index"> {{error}}  </li>
               </ul>
             </div>            
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right text-white">Username</label>

                <div class="col-md-6">
                    <input name="name" v-model="name" id="name" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right text-white"> E-Mail Address </label>

                <div class="col-md-6">
                    <input name="email" v-model="email" id="email" type="email" class="form-control" >
                </div>
            </div>
            <button   type="submit" class="btn btn-primary" >Subscribe</button>
             </form>
      </div>
      <div class="modal-footer"><!--$Global.subscribed()data-dismiss="modal"-->
               
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
      errors:[]
    }
  },
      methods: {
          Subscribe(){

            /**
             * empty errors array on submit
            */
           this.errors = []
            /**
             * validate name and email entry
            */
           if (!this.name) {
             this.errors.push('name is required');
           }
           if (!this.email) {
             this.errors.push('email is required');
           }  
           /**
            * store subscriber
            * details to send to the server 
           */
          const details = {
            name: this.name,
            email: this.email
          }
           /**
            * send data to server
           */
           axios.get('/subscribers',details)
           .then(()=>{
             this.$Global.subscribed();
             this.Thanks();
           })
           .catch((error)=>{
               this.errors.push(error);
           })
          },
        Thanks(){
         this.$swal({
         title: 'Thank You!',
         text: 'Thank You For Subscribing to our daily NewsLetter!',
         imageUrl: 'http://127.0.0.1:8000/Images/Thanks.png',
         imageWidth: 400,
         imageHeight: 200,
         imageAlt: 'Custom image',
       });
        }
      },
      mounted() {
          console.log(window.location.href);
      },
}
</script>
<style >
 .Sb-bg-underlay{
     background-color: rgba(233, 233, 250,0.5);
 }
</style>

