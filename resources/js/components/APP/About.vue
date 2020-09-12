<template>
    <div  class="col-sm-12 mt-2 mb-2">
      <div class="row-justify-content-center">
   <div class="col-sm-12">
    <div class="row justify-content-center">
     <div class="col-sm-12">
       <div class="img-carousel-height">
         <img src="Images/imprint.jpg" class="d-block img-height w-100" alt="...">
       </div>        
     </div>          
    </div>
    <div class="row justify-content-center">
      <div id="header-bg-overlay" class="col-sm-12">
         <div class="row mt-5">
             <div class="col text-center">
                 <h1 class="heading-color header-slide-in-up"> <span> About Us</span> </h1>
             </div>
         </div>
         <div class="row justify-content-center mt-5">
             <div class="col-sm-10 header-slide-in-up">
                 <p class="text-white text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ducimus, magni eaque nemo voluptas dolorum cumque ipsum aperiam ea optio omnis beatae veritatis sequi excepturi. </p>
             </div>
         </div>
      </div> 
    </div>       
   </div> 
   <div class="col-sm-12 Theme">
       <!--about-->
       <div class="row slide-in-up">
           <div class="col">
               <h2 class="heading-color text-center">About Us</h2>
           </div>
       </div>
       <div class="row">
         <div class="col-sm-5">
             <div class="card Theme p-2">
                 <img src="Images/betterlife.jpg" class="img-fluid" alt="" srcset="">
             </div>
         </div>                                 
           <div class="col-sm">
               <p class="text-white">
                   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae veniam, reprehenderit, laboriosam modi ex, dolorum laborum in sequi distinctio a at fugit quisquam cumque dolores vero ea quam beatae recusandae! Impedit asperiores deleniti quis incidunt voluptate aliquid ut aperiam quisquam debitis quod ullam voluptates rerum molestiae delectus, libero placeat fugiat consequatur nesciunt quo? Consequatur iste odit asperiores non consequuntur eligendi praesentium, veniam vitae earum ex ipsam? Non inventore voluptatibus quos, unde et debitis consequuntur, quod fugiat magnam voluptas minus hic corporis maxime adipisci laborum quas vel molestiae excepturi aperiam vitae ducimus illo obcaecati. Consequatur dicta eligendi iste laborum? Quis laudantium distinctio labore reprehenderit eum odio quia corporis optio corrupti itaque illo, nihil minima doloremque dolorum dolor dignissimos animi magni officiis iste natus sequi in esse eaque! Officiis provident aut distinctio, eaque rerum soluta vero quam adipisci temporibus voluptatum illum illo error, necessitatibus sed nam fugit praesentium architecto earum facere libero?
               </p>
           </div>   
       </div> 
       <!--Our Mission-->
       <div class="row slide-in-up">
           <div class="col">
               <h2 class="heading-color text-center">Our mission</h2>
           </div>
       </div>
       <div class="row">
         <div class="col-sm-5">
             <div class="card Theme p-2">
                 <img src="Images/vision.jpg" class="img-fluid" alt="" srcset="">
             </div>
         </div>                                 
           <div class="col-sm">
               <p class="text-white">
                   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae veniam, reprehenderit, laboriosam modi ex, dolorum laborum in sequi distinctio a at fugit quisquam cumque dolores vero ea quam beatae recusandae! Impedit asperiores deleniti quis incidunt voluptate aliquid ut aperiam quisquam debitis quod ullam voluptates rerum molestiae delectus, libero placeat fugiat consequatur nesciunt quo? Consequatur iste odit asperiores non consequuntur eligendi praesentium, veniam vitae earum ex ipsam? Non inventore voluptatibus quos, unde et debitis consequuntur, quod fugiat magnam voluptas minus hic corporis maxime adipisci laborum quas vel molestiae excepturi aperiam vitae ducimus illo obcaecati. Consequatur dicta eligendi iste laborum? Quis laudantium distinctio labore reprehenderit eum odio quia corporis optio corrupti itaque illo, nihil minima doloremque dolorum dolor dignissimos animi magni officiis iste natus sequi in esse eaque! Officiis provident aut distinctio, eaque rerum soluta vero quam adipisci temporibus voluptatum illum illo error, necessitatibus sed nam fugit praesentium architecto earum facere libero?
               </p>
           </div>   
       </div>                                
   </div>
      </div>
   </div>
</template>

<script>
//<div id="about" class="Theme m-1" v-html="about"></div>
    export default {
      data() {
        return {
          showshare: false,
          about: ''
        }
      },
      methods: {
         getAbout(){
             axios.get('/page/' + 4)
             .then((response)=>{
                 this.about = response.data[0].content.replace('true','false');
             })
         }
      },
      mounted() {
          this.getAbout();
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