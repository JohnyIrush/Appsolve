<template>
<div class="modal fade" id="category_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
        <!--header-->
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms">Create and Assign Categories</h5>
        <div class="spinner-border ml-1 text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--body-->
      <div class="modal-body">
          <!--Category Form @submit="updatepost()"-->
        <form @submit="SaveTypeCategory()" >
            <!--Category-->
          <div class="form-group">
            <label  class="text-white" for="title">Category</label>
            <input type="text" v-model="postcategory" name="solutioncategory" class="form-control" >
          </div> 
            <!--Type-->
          <div class="form-group">
            <label  class="text-white" for="title">Type</label>
            <input type="text" v-model="posttype" name="poststype" class="form-control" >
          </div>
          <!--category $ posts-->      
          <div class="form-group">
              <!--Input Label-->
            <p  class=" heading-color">Assign Post Category</p>
            <!--Posts Title-->
            <div class="dropdown" v-for="(post, indexs) in posts" :key="indexs">
              <button class="btn link-color dropdown-toggle" type="button" :id="post.id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{post.title}}</button>
              <!--Async Post Category relationship-->
              <div class="dropdown-menu" :aria-labelledby="post.id">
                <li class="dropdown-item" v-for="(category, indexc) in categories" :key="indexc">
                  <div class="form-check">
                    <input @click="AssignCategory(category.id,solution.id)" class="form-check-input" type="checkbox" >
                    <label class="form-check-label" for="defaultCheck2">{{category.category}}</label>
                  </div>
               </li>
              </div>
              <!--Async Post type relationship-->
              <div class="dropdown-menu">
                <li class="dropdown-item" v-for="(type, indexc) in types" :key="indexc">
                  <div class="form-check">
                    <input @click="AssignType(type.id,solution.id)" class="form-check-input" type="checkbox" >
                    <label class="form-check-label" for="defaultCheck2">{{type.type}}</label>
                  </div>
               </li>
              </div>
            </div>
            <p  class=" heading-color">Assign Post Type</p>
            <!--Posts Title-->
            <div class="dropdown" v-for="(posttype, indext) in poststypes" :key="indext">
              <button class="btn link-color dropdown-toggle" type="button" :id="posttype.id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{posttype.title}}</button>
              <!--Async Post type relationship-->
              <div class="dropdown-menu">
                <li class="dropdown-item" v-for="(type, indexc) in types" :key="indexc">
                  <div class="form-check">
                    <input @click="AssignType(type.id,solution.id)" class="form-check-input" type="checkbox" >
                    <label class="form-check-label" for="defaultCheck2">{{type.type}}</label>
                  </div>
               </li>
              </div>
            </div>
          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button  type="submit" class="btn btn-primary">Create Category</button>
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
            /**
             * Posts Categories
            */
            categories: [
                {
                    id: 1,
                    category: 'Os'
                },
                {
                    id: 2,
                    category: 'Antivirus'
                }
            ],
            /**
             * Posts
            */
            posts: [
                {
                    id: 1,
                    title: 'Windows 10'
                },
                {
                    id: 2,
                    title: 'Avast'
                }
            ],
            /**
             * Posts type
             * either solution or blog
            */
            types: [{
              id: 1,
              type: 'solution',
        
            },
            {
              id:2,
              type: 'blog'
            }
            ],
            /**
             * Category created
            */
            postcategory: '',
            posttype: '',
            poststypes: this.posts

        }
    },
    methods: {
     SaveTypeCategory(){
       const data ={
         type: this.posttype,
       }
        axios.get('/post_type',data)
        .then(()=>{
           this.$swal({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
           })
        })
        .catch(()=>{
         alert('error');
        })
      },
      AssignCategory(category_id,solution_id){
        const data ={
          category: category_id,
          solution: 3
        }
        axios.get('/solutionscategory',data)
        .then(()=>{
          alert('assigned');
        })
        .catch(()=>{
          this.$swal({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          })
        })
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
          axios.post('http://127.0.0.1:8000/editsolution/' + this.beid,data)
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

    },
}
</script>

<style>
    
</style>