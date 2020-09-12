<template>
 <div id="blog" class="Theme m-1">
     <!--header-->
   <div class="col-sm-12">
    <div class="row justify-content-center">
     <div class="col-sm-12">
       <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item img-carousel-height active" data-interval="10000">
             <img src="Images/guidesolutions.jpg" class="d-block img-height w-100" alt="...">
           </div>
           <div class="carousel-item img-carousel-height" data-interval="2000">
             <img src="Images/illuminated-city.jpg" class="d-block img-height w-100" alt="...">
           </div>
           <div class="carousel-item img-carousel-height">
             <img src="Images/cyber-security.jpg" class="d-block img-height w-100" alt="...">
           </div>
         </div>
       </div>         
     </div>          
    </div>
    <div class="row justify-content-center">
      <div id="header-bg-overlay" class="col-sm-12">
         <div class="row mt-5">
             <div class="col text-center">
                 <h1 class="heading-color"> <span> <i class="fa fa-cogs" aria-hidden="true"></i>Get Technology Infomation </span> </h1>
             </div>
         </div>
         <div class="row justify-content-center mt-5">
             <div class="col-sm-10">
                 <p class="text-white text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ducimus, magni eaque nemo voluptas dolorum cumque ipsum aperiam ea optio omnis beatae veritatis sequi excepturi. </p>
             </div>
         </div>
         <div class="row justify-content-center mt-5">
             <div class="col-sm-7 text-center">
               <form action="">
                   <div id="search-bar" class="form-group">
                      <input id="form-input" type="text" class="form-control  search-engines" placeholder="search solutions">
                      <input id="form-btn" class="btn search-btn heading-color Theme search-engines" type="submit" value="Search">
                   </div>                   
               </form>
             </div>
         </div>
      </div> 
    </div>       
   </div> 
   <div class="col-sm-12 col-md-12 col-xs-12 mt-5">
       <div class="row justify-content-center">
           <div class="col-sm-9 p-0 post-height">
             <div class="card Theme">
                      <div v-for="(blog, index) in blogs" :key="index" v-html="blog.post" ></div><!--v-html="solution.post"-->
                  <div class="card-footer">
                    <div class="row justify-content-center"  v-for="(blog, index) in blogs" :key="index">
                      <div class="col-sm-3 col-md-3 col-xs-3">
                        <button @click="editblog(blog.id)" type="button" class="btn btn-outline-primary"> <span> <i class="fas fa-edit    "></i> Edit Post</span> </button>
                      </div>
                      <div class="col-sm-3 col-md-3 col-xs-3">
                        <button type="button" class="btn btn-outline-danger"> <span> <i class="fa fa-trash" aria-hidden="true"></i> Delete Post</span> </button>
                      </div>
                      <div class="col-sm-3 col-md-3 col-xs-3">
                        <div class="btn link-color"><span><i class="fa fa-thumbs-up icon-size" aria-hidden="true"></i> Likes</span> </div>
                      </div>
                      <div class="col-sm-3 col-md-3 col-xs-3">
                        <button class="btn link-color"> <span> <i class="fa fa-comments icon-size" aria-hidden="true"></i>comment</span> </button>
                      </div>
                    </div>
                    <div class="row mt-4 Theme">
                      <div class="col-sm-12 col-md-12 col-xs-12 row justify-content-center">
                        <nav aria-label="Page navigation example">
                         
                        </nav>                        
                      </div>
                    </div>
                  </div>                                                                 
             </div>
           </div>
        <div class="col-sm-3 p-0 post-height">
          <div class="card Theme text-white">
           <h1>Latest posts</h1>  
           <div class="card m-2 Theme" v-for="(latest, index) in latest" :key="index">
             <div class="card-title"> <a href="" class="link-color"> {{latest.id}} {{latest.title}} </a> </div>
             <img :src="'Images/' + latest.image" alt="" class="img-fluid">
             <div class="card-text text-white"> {{latest.Seo}} </div>
           </div>                      
          </div>
        </div>
       </div>
   </div>
   <!--Top Charts--> 
   <div class="col-sm-12 mt-4">
     <div class="row justify-content-center">
       <div class="col">
         <h1 class="heading-color text-center"> Top Charts </h1>
       </div>
     </div>
     <div class="row justify-content-center">
       <div class="col">
        <div class="card Theme">
          <img src="Images\illuminated-city.jpg" class="img-fluid" alt="" srcset="">
        </div>
       </div>
       <div class="col">
        <div class="card Theme">
          <img src="Images\contact.jpg" class="img-fluid" alt="" srcset="">
        </div>         
       </div> 
       <div class="col">
        <div class="card Theme">
          <img src="Images\comp.jpg" class="img-fluid" alt="" srcset="">
        </div>         
       </div>              
     </div>
     <div class="row justify-content-center">
       <div class="col">
        <div class="card Theme">
          <img src="Images\betterlife.jpg" class="img-fluid" alt="" srcset="">
        </div>
       </div>
       <div class="col">
        <div class="card Theme">
          <img src="Images\space-shuttle.jpg" class="img-fluid" alt="" srcset="">
        </div>         
       </div> 
       <div class="col">
        <div class="card Theme">
          <img src="Images\keyboard.jpg" class="img-fluid" alt="" srcset="">
        </div>         
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
           * paginated blogs
          */
          blogs: {},
          /**
           * last ten
           *  blog post
          */
          latest: [],
          /**
           * editing blog
          */
          editblogs: []
        }
      },
      methods: {
        /**
         * Launch editor and pass
         * Post
        */
        editblog(id){
         window.localStorage.setItem('blogeid',id); //maintain blog post id
         /**
          * fetch the blog post
          * with the passed id 
         */
           axios.get('/displaypost/' + id)
           .then((response)=>{
             this.editblogs = response.data;
             this.$Editor.editblogdata(this.editblogs.post);
           })
           .catch((error)=>{
             console.log(error);
           })
           /**
            * Go to editor
            * to munt the blog
            *  post
           */
           window.location.assign('http://127.0.0.1:8000/#/editor');
        },
        /**
         * fetch latest
         * blog posts
        */
        getlatestposts(){
           axios.get('/latest')
           .then((response)=>{
             this.latest =  response.data;
           })
           .catch((error)=>{
             console.log(error);
           })
        },
        /**
         * Get blog posts
        */
        getposts(){        
           axios.get('/posts')
           .then((response)=>{
             this.blogs = response.data.data;
           })
           .catch((error)=>{
             console.log(error);
           })
        },
      },
      mounted() {
        this.getposts(); //call posts
        this.getlatestposts(); //call latest posts
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

.post-height{
    min-height: 50vh;
}

.search-engines{
display: inline;
}

#search-bar{
display: flex;
}

#form-input{
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}

#form-btn{
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}

</style>