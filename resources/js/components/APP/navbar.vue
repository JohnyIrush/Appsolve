<template>
  <div>
    <nav id="navbar" class="navbar navbar-expand-md shadow-sm Theme">
        <div class="container">
            
            <a class="navbar-brand link-color logo" to="/">
            <div class="logo-bg">
              <img src="Images/Appsolve.png" class="img-fluid p-1 pb-1 logo" alt="" srcset="">
            </div>
            </a>
             <button @click="settings()"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#sidebar">
               <i class="fa fa-cogs" aria-hidden="true"></i>Site settings
             </button>              
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="link-color"> <i class="fas fa-list    "></i> menu</span>
            </button>
            <div class="collapse slide-menu navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar vue-router links -->
                <ul class="navbar-nav mr-auto">
                <router-link class="nav-link link-color link-font-size" to="/">Home</router-link>       
                <router-link class="nav-link link-color link-font-size" to="/solutions">Solutions</router-link>      
                <router-link class="nav-link link-color link-font-size" to="/apps">Apps</router-link>
                <router-link class="nav-link link-color link-font-size" to="/blog">Blog</router-link>
                <router-link class="nav-link link-color link-font-size" to="/services">Our Services</router-link>
                <router-link class="nav-link link-color link-font-size" to="/about">About Us</router-link>
                </ul>                                        
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li v-if="app.user"  class="nav-item mt-2 link-color">
                            <span>{{ app.user.name }}</span> 
                        </li>
                        <li v-if="!app.user"  class="nav-item link-color">
                            <a  @click="login()"  class="nav-link link-color" > <span class="caret">Login</span>  </a>
                        </li>
                        <li v-if="!app.user" class="nav-item  link-color">
                                <a @click="register()"   class="nav-link" to="register">Register</a>
                            </li>
                        <li v-if="app.user" class="nav-item dropdown Theme">
                            <a id="navbarDropdown" class="nav-link link-color dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <span class="caret">Account</span>
                            </a>

                            <div  class="dropdown-menu Theme dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a @click="logout()" class="dropdown-item link-color" href="">
                                    Logout
                                </a>
                                <a class="dropdown-item link-color" href="">
                                    User Management
                                </a>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    <div v-showprogress id="onload-progress" ></div>
  </div>
</template>
<script>
export default {
     name: 'navbar',
     props: ['app'],
     data() {
         return {
            //user: null,
            //loading: false,
            //initiated: false 
         }
     }, 
      methods: {
          showProgressbar(){
              document.getElementById('onload-progress').classList.add('annimation-progress')
          },
          register(){
           Event.$emit('register');
          },          
          login(){
           Event.$emit('login');
          },
          logout(){
            this.app.req.post("auth/logout")
            .then(()=>{
                this.app.user = null;
                this.$router.push('/login');
            })
          },
      settings(){
        Event.$emit('sidebar');
      }
},
mounted() {
    this.showProgressbar;
},
}
</script>

<style>
   .annimation-progress{
    width: 1000px;
    height: 5px;
    background:greenyellow;
    -webkit-transition: width 10s; /* For Safari 3.1 to 6.0 */
    transition: width 10s;
   } 

.slide-menu{
    position: relative;
    animation: moveup 5s ; 
    /*animation-delay: 1s;*/
}

/* Chrome, Safari, Opera */
@keyframes moveup {
    from {margin-right: -100px;}
    to {margin-right: 5px;}
}

@-webkit-keyframes moveup {
    from {margin-right: -100px;}
    to {margin-right: 5px;}
}

/* The animation code */
@keyframes example {
    from {background-color: greenyellow ;}
    to {background-color: rgb(226, 197, 30);}
}

/* The element to apply the animation to */
.logo-bg {
    width: 70px;
    height: 80px;
    animation-name: example;
    animation-duration: 5s;
    animation-iteration-count: infinite;
} 
</style>