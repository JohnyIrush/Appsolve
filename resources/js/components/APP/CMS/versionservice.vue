<template>
<div class="modal fade" id="versionservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms">Create Product</h5>
        <div class="spinner-border ml-1 text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  @submit.prevent="" >
            <!--version-->
           <div class="form-check" v-for="(version, i) in versions" :key="i">
             <input  class="form-check-input" type="checkbox" value="">
             <label class="form-check-label  heading-color heading-style" > {{version.version}} Version Services</label>
              <!--service-->
               <div class="form-check" v-for="(service, i) in services" :key=" 'B' + i">
                 <input @click="setvservices(version.id,service.id)" class="form-check-input" type="checkbox" value="">
                 <label class="form-check-label text-white" > {{service.service}}</label>
               </div>                
               </div>  
              <!--service-->
               <div class="form-check" v-for="(service, i) in services" :key="'B' + i">
                 <input  class="form-check-input" type="checkbox" value="">
                 <label class="form-check-label text-white" > {{service.service}}</label>
                <!--name-->
                <div class="form-group">
                  <label  class="text-white" for="name">{{service.service}} Price</label>
                  <input type="text"   name="name" class="form-control" >
                </div>                 
               </div>                                                  
      <div class="modal-footer">
        <button  type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
    data() {
      return {
        services: [],
        versions: [],      
      }
    },
    methods: {  
     appversions(){
         axios.get('/versions')
         .then((response)=>{
           this.versions = response.data;
         })
      }, 
    setvservices(vid,sid){
          axios.get('/setservice/' + vid + '/' + sid)
          .then(()=>{
          })
          .catch((error)=>{
            console.log(error);
          })
        }   ,
   
      versionsservices(){
         axios.get('/services')
         .then((response)=>{
           this.services = response.data;
         })
      },}  ,    
    mounted() {
        this.appversions();
        this.versionsservices();
    },
}
</script>

<style scoped>
    .heading-style{
      font-size: 32px;
      text-decoration: underline;
    }
</style>