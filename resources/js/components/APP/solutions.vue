<template>
 <div id="solution" class="Theme m-1">
     <!--header-->
   <div class="col-sm-12 col-md-12 col-xs-12">
    <div class="row justify-content-center">
     <div class="col-sm-12 col-md-12 col-xs-12">
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
      <div id="header-bg-overlay" class="col-sm-12 col-md-12 col-xs-12">
         <div class="row mt-5">
             <div class="slide-in-up col-sm col-md col-xs text-center">
                 <h1 class="heading-color"> <span> <i class="fa fa-cogs" aria-hidden="true"></i>Fix your computer </span> </h1>
             </div>
         </div>
         <div class="row slide-in-up justify-content-center mt-5">
             <div class="col-sm-10 col-xs-12">
                 <p class="text-white text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ducimus, magni eaque nemo voluptas dolorum cumque ipsum aperiam ea optio omnis beatae veritatis sequi excepturi. </p>
             </div>
         </div>
         <div class="row slide-in-up justify-content-center mt-5">
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
   <!--Posts-->
   <div class="col-sm-12 col-md-12 col-xs-12 mt-5">
       <div class="row justify-content-center">
           <div class="col-sm-9 p-0 post-height">
             <div class="card Theme">
               <div class="card-header">
                 <h1 class="heading-color heading-style">Posts</h1>
               </div>
                <div class="card-body">
                <div v-html="solutions">
                    
                </div>
                </div>
                  <div class="card-footer">
                    <div class="row justify-content-center" >
                      <div class="col-sm-3 col-md-3 col-xs-3">
                        <button @click="editpost(solution.id)" type="button" class="btn btn-outline-primary"> <span> <i class="fas fa-edit    "></i> Edit Post</span> </button>
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
           <div class="card m-2 Theme" v-for="(latest, index) in latest" :key="index" >
             <div class="card-title"> <a href="" class="link-color"> {{latest.title}} </a> </div>
             <img :src="'Images/' + latest.image" alt="" class="img-fluid">
             <div class="card-text text-white">  </div>
           </div> 
           <div class="card m-2 Theme" >
             <div class="card-title"> <a href="" class="link-color"> Lorem ipsum dolor sit. </a> </div>
             <img src="Images\space-shuttle.jpg" class="img-fluid" alt="" srcset="">
             <div class="card-text text-white"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore praesentium unde eveniet obcaecati in </div>
           </div>
           <div class="card m-2 Theme" >
             <div class="card-title"> <a href="" class="link-color"> Lorem ipsum dolor sit. </a> </div>
              <img src="Images\betterlife.jpg" class="img-fluid" alt="" srcset="">
             <div class="card-text text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim unde nemo quos nesciunt iure, obcv </div>
           </div>
           <div class="card m-2 Theme" >
             <div class="card-title"> <a href="" class="link-color"> Lorem ipsum dolor sit  </a> </div>
             <img src="Images\comp.jpg" class="img-fluid" alt="" srcset="">
             <div class="card-text text-white"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, hic exercitationem amet non ut cupiditate ve </div>
           </div>
           <div class="card m-2 Theme" >
             <div class="card-title"> <a href="" class="link-color"> Lorem ipsum dolo </a> </div>
              <img src="Images\contact.jpg" class="img-fluid" alt="" srcset="">
             <div class="card-text text-white"> Lorem ipsum dolor sit a. </div>
           </div>
           <div class="card m-2 Theme" >
             <div class="card-title"> <a href="" class="link-color"> Lorem, ipsum dolor  </a> </div>
             <img src="Images\illuminated-city.jpg" class="img-fluid" alt="" srcset="">
             <div class="card-text text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitati  </div>
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
      name: 'solutions',
      components:{

      },
      data() {
        return {
              solutions: {},
              latest: [],
              editblogs: [],
        }
      },
      methods: {
        /**
         * Launch editor and pass
         * Post
        */
        editpost(id){
         this.$Post.setPostEditId(id);
         window.location.assign('/#/editor');
        },
        getlatestposts(){
           axios.get('/latest')
           .then((response)=>{
             this.latest =  response.data;
           })
           .catch((error)=>{
             console.log(error);
           })
        },
        getposts(){        
           axios.get('/posts')
           .then((response)=>{
             this.solutions = response.data.data;
             console.log(this.solutions);
           })
           .catch((error)=>{
             console.log(error);
           })
        },
        UfQueryMessage(){
          setTimeout(()=>{
          this.$swal({
          title: '',
          text: "Did you Find what You Were Looking For",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes I Found it'
        }).then((result) => {
          if (result.value) {
            this.$swal(
              'Thank You For Your Feedback',
              'We will Continue doing The Great Job',
              'success'
            )
          }
          else{
         this.$swal({
           title: 'Perform Advanced Search Here',
           input: 'text',
           inputAttributes: {
             autocapitalize: 'off'
           },
           showCancelButton: true,
           confirmButtonText: 'Look up',
           showLoaderOnConfirm: true,
           preConfirm: (login) => {
             return fetch(`//api.github.com/users/${login}`)
               .then(response => {
                 if (!response.ok) {
                   throw new Error(response.statusText)
                 }
                 return response.json()
               })
               .catch(error => {
                 Swal.showValidationMessage(
                   `Request failed: ${error}`
                 )
               })
           },
           allowOutsideClick: () => !Swal.isLoading()
         }).then((result) => {
           if (result.value) {
             Swal.fire({
               title: `${result.value.login}'s avatar`,
               imageUrl: result.value.avatar_url
             })
           }
         })
          }
        });
          },5000)
          
        }
      },
      mounted() {
        this.getposts();
        this.getlatestposts();
        Event.$on('updatesols',()=>{
          $('#updatesolution').modal('show');
        
        })
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
.slide-in-up{
   
    animation: moveup 5s ; 
    animation-delay: 3s;
}

/* Chrome, Safari, Opera */
@keyframes moveup {
    from {margin-bottom: 100px;}
    to {margin-top: 1px;}
}

@-webkit-keyframes moveup {
    from {margin-bottom: 100px;}
    to {margin-top: 1px;}
}
</style>