<template>
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <!--modal Header-->
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms">Edit Product</h5>
        <div class="spinner-border ml-1 text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--modal Body-->
      <div class="modal-body">
        <!--modal Edit Form-->
        <form  @submit.prevent="editproduct" >
          <!--form errors-->
         <div class="alert alert-danger" v-if="errors.length">
              <ul class="mb-0">
                  <li v-for="(error, index) in errors" :key="index" >{{error}}</li>
              </ul>
          </div>
          <!--name-->
          <div class="form-group">
            <label  class="text-white" for="name">Product Name</label>
            <input type="text" v-model="edit.name"  name="name" class="form-control" >
          </div>
         <!--versions
          <div class="form-group form-check"  >
            <input @click="setversions()" type="checkbox" v-model="s_versions.version" name="version"  class="form-check-input" value="1" >
            <label class="form-check-label text-white">v1</label>
          </div>                     
          -->  
          <div class="form-check mt-2 mb-2" v-for="(version, index) in versions" :key="index">
            <input @click="setversions(version.id)" class="form-check-input" type="checkbox" value="">
            <label class="form-check-label text-white mr-1" > {{version.version}}</label>
          </div>          
          <!--image-->
          <div class="form-group">
            <label  class="text-white" for="image">Product Image</label>
            <input type="file"  name="image">
          </div>
          <!--logo-->
          <div class="form-group">
            <label  class="text-white" for="logo">Product Logo</label>
            <input type="file" name="logo">
          </div>   
          <!--location-->
          <div class="form-group">
            <label  class="text-white" for="location">location</label>
            <input type="text" v-model="edit.location" name="location"  class="form-control">
          </div>  
          <!--price-->
          <div class="form-group">
            <label  class="text-white" for="price">Product price</label>
            <input type="text" v-model="edit.price"  name="price" class="form-control" >
          </div>
          <!--discount-->
          <div class="form-group">
            <label  class="text-white" for="discount">Product discount</label>
            <input type="text" v-model="edit.discount"  name="discount" class="form-control" >
          </div>       
          <!--description-->               
          <div class="form-group">
            <label  class="text-white" for="description">Description</label>
            <textarea  v-model="edit.description" name="description" id="" cols="30" rows="10" class="form-control"></textarea>
           </div>  
           <!--Footer-->                  
          <div class="modal-footer">
            <button @click="editproduct()" type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal fade" id="versionImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div id="create-height" class="modal-content  Theme ">
          <!--Modal header-->
         <div class="modal-header heading-color">Enter Version Image</div>
         <!--Modal Body-->
           <div class="modal-body">
            <div class="form-group mt-2 mb-2">
              <label for="VersionImage" class="text-white">Version Image</label>
              <input id="VersionImage" type="file" name="VersionImage" class="text-white">
            </div>         
           </div>
         <!--Modal Footer-->
         <div class="modal-footer">
           <input @click="getImage()" type="submit" class="btn btn-success" data-dismiss="modal" value="Save Image">
         </div>
       </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>

export default {
    props: ['edit'],
    components:{
    },
    data() {
      return {
          errors: [],
        versions: [],
        software: [],
        version_image: '',
        version_image: ''
                   
      }
    },
    methods: {   
      /**
       * get selected version Image
      */
     getImage(){
         this.$Global.versionImage(document.getElementById('VersionImage').value.replace("C:\\fakepath\\", ""));
        /**
         * capture version
         * image
        */
    
          axios.get('/setversion/' + this.edit.id + '/' + Number(localStorage.version_id)  + '/' + localStorage.version_image)
          .then(()=>{
            alert('success');
          })
          .catch((error)=>{
            console.log(error);
          })
     },
      /**
       *Attach version to product
       * 
       */   
      setversions(id){
        /**
         * Launch version image
         * form
        */
         $('#versionImage').modal('show');
         /**
          * store version_id
         */
        this.$Global.versionid(id);
      },    
      appversions(){
         axios.get('/versions')
         .then((response)=>{
           this.versions = response.data;
         })
      },       
       editproduct(){
           this.errors = [];
           /**
            * Check form errors on submit
           */
           //product name errors
           if(!this.edit.name)
           {
               this.errors.push('Product Name is required.')
           }
           //product image errors
           if(!this.edit.image)
           {
               this.errors.push('Product Image is required.');
           }  
           //product logo errors      
           //if(!this.edit.logo)
           //{
           //    this.errors.push('Product logo is required.');
           //}
           //product location errors
           if(!this.edit.location)
           {
               this.errors.push('Product location is required.')
           }  
           //product description errors
           if(!this.edit.description)
           {
               this.errors.push('Product description is required.')
           } 
           //product description errors
           if(!this.edit.price)
           {
               this.errors.push('Product price is required.')
           } 
           //product description errors
           if(!this.edit.discount)
           {
               this.errors.push('Product discount is required.')
           }               
           /**
            * If no error update 
            * the product with 
            * the changes 
           */
           if(!this.errors.length){

               const data = {
                   name: this.edit.name,
                   image: this.edit.image,
                   logo: this.edit.logo,
                   price: this.edit.price,
                   discount: this.edit.discount,                                      
                   location: this.edit.location,
                   description: this.edit.description
                   
               }

               axios.post('/editapps/' + this.edit.id,data)
               .then(response =>{
                    /**
                     * Hide the product form
                     * sweet alert message if
                     *  product is updated
                     *  succesfully
                    */
                    $('#editproduct').modal('hide');

                    this.$swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Product edited successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })
               })
               
               .catch((error) =>{
                 this.errors.push(error.response.data);
                 $('#editproduct').modal('show');
               });

           }                                
        }         
 
       }
    ,
    mounted() {
        this.appversions();
    },
}
</script>