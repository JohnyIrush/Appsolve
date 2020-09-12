<template>
  <div class="row Themes2 justify-content-center">
   <div class="col-sm-12 0-padding">
     <div class="card "> 
         <!--editor Title-->
         <div class="card-header">
             <h2 class="text-primary text-center">Editing</h2>
         </div>
         <!--editor Body-->
         <div class="card-body text-window-color">
             <div  class="row">
                 <!--edit toolbars-->
                 <div class="col-sm-12">
                     <!--edit toolbar 1-->
                   <div class="row edit-bar">
                       <!--headings-->
                      <div class="col">
                        <a data-toggle="collapse" href="#headings" role="button" aria-expanded="false" aria-controls="collapseExample" > <i class="fas fa-heading    "></i></a>
                        <div class="collapse col-sm" id="headings">
                            <a class="h-link" href="javascript:void(0)" @click="$Editor.createHeading('H1')">Hd1</a>
                            <a class="h-link" href="javascript:void(0)" @click="$Editor.createHeading('H2')">Hd2</a>
                            <a class="h-link" href="javascript:void(0)" @click="$Editor.createHeading('H3')">Hd3</a>
                            <a class="h-link" href="javascript:void(0)" @click="$Editor.createHeading('H4')">Hd4</a>
                            <a class="h-link" href="javascript:void(0)" @click="$Editor.createHeading('H5')">Hd5</a>
                        </div>
                      </div>
                       <!--paragraph-->
                      <div class="col">
                          <a href="javascript:void(0)" @click="$Editor.createParagraph()"> <i class="fa fa-paragraph" aria-hidden="true"></i> </a>
                      </div> 
                       <!--Table size create-->                                        
                      <div class="col">
                        <a data-toggle="collapse" href="#tablesize" role="button" aria-expanded="false" aria-controls="tablesize" > <i class="fa fa-table" aria-hidden="true"></i> </a>
                        <div class="collapse" id="tablesize">
                         <div class="form-group">
                             <label class="lable-control" for="columns">Columns</label>
                             <input name="columns" v-model="Table.columns" type="text" class="form-control">
                             <label class="lable-control" for="rows">Rows</label>
                             <input name="rows" v-model="Table.rows" type="text" class="form-control">
                             <button data-toggle="collapse" href="#tablesize" role="button" aria-expanded="false" aria-controls="tablesize" @click="getTableSize()" class="btn btn-primary">Get Table</button>
                         </div>
                        </div>
                      </div>
                       <!--Table format-->   
                      <div class="col">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tablet" aria-hidden="true"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a @click="PickTableFormat('table-dark')" class="dropdown-item text-white bg-info">Table Dark</a>
                            <a @click="PickTableFormat('table-striped')" class="dropdown-item text-white bg-info">Table sripped</a>
                            <a @click="PickTableFormat('table-bordered')" class="dropdown-item text-white bg-info">Table bordered</a>
                            <a @click="PickTableFormat('table-bordered table-dark')" class="dropdown-item text-white bg-info">Table bordered dark</a>
                            <a @click="PickTableFormat('table-hover table-dark')" class="dropdown-item text-white bg-info">Table hover dark</a>
                          </div>
                        </div>                                            
                      </div>
                       <!--create list-->                                  
                      <div class="col">
                        <div class="dropdown">
                          <a @mouseover="Dropper('lists')" id="lists" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span> <i class="fa fa-list" aria-hidden="true"></i> </span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="lists">
                            <ul class="list-unstyled">
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.format('insertUnorderedList')"> <span>Unordered List   </span>  </a></li>
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.format('insertOrderedList')"> <span>Ordered List</span>  </a></li>
                            </ul>
                          </div>
                        </div>                               
                      </div>
                       <!--Create image-->
                      <div class="col">
                        <a data-toggle="collapse" href="#insertimage" role="button" aria-expanded="false" aria-controls="imagefile"> <i class="fas fa-images    "></i></a>
                        <div id="insertimage" class="form-group collapse">
                             <input type="file" name="imagename" id="imagefile">
                             <button data-toggle="collapse" href="#insertimage" role="button" aria-expanded="false" aria-controls="insertimage" @click="UploadImage()" class="btn btn-success">Upload image</button>
                        </div>
                      </div>  
                       <!--format image-->
                      <div class="col">
                          <a data-toggle="collapse" href="#formatimage" role="button" aria-expanded="false" aria-controls="imagefile"> <i class="fa fa-camera" aria-hidden="true"></i> </a>
                          <div id="formatimage" class="form-group collapse">
                            <div class="form-group mb-1">
                                <label class="font-as" for="thumbnail">Thumbnail</label>
                                <input @click="setimageFormat('img-thumbmail')" value="thumnail" type="checkbox" name="thumbnail">
                            </div>
                            <div class="form-group">
                                <label class="font-as" for="rounded">Rounded</label>
                                <input @click="setimageFormat('rounded')" value="rounded" type="checkbox" name="rounded">
                            </div>       
                             <div class="form-group">  
                                 <div class="row text-center">
                                     <label class="ml-5">Height</label>
                                 </div>                                                 
                                 <div class="row justify-content-center text-center">
                                 <div class="col">
                                     <button @click="setHeight(50)" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                                 </div>                                                   
                                 <p> {{ imageFormat.height }} </p> 
                                 <div class="col">
                                     <button @click="setHeight(-50)" class="btn btn-danger"> <i class="fa fa-minus" aria-hidden="true"></i> </button>
                                 </div>                                                          
                                 </div>                                                
                             </div>
                             <div class="form-group">  
                                 <div class="row text-center">
                                     <label class="ml-5">Width</label>
                                 </div>                                                 
                                 <div class="row justify-content-center text-center">
                                 <div class="col">
                                     <button @click="setWidth(50)" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                                 </div>                                                   
                                 <p> {{ imageFormat.width }} </p> 
                                 <div class="col">
                                     <button @click="setWidth(-50)" class="btn btn-danger"> <i class="fa fa-minus" aria-hidden="true"></i> </button>
                                 </div>                                                          
                                 </div>                                                
                             </div>     
                             <div class="form-group">
                                  <select v-model="imageFormat.id" name="id" id="" class="form-control">
                                    <option v-for="(ImageId, index) in ImageIds" :key="index" :value="ImageId">Image {{ImageId}} </option>
                                  </select>
                             </div>                                          
                             <div class="form-group">
                                 <button @click="FormatImage()" data-toggle="collapse" data-target="#formatimage" role="button" aria-expanded="false" aria-controls="imagefile" class="btn image-btn-fmt">Ok</button>
                             </div>                                               
                          </div>                                            
                      </div> 
                       <!--create url-->                                     
                      <div class="col">
                        <a href="javascript:void(0)"><span data-toggle="collapse" href="#urlgenerator" role="button" aria-expanded="false" aria-controls="urlgenerator" class="fa fa-link fa-fw"></span></a>
                        <div id="urlgenerator" class="form-group collapse">
                             <span><input id="url" placeholder="Enter url" class="form-control"></span>
                             <button data-toggle="collapse" href="#urlgenerator" role="button" aria-expanded="false" aria-controls="urlgenerator" @click="$Editor.createUrl()" class="btn btn-success">create link</button>
                        </div>
                      </div>
                      <!--Solution Template-->
                      <div class="col">
                          <button role="button" @click="$Editor.solutiontemplate()" class="text-success">  <i class="fa fa-home" aria-hidden="true"></i> Template</button>
                      </div>
                   </div> 
                    <!--edit toolbar 2--> 
                   <div class="row format-bar">
                       <div class="col">
                            <a href="javascript:void(0)" @click="$Editor.format('bold')"><span class="fa fa-bold fa-fw"></span></a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('italic')"><span class="fa fa-italic fa-fw"></span></a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('underline')"> <i class="fa fa-underline" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('superscript')"> <i class="fa fa-superscript" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('subscript')"> <i class="fa fa-subscript" aria-hidden="true"></i></a>
                       </div>    
                      <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('strikeThrough')"> <i class="fas fa-strikethrough    "></i> </a>
                       </div> 
                       <div class="col">
                           <a href="javascript:void(0)" @click="getFontColor()"> <i class="fa fa-paint-brush" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="getBGC()"> <i class="fas fa-paint-roller    "></i> </a>
                       </div>                                          
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.CreateContainer()"> <i class="fa fa-plane" aria-hidden="true"></i> </a>
                       </div>                                                                                
                      <div class="col">
                          <a @mouseover="Dropper()" href="javascript:void(0)"><span data-toggle="collapse" href="#colorpicker" role="button" aria-expanded="false" aria-controls="colorpicker" ><i class="fas fa-brush"></i></span></a>
                          <div id="colorpicker" class="collapse row">
                              <div class="row">
                                  <div class="col">
                                    <button id="red" @click="getColor('red')" class="btn btn-primary" >R{{ColorPicker.red}}  </button>
                                  </div>
                                  <div class="col">
                                    <button id="red" @click="getColor('green')"  class="btn btn-primary" >G{{ColorPicker.green}}  </button>                                                     
                                  </div>
                                  <div class="col">
                                    <button id="red" @click="getColor('blue')"  class="btn btn-primary">B{{ColorPicker.blue}}  </button>                                                        
                                  </div>                                                                                                        
                              </div>
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div id="pallete" class="card col pallete"></div>  
                                  </div>
                                  <div class="col">
                                     <button data-toggle="collapse" href="#colorpicker" role="button" aria-expanded="false" aria-controls="colorpicker" class="btn btn-success">Ok</button>
                                  </div>
                              </div>
                          </div>
                      </div>                                                                                                                        
                   </div>
                    <!--edit toolbar 3-->
                   <div class="row format-bar">                                        
                       <div class="col">
                            <a href="javascript:void(0)" @click="$Editor.format('justifyCenter')"> <i class="fa fa-align-justify" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('justifyLeft')"> <i class="fa fa-align-left" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('justifyRight')"> <i class="fa fa-align-right" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('outdent')"> <i class="fa fa-indent" aria-hidden="true"></i> </a>
                       </div>
                       <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('undo')"> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                       </div>    
                      <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('redo')"> <i class="fas fa-redo    "></i> </a>
                       </div>                                               
                      <div class="col">
                           <a href="javascript:void(0)" @click="$Editor.format('enableObjectResizing')"> <i class="fa fa-expand" aria-hidden="true"></i> </a>
                       </div> 
                       <div class="col">
                        <div class="dropdown">
                          <a @mouseover="Dropper('icon')" id="icon" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span> <i class="fa fa-building" aria-hidden="true"></i> </span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="icon">
                            <ul class="list-unstyled">
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.InsertIcon('fa fa-building')"> <span><i class="fa fa-google-plus" aria-hidden="true"></i></span>  </a></li>
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.InsertIcon('fa fa-building')"> <span><i class="fa fa-google-plus" aria-hidden="true"></i></span>  </a></li>
                            </ul>
                          </div>
                        </div>
                       </div> 
                       <div class="col">
                        <div class="dropdown">
                          <a @mouseover="Dropper('fontfamily')" id="fontfamily" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span> <i class="fa fa-font" aria-hidden="true"></i> </span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="fontfamily">
                            <ul class="list-unstyled">
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.setFontFamly('Times New Roman')"> <span> <i class="fas fa-loveseat    "></i>  </span>  </a></li>
                                <li class="font-as dropdown-item"><a href="javascript:void(0)" @click="$Editor.setFontFamly('Algerian')"> <span><i class="fa fa-google-plus" aria-hidden="true"></i></span>  </a></li>
                            </ul>
                          </div>
                        </div>                                             
                       </div> 
                       <div class="col">
                           <a href="javascript:void(0)" @click="IncreaseFontSize()"><span>Aa</span> {{FontSize}} </a>
                       </div>                                                                                                                                                                                                                                         
                   </div>                                     
                 </div>
                  <!--editor are<div v-show="!Boolean($Editor.checkeblogemode())" id="editor" v-html="previousStore" class="editor Ta-hieght bg-white  col-sm-12" contenteditable="true"></div>    a-->
                 
                  <div id="editor"  v-html="Page" class="editor Ta-hieght bg-white  col-sm-12" contenteditable="true"></div>                                                             
             </div>                          
         </div> 
         <!--editor Footer-->
         <div class="card-footer text-center bg-primary">
            <div class="row">
             <div class="col">
                 <p class="text-white">editting....</p>
             </div>
             <div class="col">
                 <button @click="Save()" class="btn btn-success text-white">Save</button>
             </div> 
             <div class="col">
                 <button @click="$Editor.storeData()" class="btn btn-danger text-white">Save Change</button>
             </div>
             <div class="#editor" ></div> 
            </div> 
         </div>
     </div>             
   </div> 
    <!--Page Saving Form-->
   <div class="modal fade" id="savepage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div id="create-height" class="modal-content  Theme ">
         <!--Modal Header-->
         <div class="modal-header">
           <h5 class="modal-title heading-color heading-style" id="createCms">Save Page</h5>
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
           <form action="/Updatepage" method="GET">
               <!--Page Name-->
             <div class="form-group">
               <label  class="text-white" for="title">Page Name</label>
               <input v-model="name" type="text" name="page" class="form-control" >
             </div> 
             <!--Page Content-->      
             <div class="form-group">
               <label  class="text-white" for="image">Post Image</label>
               <input v-model="content" id="postimage" type="text" class="form-control"   name="content">
             </div>
             <!--footer-->
             <div class="modal-footer">
               <button  @click="PageSaved()"  type="submit" class="btn btn-success">Save Page</button>
             </div>
           </form>
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
                BlogPost: new Form({
                    Content: '',
                }),
                Table: new Form({
                    columns: 0,
                    rows: 0,
                    tableFormat: ''
                }),
                image: new Form({
                    imagename: ''
                }),
                ColorPicker: {
                    red: 0,
                    blue: 0,
                    green: 0,

                },
                FontSize: 0,
                imageFormat: new Form({
                    format: '',
                    height: 50,
                    width: 50,
                    id: 0,
                }),
                ImageIds: [],
                previousStore: '',
                endSession: null,
                sessionStatus: null,
                editPosts: '',
                editblogs: '',
                /**
                 * Page to be editted 
                 * store
                */
               Page: '',
               /**
                * Web Page data
                * to be saved to the database
               */
              name: '',
              content: ''
                
            }
        },
        methods: { 
            /**
             * Close The form 
             * when the page 
             * is saved and show success message
            */
           PageSaved(){
               
           $('#savepage').modal('show');
              this.$swal({
               position: 'top-end',
               icon: 'success',
               title:  page + ' page is in edit mode',
               showConfirmButton: false,
               timer: 2500
             });
           },
            /**
             * Saving The edditted page
             * to the database
            */
            Save(){
              this.$Editor.SavePage();
              $('#savepage').modal('show');
                //localStorage.setItem('page','');
                //localStorage.setItem('edittedpage','');
              /**
               * Store The Page 
               * To the Database
              */

             /*
             var name = localStorage.page;
             var pagedata = localStorage.edittedpage;
             const data = {
                 page: name ,
                 content: pagedata
             }

             alert(data.page + data.content);
             
             axios.get('/Updatepage',data)
             .then(()=>{
              this.$swal({
               position: 'top-end',
               icon: 'success',
               title:  page + ' page is in edit mode',
               showConfirmButton: false,
               timer: 2500
             });
             })
             */
            },
            blogdata(){
                if(Boolean(this.$Editor.checkeblogemode())){
                  this.editblogs = window.localStorage.bloge.replace("false","true");
                }
               
            },
            EditPosts(){
            axios.get('editblogposts/' + this.blogid)
            .then((response)=>{
               this.$Editor.SetBlogPost(response.data.blog);
            })
            .then(error=>{
              console.log(error);
            })
          },
            PickTableFormat(format){
               this.Table.tableFormat = format;
            },
        sessionManager(){
           if(this.$Editor.returnTimer()==0){
              this.$Editor.createNewSession();
              this.sessionStatus = this.$Editor.setCurrentSession();
           }
           else if(this.$Editor.returnTimer()==1){
             this.previousStore = this.$Editor.returnsessionData();
             this.$Editor.setCurrentSession();
             this.$Editor.returnsessionData();
             this.$Editor.restorePreviousSession();
           }

       },
              UploadImage(){
                var id = this.$Editor.returnImageId();
                this.$Editor.storeImageId(++id);
                this.$Editor.InsertImage(this.$Editor.returnImageId(),this.imageFormat.format);
                Event.$emit('updateid');
              },
            setimageFormat(format){
              this.imageFormat.format = format;
            },     
            FormatImage(){
               this.$Editor.FormatImage(this.imageFormat.format,this.imageFormat.height,this.imageFormat.width,this.imageFormat.id);
            },
            setHeight(size){
                this.imageFormat.height += size;             
            },
            setWidth(size){
                this.imageFormat.width += size; 
            },            
            IncreaseFontSize(){
                this.FontSize += 1;
                 this.$Editor.format('fontSize',this.FontSize)
            },
            Dropper(type){
                if(type=='fontfamily'){
                    $('#fontfamily').dropdown('show')
                }
                else if(type=='icon'){
                     $('#icon').dropdown('show')
                }
                else if(type=='lists'){
                     $('#lists').dropdown('show')
                }                
              
            },
            getFontColor(){
                  Event.$emit('getFontC');  
            },
            getBGC(){
             Event.$emit('getbg');
            },
            getColor(color){
                if (color=='red') {
                      this.getred();
                       this.$Editor.ShowPallete(this.ColorPicker.red,this.ColorPicker.green, this.ColorPicker.blue);
                }
                if (color=='green') {
                     this.getgreen();
                      this.$Editor.ShowPallete(this.ColorPicker.red,this.ColorPicker.green, this.ColorPicker.blue);
                }  
                 if (color=='blue') {
                      this.$Editor.ShowPallete(this.ColorPicker.red,this.ColorPicker.green, this.ColorPicker.blue);
                     this.getblue();
                }                               
              
              Event.$on('getbg',()=>{
                  this.$Editor.format('backColor',this.$Editor.ShowPallete(this.ColorPicker.red,this.ColorPicker.green, this.ColorPicker.blue ))
              })
              Event.$on('getFontC',()=>{
                  this.$Editor.format('foreColor',this.$Editor.ShowPallete(this.ColorPicker.red,this.ColorPicker.green, this.ColorPicker.blue ))
              })              
              
            
            },
            getred(){
                if(this.ColorPicker.red<100){
                    this.ColorPicker.red +=5;
                }else{
                   this.ColorPicker.red =0; 
                }
            },
            getgreen(){
                if(this.ColorPicker.green<100){
                    this.ColorPicker.green +=5;
                }else{
                   this.ColorPicker.green = 0; 
                }
            },
            getblue(){
                if(this.ColorPicker.blue<100){
                    this.ColorPicker.blue +=5;
                }else{
                   this.ColorPicker.blue =0; 
                }
            },            
            getTableSize(){
               this.$Editor.createTable(this.Table.columns,this.Table.rows,this.Table.tableFormat);
            },
        },
            mounted() {
                Event.$on('CreateH',()=>{
                    this.createH = !this.createH;
                });
                Event.$on('ht',(ht)=>{
                this.htype = ht;    
                });
                  this.$Editor.storeImageIds();
                  this.ImageIds = this.$Editor.returnImageIds();                 
                  this.sessionManager(); 

                  this.blogdata();

                  this.Page = localStorage.pagedata.replace('false','true');
                  
                  this.name = localStorage.page;

                  this.content = localStorage.edittedpage;
                
            },
            updated() {
                 
            },
            created(){
        
            }
    }
</script>

<style scoped>
    .format-toolbar{
        background-color: rgb(209, 80, 129);
    }
    .toolbar-links{
        cursor: pointer; 
    }
    .e-hieght{
        height: 100vh;
    }
    .text-window-color{
        background-color: rgb(197, 193, 193);
    }
    .el-hov{
        border: black;
        background-color: thistle;
        color: rgb(44, 131, 160);
    }
    .el-hov:hover{
       background-color: rgb(44, 42, 42);
       color: white;

    }
    .sample-toolbar
{
    border:solid 1px #ddd;
    background:#f4f4f4;
    padding: 5px;
    border-radius:3px;
}

.sample-toolbar > span
{
    cursor:pointer;
}

.sample-toolbar > span:hover
{
    text-decoration:underline;
}

.editor
    {
	border:solid 1px #ccc;
	padding: 20px;
    min-height: 1000px;
    }

    .format-bar{
        background-color: rgb(115, 185, 44);
    }
    .edit-bar{
        background-color: rgb(190, 144, 190);
    }
    .h-link{
        background-color: rgb(197, 193, 193);
    }
    .h-link:hover{
        color: seashell;
        background-color: rgb(123, 207, 165);
    }
    table,td {
  border: 1px solid black;
  border-collapse: collapse;
}
.pallete{
   height: 100px;
   width: 100px;
}
.font-as{
    background-color: rgb(45,60,100);
    color: rgb(183, 233, 233);
}
.font-as:hover{
background-color: rgb(53, 219, 136);
color: wheat;
}

.image-btn-fmt{
background-color: rgba(211, 49, 162, 0.555);
}

#Toolbars{
    position: fixed;
}

</style>
