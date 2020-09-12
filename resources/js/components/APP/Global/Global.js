import Vue from 'vue';
import Swal from "vue-sweetalert2";
Vue.use(Swal);
export default class Global{
    constructor(){
        this.Today = localStorage.getItem("Today") ? localStorage.getItem("Today") : "null";//Date of Variable
        this.Tinterval = null;//PopUp display interval Variable
        this.popUpclear = null;//Popup interval clear Variable
        this.Unsubscribed = null;//popup process restart Variable
        this.selectedapp = localStorage.getItem("selectedapp") ? localStorage.getItem("selectedapp") : 1; //stored selected product id
        this.force_buyer_login = localStorage.getItem("force_buyer_login") ? localStorage.getItem("force_buyer_login") : 0; //set to true
        this.version_image = localStorage.getItem("version_image") ? localStorage.getItem("version_image") : ''; //set to true
        this.version_id = localStorage.getItem("version_id") ? localStorage.getItem("version_id") : ''; //set to true
    }
    //Display Terms and Conditions
    DisplayTerms(){
        $('#Terms').modal('show');
    }
    //Display privacy Policy
    Displayprivacy(){
    $('#privacy').modal('show');
    }
   //Display  popUp Manager
    Displaysubscribe(){ 
            $(document).ready(()=>{
                if (this.Today=="null") {
                this.Tinterval = setInterval(()=>{
                    $('#subscribe').modal('show');  
                },6000);

                this.PopdayManager();

                this.popUpclear = setTimeout(()=>{
                    window.clearInterval(this.Tinterval);
                },12000);
                this.Unsubscribers();
            }
        });            

    }
    //set Date pop PopUp
    PopdayManager(){
        $(document).ready(()=>{
            localStorage.setItem("Today",new Date().getDate());
        });
       
    }
    //restart the popup process the next day
    Unsubscribers(){
       this.Unsubscribed = setTimeout(()=>{
            localStorage.setItem("Today",null);

        },86400000);
    }
    //It removes pop up from subscribers
    subscribed(){
        //window.clearInterval(this.Tinterval);
        //window.clearTimeout(this.popUpclear); 
        //window.clearTimeout(this.Unsubscribed);
    }
    /**
     * store selected app id
    */
   selectapp(id){
    localStorage.setItem("selectedapp",id);
   }
   showapp(){
       return this.selectedapp;
   }

   /**
    * Store version Image
   */
  versionImage(image){
    localStorage.setItem("version_image",image);
  }
  versionid(id){
    localStorage.setItem("version_id",id);
    alert(id);
  }
}