<template>
<div id="app-bg" class="container-fluid m-0" >
  <navbar :app="this" ></navbar>
    <div id="load-window" v-if="loading" >
      <logo_load></logo_load>
    </div>
    <div v-else-if="initiated">
      <router-view class="page-pos" :app="this" ></router-view>
      <Editor v-show="2==4"></Editor>
    </div>
  <sidebar></sidebar>
  <register :app="this"></register>
  <login :app="this"></login>
  <subscribe></subscribe>
  <versionservice></versionservice>
  <createproduct></createproduct>
  <pageform :pagedata="pagedata"></pageform>
  <createpost></createpost>
   <editpost></editpost>
   <!--create assign post type and categories-->
   <categorytypeeditor></categorytypeeditor>
  <Footer></Footer>
  <Select v-show="1==3"></Select>
</div>
</template>
<script>
import navbar from './navbar.vue';
import sidebar from './sidebar.vue';
import Footer from './Footer.vue';
import createproduct from './CMS/createproduct.vue';
import versionservice from './CMS/versionservice';
import login from '../Auth/login.vue';
import register from '../Auth/register.vue';
import subscribe from './Subscriber/subscribe.vue';
import Editor from '../Editor/Editor.vue';
import pageform from './CMS/pageform.vue';
import createpost from './CMS/createpost.vue';
import editpost from './CMS/editpost';
import categorytypeeditor from './CMS/categorytypeeditor.vue'; //create and assign post categories
import logo_load from './logo_load.vue';

    export default {
      name: 'app',
      components:{
        Footer,
        sidebar,
        navbar,
        createproduct,
        login,
        register,
        subscribe,
        versionservice,
        Editor,
        pageform,
        createpost,
        editpost,
        categorytypeeditor,
        logo_load
      },
      data() {
        return {
          user: null,
          loading: false,
          initiated: false,
          req: axios.create({
            baseUrl: BASE_URL,
          }),
              pagedata:{
              page_name:'',
              page_section:'',
              page_markup:'',

            }
            ,
             editmode: false
        }
      },
      methods: {
        detectedit(){
        },
        init(){
          this.loading = true;
           this.req.get('auth/init')
           .then(response=>{
             this.user = response.data.user;
             this.loading = false;
             this.initiated = true;
           })
        },
        settings(){
          alert('side');
       }
      },
      mounted() {
         this.init();
            Event.$on('sidebar',()=>{
                $('#sidebar').modal('show');
            });
            Event.$on('createproduct',()=>{
                $('#sidebar').modal('hide');
                $('#createproduct').modal('show');
            });
            Event.$on('login',()=>{
             $('#login').modal('show');
            });
            Event.$on('register',()=>{
             $('#register').modal('show');
            });
            Event.$on('versionservice',()=>{
             $('#versionservice').modal('show');
            });
           this.$Global.Displaysubscribe();
           this.$Global.PopdayManager();
          /**
           * listen to edit page
           * event from sidebar
          */
         Event.$on('pagedit',(page)=>{
           this.$Editor.editpages(page);
           this.$Editor.Page(page);
            });

          Event.$on('createpost',()=>{
            $('#sidebar').modal('hide');
            $('#createpost').modal('show');
          })
            this.detectedit();

           /**
            * launch posts category editor
           */
          Event.$on('create_assign_type_category',()=>{
             $('#category_type').modal('show');
          })

          /**
           * Listen to application
           * buying event
          */
         Event.$on('signin_buyer',()=>{
           if (this.user==null) {
            $('#register').modal('hide');
            $('#login').modal('show');
           }
         });
         /**
          * Allow unregistered buyers
          * to register a new account
         */
         Event.$on('signup_buyer',()=>{
          $('#login').modal('hide');
          $('#register').modal('show');
         });
      },
    }
</script>

<style scoped>
#load-window{
  height: 40vh;
}
#app-bg{
background-color: rgb(22, 22, 44);
}
</style>
