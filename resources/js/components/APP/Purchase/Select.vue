<template>
 <div class="m-1 Theme">
  <div class="col-sm-12 m-2">
      <div class="row justify-content-center">
          <div class="col-xs col-sm col-md">
             <div class="spinner-border app-select-progress  offset-sm-5" role="status">
             </div>
             <div class="text-center">
                 <h5 class="heading-color">Product selection On Progress</h5>
             </div>
          </div>
      </div>
     <div class="row justify-content">
       <div  class="col-xs col-sm col-md m-2">
             <div class="card Basic-plan-Theme">
               <div class="card-header">
                   <div class="card-title text-center"><h1 class="heading-color plan-title">Basic</h1></div>
                   <img :src="'Images/' + product.image" class="img-fluid img-app-height m-1 img-orientation" alt="" v-for="(product, index) in product" :key="index"> 
               </div>
               <div class="card-body">
                   <div id="Basic-price-Tag" class="card p-1 text-center"><h2 class="text-white" v-for="(product, index) in product" :key="index" >Price <sup><i class="fas fa-dollar-sign    "></i></sup> {{product.price}} </h2></div>
                   <div class="card services-bg">
                       <div class="card-title">
                           <h4 class="text-success ml-5">Services</h4>
                       </div>
                       <ul class="list-unstyled ml-5  text-center text-white">
                           <li class="services" v-for="(basic, index) in Basic" :key="index"> <div class="service mr-1"> <i class="fas text-success fa-check" aria-hidden="true"></i> </div>  {{basic.service}} ${{basic.price}}  </li>
                       </ul>
                   </div>
               </div>
               <div class="card-footer">
                   <div class="row justify-content-center">
                       <div class="col-xs col-sm col-md text-center">
                           <button  @click="Checkout(Basicid)" type="button" class="btn btn-outline-danger"> <i class="fas fa-money-bill-wave-alt    "></i> Checkout</button>
                       </div>
                   </div>
               </div>
             </div>
       </div>
       <div  class="col-xs col-sm col-md m-2 ">
           <div class="card Standard-plan-Theme">
             <div class="card-header">
                 <div class="card-title text-center"><h1 class="heading-color plan-title">Standard</h1></div>
                 <img :src="'Images/' + product.image" class="img-fluid img-app-height m-1 img-orientation" alt="" v-for="(product, index) in product" :key="index">  
             </div>
             <div class="card-body">
                 <div id="Standard-price-Tag" class="card p-1 text-center"><h2 class="text-white" v-for="(product, index) in product" :key="index">Price <sup><i class="fas fa-dollar-sign    "></i></sup> $ {{product.price}} </h2></div>
                   <div class="card services-bg">
                       <div class="card-title">
                           <h4 class="text-success ml-5 ">Services</h4>
                       </div>
                       <ul class="list-unstyled  ml-5 text-center text-white">
                           <li class="services" v-for="(standard, index) in Standard" :key="index"> <div class="service mr-1"> <i class="fas text-success fa-check" aria-hidden="true"></i> </div> {{standard.service}} ${{standard.price}}</li>
                       </ul>
                   </div>                 
             </div>
             <div class="card-footer">
                   <div class="row justify-content-center">
                       <div class="col text-center" >
                           <button  @click="Checkout(Standardid)" type="button" class="btn btn-outline-warning"> <i class="fas fa-money-bill-wave-alt    "></i> Checkout</button>
                       </div>
                   </div>
             </div>
           </div>
       </div> 
       <div  class="col-xs col-sm col-md m-2 ">
           <div class="card Pro-plan-Theme">
             <div class="card-header">
                 <div class="card-title text-center"><h1 class="heading-color plan-title"> <span><i class="fas fa-crown    "></i> Pro</span></h1></div>
                 <img :src="'Images/' + product.image" class="img-fluid img-app-height m-1 img-orientation" alt="" v-for="(product, index) in product" :key="index"> 
             </div>
             <div class="card-body">
                 <div id="Pro-price-Tag" class="card p-1 text-center"><h2 class="text-white" v-for="(product, index) in product" :key="index">Price <sup><i class="fas fa-dollar-sign    "></i></sup>$ {{product.price}} </h2></div>
                   <div class="card services-bg">
                       <div class="card-title">
                           <h4 class="text-success ml-5">Services</h4>
                       </div>
                       <ul class="list-unstyled ml-5 text-center text-white">
                            <li class="services" v-for="(pro, index) in Pro" :key="index"> <div class="service mr-1"> <i class="fas text-success fa-check" aria-hidden="true"></i> </div> {{pro.service}} ${{pro.price}}</li>
                       </ul>
                   </div>                 
             </div>
             <div class="card-footer">
                   <div class="row justify-content-center">
                       <div class="col-xs col-sm col-md text-center">
                           <button @click="Checkout(Proid)" role="button"   type="button" class="btn btn-outline-warning"> <i class="fas fa-money-bill-wave-alt    "></i> Checkout</button>
                       </div>
                   </div>                 
             </div>
           </div>
       </div>              
     </div> 
  </div>
 </div>
</template>

<script>
    export default {
        props: ['app'],
        data() {
            return {
            Basic: [],
            Standard: [],
            Pro: []
            ,
            Basicid: 0,
            Standardid: 0,
            Proid: 0,
            product: []
            }
        },
     methods: {
       /**
        * Go To Checkout
        * Selected Product
       */
        Checkout(id){
           /**
            * Sync Customer with
            *  application one to many
           */

          /**
           * buyer Details
           * - The authenticated
           * user Details
          */
         alert(id);
          axios.get('/customer_application/' + Number(localStorage.selectedapp)  + '/' + id )
          .then(()=>{
           /**
            * Alert buyer is about
            *  to go to checkout
            * after syncing customer 
            * and application successfully
           */
             let timerInterval
             this.$swal({
                             position: 'top-end',
                             icon: 'success',
                             title: 'Your details were saved successfully proceeding to checkout',
                             showConfirmButton: false,
                             timer: 6000,
                             timerProgressBar: true,
                             onBeforeOpen: () => {
                               this.$swal.showLoading()
                               timerInterval = setInterval(() => {
                                 const content = this.$swal.getContent()
                                 if (content) {
                                   const b = content.querySelector('b')
                                   if (b) {
                                     b.textContent = this.$swal.getTimerLeft()
                                   }
                                 }
                               }, 100)
                             },
             });
             setTimeout(()=>{
                               window.location.assign('http://127.0.0.1:8000/#/Payment');
             },6000);                      
          })
          .catch()
 
        },
         versions(){
             var app = this.$Global.showapp();
          axios.get('/buyapp/' + Number(app))
            .then((response)=>{
               this.Basic = response.data['Basic'];
               this.Standard = response.data['Standard'];
               this.Pro = response.data['Pro'];
               this.Basicid = response.data['Basic'][0].id;
               this.Standardid = response.data['Standard'][0].id;
               this.Proid = response.data['Pro'][0].id;
               this.product = response.data['product'];
               console.log(response.data);
            })
         },
       Ufmessage(){
           setTimeout(()=>{
        this.$swal('Please Select Type of product');
           },3000);
       }
     },
     mounted() {  
         this.versions();
           if(this.app.user==null){
               this.$swal({
                 title: 'Please Signin or Sign Up To Buy Application',
                 showClass: {
                   popup: 'animate__animated animate__fadeInDown'
                 },
                 hideClass: {
                   popup: 'animate__animated animate__fadeOutUp'
                 }
               })
               $('#login').modal('show');
               
           };
     },
     created() {
         
     },
     updated() {
         
     }
    }
</script>
<style scoped>
.Basic-plan-Theme{
background-color: rgb(75, 122, 4);
}
.Standard-plan-Theme{
background-color: rgb(41, 41, 180);    
}
.Pro-plan-Theme{
background-color: purple;   
}
.plan-title{
    font-family: Algerian;
    font-weight: 900;
    font-stretch: ultra-expanded;
    font-style: oblique;
}
#Basic-price-Tag{
    background-color: green;
    font-style: italic;
}
#Standard-price-Tag{
    background-color: rgb(68, 68, 160);
    font-style: italic;
}
#Pro-price-Tag{
    background-color: blueviolet;
    font-style: italic;
}
.services-bg{
    background-color: rgba(255, 255, 255, 0.075);
}
.crossed{
    color: red;
    font-size: 18px;
}
.service{
    display: inline;
}
.services{
    display: flex;
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