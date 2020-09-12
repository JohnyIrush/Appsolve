<template>
 <div class="Theme m-1">
     <!--header-->
   <div class="col-sm-12">
    <div class="row justify-content-center">
     <div class="col-sm-12">
       <div class="img-carousel-height">
         <img src="Images/contact-us.jpg" class="d-block img-height w-100" alt="...">
       </div>        
     </div>          
    </div>
    <div class="row justify-content-center">
      <div id="header-bg-overlay" class="col-sm-12">
         <div class="row mt-5">
             <div class="col text-center">
                 <h1 class="heading-color"> <span> <i class="fa fa-phone" aria-hidden="true"></i> Contact Us</span> </h1>
             </div>
         </div>
         <div class="row justify-content-center mt-5">
             <div class="col-sm-10">
                 <p class="text-white text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ducimus, magni eaque nemo voluptas dolorum cumque ipsum aperiam ea optio omnis beatae veritatis sequi excepturi. </p>
             </div>
         </div>
      </div> 
    </div>       
   </div> 
   <!--Contact Us-->
   <div class="col-sm-12 mt-2 mb-2">
      <div class="row-justify-content-center">
           <!--contact us-->
          <div class="row">
            <div class="col-sm-6">

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
          showshare: false
        }
      },
      methods: {

      },
    }
</script>
<style scoped>

#header-bg-overlay{
    float: inline-start;
    position: absolute;
    top: 0px;
    height: 100%;
    background-color: rgba(139, 139, 184,0.7);
}

.img-carousel-height{
    height: 70vh;
}

.img-height{
    height: 100%;
}

.Pro-color{
    color: gold;
}

.price-tbl-textsize{
    font-size: 18px;
}
.map-w{
    margin: 1px;
}
</style>