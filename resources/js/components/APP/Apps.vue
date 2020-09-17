<template>
  <div  class="mt-1 Theme">
    <div class="col-sm-12 p-0">
    <!--header-->
     <div id="appsn" class="Theme col-sm-12  p-0" v-html="header">

     </div> 
     <!--Applications-->  
     <div class="col-sm-12 mt-5">
       <!--Applications heading-->
       <div class="row-justift-content-center">
         <div class="col text-center">
           <h1 class="heading-color heading-style"> <!--<i class="fas fa-money-bill    "></i>--> Applications for Sale</h1>
         </div>
       </div>
       <!--Applications display-->
       <div class="row slide-in-up" contenteditable="false">
         <div class="col-sm-12">
           <div class="card Theme">
             <div class="row  ">
               <div class="col-sm-4" v-for="(app, index) in apps" :key="index">
                <div class="card m-2 Theme" >
                  <div class="card-header">
                    <h5 class="card-title heading-color" > <img :src="'/Images/' + app.logo" alt="" srcset="" class="img-fluid logo-size"> {{app.name}} </h5>
                  </div>
                  <div class="card-body">
                    <div class="card Theme">
                     <img :src="'Images/' + app.image" class="img-fluid img-app-height m-1 img-orientation" alt="">                       
                    </div>
                    <div class="card-tile"><h3 class="text-center heading-color">Software Description</h3></div>
                    <div class="card-text text-white"> {{app.description.slice(0,15)}} 
                      <a v-readmore  class="link-color" data-toggle="collapse" href="#shopingcart" role="button" aria-expanded="false" aria-controls="collapseExample">...Read More</a>
                   <div class="collapse" id="shopingcart">
                       {{app.description.slice(15,app.description.length)}} 
                    </div>                      
                    </div>                 
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-xs-6 col-sm-6">
                         <button @click="TestApp(app.location)" type="button" class="btn btn-primary">View</button>
                      </div> 
                      <div class="col-xs-6 col-sm-6">
                         <button @click="Buyapp(app.id)" type="button" class="btn btn-success"><span> <!--<i class="fas fa-money-bill-wave    "></i>--> Buy</span></button>
                      </div>                                           
                    </div>
                    <div class="row mt-2">
                      <div class="col-xs-6 col-sm-6">
                         <button @click="editProduct(app.id)" type="button" class="btn btn-primary"><span> <!--<i class="fa fa-edit text-white" aria-hidden="true"></i>--> Edit</span></button>
                      </div>
                      <div class="col-xs-6 col-sm-6">
                         <button @click="deleteProduct(app.id)" type="button" class="btn btn-danger"><span> <!--<i class="fa fa-trash text-white" aria-hidden="true"></i>--> Delete</span></button>
                      </div>                        
                    </div>
                  </div>                  
                </div>                 
               </div>
             </div>
           </div>
         </div>
       </div>      
     </div>      
    </div>
    <editproduct :edit='edit'></editproduct>
  </div>
</template>

<script>
import Select from './Purchase/Select.vue';
import editproduct from './CMS/editproduct.vue';
    export default {
      props: ['app'],
      components:{
        editproduct,
        Select
      },
      data() {
        return {
          apps: [],
          edit:
            {
            id: 0,
            name:'',
            image:'',
            logo:'',
            price: 0,
            discount: 0,
            location:'',
            description: ''
            },

            /**
             * Dynamic header
            */
           header: ''
        }
      },
      methods: {
        /**
         * Get dynamic header
         * from dsatabase
         * 
        */
       getheader(){
         axios.get('/page/' + 2)
         .then((response)=>{
           this.header = response.data[0].content.replace('true',false);
         })
       },
        /**
         * Buyer wants to buy 
         * application, launch 
         * login form User must login
         *  or register a new account 
        */
        Buyapp(id){
          /**
           * Store the application
           * id
          */
          this.$Global.selectapp(id);
          /**
           * set force buyer login
           * mode
          */
           window.localStorage.force_buyer_login = 1;
           /**
            * Launch Login form
            * or Sign Up form
           */
            Event.$emit('signin_buyer');
          /**
           * go to application version
           * page to select the product
           *  version
          */
          window.location.assign('http://127.0.0.1:8000/#/Select');
        } ,    
        deleteProduct(id){

          this.$swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
              axios.get('deleteapp/' + id)
             .then(()=>{
                this.$swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                );
             })
              }
            });
        },
        editProduct(id){
        axios.get('/editapp/' + id)
        .then((response)=>{
           this.edit = response.data;
        });
           $('#editproduct').modal('show');
        },
      displayproducts(){
          axios.get('/displayapps')
          .then((response)=>{
             this.apps = response.data;
          });
          },        
        TestApp(url){
          let timerInterval
          this.$swal({
            title: 'Application launch!',
            html: 'Launching application in <b></b> milliseconds.',
            timer: 20000,
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
            onClose: () => {
              clearInterval(timerInterval)
              window.location.assign(url);
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === this.$swal.DismissReason.timer) {
              
            }
          })
          //this.$progress.successprog('apptest');
        }
      },
        mounted() {
           this.displayproducts();
           this.getheader();
        }
    }
</script>

<style scoped>
.img-carousel-height{
    height: 70vh;
}

.img-height{
    height: 100%;
}

#seo-header{
    float: inline-start;
    position: absolute;
    top: 0px;
    height: 100%;
    background-color: rgba(139, 139, 184,0.7);
}

.font-size{
    font-size: 18px;
}

.btn-color{
    background-color: turquoise;
}
.img-orientation{
  image-orientation: 0turn;
}
.img-app-height{
  height: 200px;
}
.heading-style{
  font-size: 36px;
  font-weight: 900;
  text-decoration: underline;
}
.logo-size{
  width: 25px;
  height: 25px;
}
.slide-in-up{
   
    animation: moveup 5s ; 
    animation-delay: 3s;
}

/* Chrome, Safari, Opera */
@keyframes moveup {
    from {margin-bottom: 100px;}
    to {margin-top: 1px;}
}

@-webkit-keyframes moveup {
    from {margin-bottom: 100px;}
    to {margin-top: 1px;}
}
</style>