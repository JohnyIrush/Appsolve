<template>
<div id="createpost" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <!--Modal Header-->
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms">Create Product</h5>
        <div class="spinner-border ml-1 text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--body-->
      <div class="modal-body">
        <!--Form-->
        <form @submit="SavePost()">
            <!--title-->
          <div class="form-group">
            <label  class="text-white" for="title">Post title</label>
            <input v-model="title" type="text" name="title" class="form-control" >
          </div> 
          <!--post image-->      
          <div class="form-group">
            <label  class="text-white" for="image">Post Image</label>
            <input @change="savePostImage()" id="postimage" type="file"   name="image">
          </div>
          <!--post--> 
          <div class="form-group">
            <label  class="text-white" for="post">post</label>
             <textarea v-model="post" class="form-control" name="post" id="" cols="100" rows="30"></textarea>
          </div>
          <!--footer-->
      <div class="modal-footer">
        <button @click="Savepost()" type="submit" class="btn btn-primary">Create Post</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ['post'],
    data() {
        return {
            title: '',
            image: '',
            Seo: '',
            post: ''
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
      /**
       * Launch editor
       *  To create
       * Post
      */
        launcheditor(){
            $('#createpost').modal('hide');
           
           window.localStorage.clear();
        },
        Savepost(){
          const data = {
              title: this.title,
              image: this.image,
              post: this.post
          }
           const action = null;
           if(editmode==true){
               action = 'editpost';
           }else{
             action = 'createpost';
           }
          axios.post('/' + action ,data)
              this.$swal({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
              setTimeout(() => {
                $('#edit-view').modal('show');

              }, 1500)
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
        Event.$on('save',(data)=>{
          $('#createsolution').modal('show');
          
        });
        this.post =  this.$Editor.returnblog();
    },
}
</script>

<style>
    
</style>