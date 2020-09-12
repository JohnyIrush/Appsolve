<template>
<div class="modal fade" id="updatesolution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms">Update blog</h5>
        <div class="spinner-border ml-1 text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <button @click="launcheditor()"  type="button" class="btn btn-success">Edit Blog</button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  @submit="updatepost()">
            <!--title:action="'http://127.0.0.1:8000/editsolution/' + beid" method="post"-->
          <div class="form-group">
            <label  class="text-white" for="title">Post title</label>
            <input v-model="title" type="text" name="title" class="form-control" >
          </div> 
          <!--post image-->      
          <div class="form-group">
            <label  class="text-white" for="image">Post Image</label>
            <input @change="savePostImage()" id="postimage" type="file"   name="image">
          </div>
          <!--Seo-->
          <div class="form-group">
            <label  class="text-white" for="price">Post Seo</label>
            <textarea class="form-control" v-model="Seo" name="Seo" id="" cols="100" rows="6"></textarea>
          </div>  
          <!--post--> 
          <div class="form-group">
            <label  class="text-white" for="post">post</label>
             <textarea v-model="post" class="form-control" name="post" id="" cols="100" rows="30"></textarea>
          </div>
      <div class="modal-footer">
        <button @click="launcheditor()"  type="button" class="btn btn-success">Create Blog</button>
        <button  type="submit" class="btn btn-primary">Create Post</button>
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
            title: '',
            image: '',
            Seo: '',
            post: '',
            beid: 0
        }
    },
    methods: {
      /**
       * v-model not supported on 
       * file type
       * save image by getting field
       * data
      */
      savePostImage(){
           this.image = document.getElementById("postimage").value.replace("C:\\fakepath\\", "");
      },
       getlogeid(){
        this.beid = Number(window.localStorage.blogeid);
       },
        updatepost(){
          const data ={
              title: this.title,
              image: this.image,
              Seo: this.Seo,
              post: this.post
          }
          const url = '';
          axios.post('http://127.0.0.1:8000/editpost/' + this.beid,data)
          .then(()=>{
            this.$swal({
              position: 'top-end',
              icon: 'success',
              title: ' has been saved',
              showConfirmButton: false,
              timer: 3000})
          })
            .catch(()=>{
             this.$swal({
               icon: 'error',
               title: 'Oops...',
               text: 'Something went wrong!',
               footer: 'Fix these errors',

             })

            })
        }
    },
    mounted() {
        Event.$on('updatesols',(data)=>{
            
            $('#updatesolution').modal('show');
          this.post =  window.localStorage.blog;
          this.getlogeid();
        });
    },
}
</script>

<style>
    
</style>