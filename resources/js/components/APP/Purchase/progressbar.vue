<template>
  <div id="progressbar" class="Theme m-3">
      <!--progressbar-->
     <div class="spinner-border text-primary" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-secondary" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-success" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-danger" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-warning" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-info" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-light" role="status">
       <span class="sr-only">Loading...</span>
     </div>
     <div class="spinner-border text-dark" role="status">
       <span class="sr-only">Loading...</span>
     </div>
    <div class="col-sm-12 mt-2">
        <div id="bar" class="row  justify-content-center">
            <!--App test-->
          <div class="col-sm-3"> <p id="bar-apptest-lbl"  class="text-center step-name">Test App</p> </div>
          <div class="col-sm-3 rectangular-progress"></div>
            <!--service-->
          <div class="col-sm-3" ><p id="bar-service-lbl" class="text-center step-name">Select Service</p></div>
          <div class="col-sm-3 rectangular-progress"></div>
            <!--details-->
          <div class="col-sm-3" ><p id="bar-details-lbl" class="text-center step-name">Details</p></div>
          <div class="col-sm-3 rectangular-progress"></div>
            <!--payment-->
          <div class="col-sm-3" ><p id="bar-payment-lbl" class="text-center step-name">Payment</p></div>
          <div class="col-sm-3 rectangular-progress"></div>
            <!--installation-->
          <div class="col-sm-3" ><p class="text-center step-name">Installation</p></div>
        </div>
    </div>    
  </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
     methods: {
  
     }
        ,
     mounted() {


     },
     created() {
         
     },
    }
</script>

<style scoped>
.circular-progress{
    border-radius: 50%;
    border-style: double;
    border-width: 5px;
    border-right-color: darkmagenta;
    border-bottom-color: crimson;
    border-left-color: deepskyblue;
    border-top-color: gold;
    height: 125px;
    width: 125px;
    background-color: white;
}
.rectangular-prograss{
    background-color: cyan;
    margin-top: 60px;
    position: relative;
    height: 5px;
}

#bar{
    display: flex;
}
.progress{
       margin-top: 22px;
    position: relative; 
    background-color: greenyellow;
}
.step-name{
    color: cyan;
    }
.step-lbl{
  margin-top: 45px;
}
</style>