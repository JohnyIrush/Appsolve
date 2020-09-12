import { toInteger } from "lodash";

export default class Editor{
    constructor(){
       this.content = document.getSelection();
       this.columns = '';
       this.Rows = '';
       this.ImageId = localStorage.getItem("ImageId") ? localStorage.getItem("ImageId") : 0;
       this.ImageIds = [];
       this.session = localStorage.getItem("session") ? localStorage.getItem("session") : null;
       this.Timer = localStorage.getItem("Timer") ? localStorage.getItem("Timer") : toInteger(0);
       this.SessionStore = localStorage.getItem("SessionStore") ? localStorage.getItem("SessionStore") : null;
       this.Services = localStorage.getItem("Services") ? localStorage.getItem("Services") : '';
       this.ServicesHeaderImage = localStorage.getItem("ServicesHeaderImage") ? localStorage.getItem("ServicesHeaderImage") : '';
       this.page = localStorage.getItem("page") ? localStorage.getItem("page") : '';
       this.emode = localStorage.getItem("emode") ? localStorage.getItem("emode") : null;
       this.blog = localStorage.getItem("blog") ? localStorage.getItem("blog") : '';
       this.bloge = localStorage.getItem("bloge") ? localStorage.getItem("bloge") : '';
       this.blogemode = localStorage.getItem("blogemode") ? localStorage.getItem("blogemode") : '';
       this.blogeid = localStorage.getItem("blogeid") ? localStorage.getItem("blogeid") : '';
        /**
         * Enable Static Pages Editting
         * by storing them in the local Storage
        */
       this.pagedata = localStorage.getItem("pagedata") ? localStorage.getItem("pagedata") : ''; //pagedata localstorage - page To be editted
       this.edittedpage = localStorage.getItem("edittedpage") ? localStorage.getItem("edittedpage") : ''; //editted Page - to be stored to the database
    }
    format(command, value) {
        document.execCommand(command, false, value);
      }
    
     //custom commands
      //Headings Generator (h1,h2,h3,h4,h5)
     createHeading(HeadType){
         if(HeadType=='H1'){
             document.execCommand('insertHTML', false,'<h1>' + this.content + '</h1>');
         }
         else if(HeadType=='H2'){
             document.execCommand('insertHTML', false,'<h2>' + this.content + '</h2>');
        }
        else if(HeadType=='H3'){
             document.execCommand('insertHTML', false,'<h3>' + this.content + '</h3>');
        }
        else if(HeadType=='H4'){
            document.execCommand('insertHTML', false,'<h4>' + this.content + '</h4>'); 
        }
        else if(HeadType=='H5'){
            document.execCommand('insertHTML', false,'<h5>' + this.content + '</h5>'); 
        }
     }
     //Paragraph generator
     createParagraph(){
        document.execCommand('insertHTML', false,'<p class="text-h">' + this.content + '</p>');
     }
     //Tablegenerator
     createTable(cols,rows,format){
       for (var i = 0; i<=(cols-1); i++) {
           this.columns = this.columns + '<td style="border: 1px solid black"></td>';
        }
         for (var r = 0; r<=(rows-1); r++) {
             this.Rows = this.Rows  + '<tr>' + this.columns + '</tr>';
         }
         document.execCommand('insertHTML', false,'<table class="table ' + format + ' " style="border: 1px solid black" >' + this.Rows + '</table>');
     }
     //Urlgenarator
     createUrl(){
        var url = document.getElementById('url').value;
        document.execCommand('insertHTML', false, '<a href="' + url + '" target="_blank">' + this.content + '</a>');
     }
     //Blog markup generator
     InsertImage(id,format){
         if(document.getElementById('imagefile').value!=""){
            var imagefile = document.getElementById('imagefile').value;
            imagefile = imagefile.replace("C:\\fakepath\\", "");
            var url = '/images/';
            document.execCommand('insertHTML', true, '<img class="img-fluid ' + format + '" id="' + id +  '" src="' + url + imagefile + ' "  target="_blank">');
         }
       
     }
     ShowPallete(r,g,b){
         var pallete = document.getElementById('pallete');
         pallete.style.backgroundColor =  'rgb(' + r + '%' +',' + g + '%'+ ',' + b + '%' + ')' ;
        // alert('rgb(' + r +',' + g+ ',' + b + ')');
        return 'rgb(' + r + '%' +',' + g + '%'+ ',' + b + '%' + ')' ;
     }
     CreateContainer(){
        document.execCommand('insertHTML', false,'<div id="food" class="bg-primary container">' + this.content + '</div>');
     }
     InsertIcon(Icon){
        if(Icon=="fa fa-building"){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }    
        else if(Icon==""){
            document.execCommand('insertHTML', false,'<i class="' + Icon + '"' + ' aria-hidden="true">'+'</i>');
        }                                            
     }
     setFontFamly(family){
            document.execCommand('insertHTML', false,'<p style=font-family:"' + family + '"' + '>'+ this.content +'</p>');
     }
     FormatImage(format,height,width,id){
           var image = document.getElementById(id);
           image.style.height = "'" + height +  'px' + "'";
           image.style.width = "'" + width + 'px' + "'";
           image.classList.add("'" + format + "'");
    }     
     genarateMarkup(){
        var Blog = document.getElementById('sols');
        Blog.contentEditable = "false";
        localStorage.setItem('blog',Blog.outerHTML);
        
    }

    storeImageId(id){
        localStorage.setItem("ImageId",id);
        
    }
    returnImageId(){
        return this.ImageId;
    }
    storeImageIds(){
        for (let i = 0; i < this.ImageId; i++) {    
            this.ImageIds.push(i+1);
        }
    }
    returnImageIds(){
        return this.ImageIds;
    }
    returnTimer(){
        return toInteger(this.Timer);
    }
    createNewSession(){
        localStorage.setItem("session","new");
        localStorage.setItem("Timer",toInteger(this.Timer) + toInteger(1));        
    }
    setCurrentSession(){ 
        localStorage.setItem("session","current");
        return this.session;
    }
   endSession(){
    localStorage.setItem("session","ended");
    localStorage.setItem("Timer",toInteger(0));
    localStorage.clear();
   }
   storeData(){
    var data = document.getElementById('Blogeditor'); 
    localStorage.setItem("SessionStore",data.outerHTML);
   }


   endSession(end){
    localStorage.setItem("Timer",toInteger(end));
    localStorage.setItem("Timer",toInteger(0));
   }
   returnsessionData(){
     return this.SessionStore;
   }

   restorePreviousSession(){
       //var lastdata = document.getElementById('Converter');
       //var markup = document.getElementById('Blogeditor');
       //markup.replaceWith(lastdata);
   }

   saveServices(services){
    localStorage.setItem("Services",services);
   }

   returnServices(){
       return this.Services;
   }
   saveImage(image){
    localStorage.setItem("ServicesHeaderImage",image);
   }
   returnHeaderImage(){
       return this.ServicesHeaderImage;
   }

   editpages(page){
            localStorage.setItem("page",page);
            var page = document.getElementById(page);
            page.contentEditable = 'true';
            if(page==privacy || page==Terms){
                localStorage.setItem("page",page);
                var page = document.getElementById(page);
                page.contentEditable = 'true';
            }
   }

   checkemode(){
       return this.emode;
   }

   returnblog(){
       return this.blog;
   }

   /**
    * Generate Solution template
   */
    solutiontemplate(){
        document.execCommand('insertHTML', false,
        '<div class="card Theme text-h">' +
        '<div id="sols" class="card Theme m-1 ml-2">' +
          '<div class="card-header">' +
            '<div class="card-title"><h1 class="display-4 heading-color">Posts</h1></div>' +
          '</div>' +
           '<div  class="card-body text-white">' +
    
           '</div>' +
        '</div>' + 
           '<div class="card-footer">' +
             '<div class="row justify-content-center">' +
               '<div class="col-sm-3 col-md-3 col-xs-3">' +
                 '<button type="button" class="btn btn-outline-primary"> <span> <i class="fas fa-edit    "></i> Edit Post</span> </button>' +
               '</div>' +
               '<div class="col-sm-3 col-md-3 col-xs-3">' +
                 '<button type="button" class="btn btn-outline-danger"> <span> <i class="fa fa-trash" aria-hidden="true"></i> Delete Post</span> </button>' +
               '</div>' +
               '<div class="col-sm-3 col-md-3 col-xs-3">' +
                 '<div class="btn link-color"><span><i class="fa fa-thumbs-up icon-size" aria-hidden="true"></i> Likes</span> </div>' +
               '</div>' +
               '<div class="col-sm-3 col-md-3 col-xs-3">' +
                 '<button class="btn link-color"> <span> <i class="fa fa-comments icon-size" aria-hidden="true"></i>comment</span> </button>' +
               '</div>' +
             '</div>' +
           '</div> ' +                                                                
      '</div>' 

);
    }

    editblogdata(bloge){
        localStorage.setItem('bloge',bloge);
        localStorage.setItem('blogemode',true);
    }

    checkeblogemode(){
        return this.blogemode;
    }
    makeblogeedittable(){
        document.getElementById('sols').contentEditable ="true";
    }

    /**
     * Store The page to be
     *  editted In the localStorage
     * Which will be passed to the editor
    */
   Page(page){
     const data = document.getElementById(page).outerHTML; //convert tio string
     localStorage.setItem('pagedata',data); //store permanently
     window.location.assign('http://127.0.0.1:8000/#/editor');
   }

   SavePage(){
    const data = document.getElementById(this.page).outerHTML;
    localStorage.setItem('edittedpage',data); //store permanently
   }

}