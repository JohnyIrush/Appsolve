<template>
<div class="modal fade" id="createproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
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
        <form method="get" action="/products">
          <div class="form-group">
            <label  class="text-white" for="name">Product Name</label>
            <input type="text" name="name" class="form-control" >
          </div>       
          <div class="form-group">
            <label  class="text-white" for="image">Product Image</label>
            <input type="file"  name="image">
          </div>
          <div class="form-group">
            <label  class="text-white" for="logo">Product Logo</label>
            <input type="file" name="logo">
          </div> 
          <!--price-->
          <div class="form-group">
            <label  class="text-white" for="price">Product price</label>
            <input type="text"   name="price" class="form-control" >
          </div>
          <!--discount-->
          <div class="form-group">
            <label  class="text-white" for="discount">Product discount</label>
            <input type="text"  name="discount" class="form-control" >
          </div>    
          <div class="form-group">
            <label  class="text-white" for="location">location</label>
            <input name="location"  class="form-control">
          </div>                 
          <div class="form-group">
            <label  class="text-white" for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>                    
      <div class="modal-footer">
        <button @click="createproduct()" type="submit" class="btn btn-primary">Save changes</button>
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
        stock: [],
      }
    },
    methods: {
      createproduct(){
       // $('#')
      }
    },
    mounted() {
    },
}
</script>
<style >
</style>