<template>
    <div class="modal fade " id="sidebar" tabindex="-1" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="ml-0 mt-0 mb-0 sidebar modal-dialog modal-dialog" role="document">
      <div class="col-sm-7">
        <div class="modal-content sidebar Theme">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle"><p class="heading-color link-size">Site Settings</p> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class=" text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <!--Menus-->
             <ul class="list-unstyled"> 
                 <p  class="heading-color link-sb-style link-size" data-toggle="collapse" href="#Cms" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fa fa-cogs" aria-hidden="true"></i>CMS</p>
                   <div class="collapse  multi-collapse" id="Cms">
                     <div class="col-sm"> 
                       <!--Create Dynamic Contents--> 
                       <div class="btn-group">
                         <li class="link-color dropdown-toggle link-l-size m-2" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icon-size text-primary   "></i>Posts</li> 
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                           <button class="dropdown-item link-color" type="button" @click="launchEditor()" >Create Post</button>
                           <button class="dropdown-item link-color" type="button" @click="editpage('appsn')" >edit Apps</button>
                         </div>
                       </div>   
                       <!--Assign and Create Type and Category--> 
                       <div class="btn-group">
                         <li class="link-color dropdown-toggle link-l-size m-2" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icon-size text-primary   "></i>Category and Type</li> 
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                           <button class="dropdown-item link-color" type="button" @click="EditCategory()" >Posts Category</button>
                            <!--<button class="dropdown-item link-color" type="button" @click="EditCategory('blogs')" >Blogs Category</button>-->
                         </div>
                       </div>                                                      
                     </div>
                   </div>
                 <p  class="heading-color link-sb-style link-size" data-toggle="collapse" href="#apps" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> <i class="fas fa-project-diagram    "></i> Apps</p>
                   <div class="collapse  multi-collapse" id="apps">
                     <div class="col-sm">
                       <li @click="createContent()" class="link-color link-l-size m-2" data-toggle="modal" data-target="#createCms">Create Product</li>
                       <li @click="versionservice()" class="link-color link-l-size m-2"> Create Version Service </li>                         
                     </div>
                   </div>       
             </ul>        
            </div>
          </div>  
      </div>
      </div>
    </div>
</template>
<script>
export default {
  watch: {
  },
    methods: {
     EditCategory(){
          Event.$emit('create_assign_type_category'); 
     },
      launchEditor(){
        window.location.assign('/#/editor');
         //Event.$emit('createpost');
      },
    editpage(page){
           Event.$emit('pagedit',page);
           if (page=='privacy') {
             $('#privacy').modal('show');
           }
           if(page=='Terms'){
             $('#Terms').modal('show');
           }
           $('#sidebar').modal('hide');
              this.$swal({
               position: 'top-end',
               icon: 'success',
               title:  page + ' page is in edit mode',
               showConfirmButton: false,
               timer: 2500
             });
             window.localStorage.setItem("emode",true);

    },
        versionservice(){
          Event.$emit('versionservice');
        }
      ,
        createContent(){
            Event.$emit('createproduct');
        }
    },
}
</script>

<style>
    
</style>