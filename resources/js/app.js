//Vuejs imports
require('./bootstrap');
window.Vue = require('vue');

//App imports
import routes from './routes/routes.js';
 
//Mounts app components
import VueRouter from "vue-router";
Vue.use(VueRouter);
const router = new VueRouter({
  // mode: 'history',
  routes,
  });

//import App progress bar
import web from './components/APP/web.vue';
import progress from './components/APP/Purchase/progress/progress.js';
Vue.prototype.$progress = new progress();

//Data controller
import datamanager from './Data/data.js';
Vue.prototype.$datamanager = new datamanager();

//components
Vue.component("progressbar",require("./components/APP/Purchase/progressbar.vue").default);
Vue.component("Footer",require("./components/APP/Footer.vue").default);
Vue.component("Terms",require("./components/APP/Terms.vue").default);
Vue.component("privacypolicy",require("./components/APP/privacypolicy.vue").default);
Vue.component("subscribe",require("./components/APP/Subscriber/subscribe.vue").default);
Vue.component('editor', require('./components/Editor/Editor.vue').default); //Rich text editor for Appsolve

 
Vue.filter('readmore',function(value){
  return value.slice(0,100);
});

//custom directives
Vue.directive('readmore',{
bind(el,binding,vnode){
  el.addEventListener("click",function () {
    el.style.display = "none";
  })
}
});


//Event bus
var Event = new Vue();
window.Event = Event;  

import annimation from './components/APP/Animations/annimation.js';
Vue.prototype.$annimation = new annimation();

//Global class
import Global from './components/APP/Global/Global.js';
Vue.prototype.$Global = new Global();

//sweet Alert
import Swal from "vue-sweetalert2";
Vue.use(Swal);





//Rich Text Editor Imports
import Editor from '../js/components/Editor/Editor'
Vue.prototype.$Editor = new Editor();

//Media Uploader
import Uploader from '../js/components/Editor/MediaUpload/Uploader';
Vue.prototype.$Uploader = new Uploader();

//Post Global Class
import Post from './components/APP/CMS/Post/Posts'
Vue.prototype.$Post = new Post();

/**
 * annimation directive
*/
Vue.directive('showprogress',{
  bind(el,binding,vnode){
    window.addEventListener('',()=>{
      el.classList.add('annimation-progress');
    })
  }
})


//Mount vue js
new Vue({
    router,
     render: h => h(web)
}).$mount('#app');




