<template>
  <div id="footer" class="row Theme justify-content-center mt-1">
      <div class="col-sm-12">
        <div class="row Theme justify-content-center">
         <div class="col-sm-12">
          <nav class="navbar navbar-expand-md shadow-sm">
              <div class="container">
                  <router-link class="navbar-brand link-color logo" to="/">
                   <div class="logo-bg"><img src="Images/Appsolve.png" class="img-fluid logo" alt="" srcset=""></div>
                  </router-link>
                  <a  @click="$Global.Displayprivacy()" class="nav-link link-color">Privacy Policy</a>
                  <a  @click="$Global.DisplayTerms()" class="nav-link link-color">Terms and Conditions</a>
                  <a @click="$Global.Displaysubscribe()" href="#app"  class="nav-link link-color"> <span> <i class="fa fa-home" aria-hidden="true"></i>Go Back To The Top</span> </a>
              </div>
          </nav>              
         </div>   
        </div> 
        <div class="row Theme justify-content-center">
            <div class="col-sm-4">
              <div class="row Theme justify-content-center text-center">
                  <div class="col">
                    <h1 class="heading-color">Follow Us</h1>
                  </div>
              </div>
              <nav class="navbar navbar-expand-md shadow-sm">
                  <div class="container">
                    <a href="#" class="btn"> 
                      <i class="fab fa-linkedin icon-size  link-color m-1"></i>
                    </a>
                    <a href="#" class="btn">
                      <i class="fab fa-pinterest icon-size  link-color m-1"></i>
                    </a>
                    <a href="#" class="btn">
                      <i class="fab fa-google-plus icon-size  link-color m-1"></i>
                    </a>                      
                  </div>
              </nav>                 
            </div>
        </div>
        <div class="row Theme justify-content-center">
            <div class="col-sm-12 text-center">
               <p class="heading-color"><i class="fas fa-copyright link-color"></i>2020 Appsolve.com</p>
            </div>
        </div>
      </div>
      <Terms></Terms>
      <privacypolicy></privacypolicy>
      <subscribe></subscribe>
  </div>
</template>
<script>
    export default {

        mounted() {

        }
    }
</script>
<style>
/* The animation code */
@keyframes example {
    from {background-color: greenyellow ;}
    to {background-color: rgb(226, 197, 30);}
}

/* The element to apply the animation to */
.logo-bg {
    width: 70px;
    height: 80px;
    animation-name: example;
    animation-duration: 5s;
    animation-iteration-count: infinite;
}
</style>
