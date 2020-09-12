<template>
 <div class="m-1 Theme">
  <div class="col-sm-12 m-2">
      <div class="row justify-content-center">
          <div class="col">
              <progressbar></progressbar>
          </div>
      </div>
     <div class="row justify-content">             
     </div> 
  </div>
 </div>
</template>

<script>
    export default {
        mounted() {
         this.$progress.checkprogress();
         this.$progress.successprog("payment");
         this.$progress.successprog("installation");
        },
    }
</script>
<style scoped>

</style>