export default class Post{
    constructor()
    {
      this.posteditid = localStorage.getItem("posteditid") ? localStorage.getItem("posteditid") : null;//Post Selected to be Edittposteditid
      this.editidmode = localStorage.getItem("editidmode") ? localStorage.getItem("editidmode") : false;//Check edit mode
    }

    /**
     * set select post id to be editted
     * and set editmode to true
     * */
    setPostEditId(id){
        localStorage.setItem("posteditid",id);
        localStorage.setItem("editidmode",true);
    }

    /**
     * set editmode to false
     * and posteditid to null
    */
   resetPostEditId(){
    localStorage.setItem("editidmode",false);
   }

   /**
    * get postEditId
   */

   getPostId(){
       return this.posteditid;
   }
   /**
    * get edit mode
   */
  getEditMode(){
      return this.editidmode;
  }
}