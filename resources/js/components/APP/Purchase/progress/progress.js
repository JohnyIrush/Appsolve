export default class progress{
    constructor(){
    this.apptest = localStorage.getItem("apptest") ? localStorage.getItem("apptest") : "false";
    this.service = localStorage.getItem("service") ? localStorage.getItem("service") : "false";
    this.details = localStorage.getItem("details") ? localStorage.getItem("details") : "false";
    this.payment = localStorage.getItem("payment") ? localStorage.getItem("payment") : "false";
    this.installation = localStorage.getItem("installation") ? localStorage.getItem("installation") : "false";
    this.timer = this.timer;
    }
    successprog(step){

        //check if the apptest was successfull
        if (step=="apptest") {
         //apptest circle    
        var apptestcirc = document.getElementById("bar-apptest-circle");
        apptestcirc.style.borderColor = "greenyellow";
         //apptest  rect
        var apptestrec = document.getElementById("bar-apptest-rec");
        apptestrec.style.backgroundColor = "greenyellow";
         //apptest  lable
        var apptestlbl = document.getElementById("bar-apptest-lbl");
        apptestlbl.style.color = "greenyellow";  
         //mantain apptest
         localStorage.setItem("apptest","true"); 
         var lbl = document.getElementById("step-1-lbl");
         var check = document.createElement("p");
         var icon = document.createElement("i");
         icon.classList.add('fas','text-success','fa-check','display-1');
         check.appendChild(icon);
         lbl.replaceWith(check);                           
        }
        //check if the service was successfull
        if(step=="service"){
        //service circle    
        var servicecirc = document.getElementById("bar-service-circle");
        servicecirc.style.borderColor = "greenyellow";
         //service  rect
        var servicerec = document.getElementById("bar-service-rec");
        servicerec.style.backgroundColor = "greenyellow";
         //apptest  lable
        var servicelbl = document.getElementById("bar-service-lbl");
        servicelbl.style.color = "greenyellow"; 
        localStorage.setItem("service","true");  
        var lbl = document.getElementById("step-2-lbl");
        var check = document.createElement("p");
        var icon = document.createElement("i");
        icon.classList.add('fas','text-success','fa-check','display-1');
        check.appendChild(icon);
        lbl.replaceWith(check);          
       }
       //check if the details was successfull
        if (step=="details") {
        //details circle    
        var detailscirc = document.getElementById("bar-details-circle");
        detailscirc.style.borderColor = "greenyellow";
         //details  rect
        var apptestrec = document.getElementById("bar-details-rec");
        apptestrec.style.backgroundColor = "greenyellow";
         //details  lable
        var detailslbl = document.getElementById("bar-details-lbl");
        detailslbl.style.color = "greenyellow"; 
         //maintain service
         localStorage.setItem("details","true");   
         var lbl = document.getElementById("step-3-lbl");
         var check = document.createElement("p");
         var icon = document.createElement("i");
         icon.classList.add('fas','text-success','fa-check','display-1');
         check.appendChild(icon);
         lbl.replaceWith(check);            
        }
        //check if the payment was successfull
        if (step=="payment") {
        //payment circle    
        var paymentcirc = document.getElementById("bar-payment-circle");
        paymentcirc.style.borderColor = "greenyellow";
         //payment  rect
        var apptestrec = document.getElementById("bar-payment-rec");
        apptestrec.style.backgroundColor = "greenyellow";
         //payment  lable
        var paymentlbl = document.getElementById("bar-payment-lbl");
        paymentlbl.style.color = "greenyellow"; 
        localStorage.setItem("payment","true");
        var lbl = document.getElementById("step-4-lbl");
        var check = document.createElement("p");
        var icon = document.createElement("i");
        icon.classList.add('fas','text-success','fa-check','display-1');
        check.appendChild(icon);
        lbl.replaceWith(check);        
        }
        //check if the installation was successfull   
        if (step=="installation") {
        //installation circle    
        var installationcirc = document.getElementById("bar-apptest-circle");
        installationcirc.style.borderColor = "greenyellow";
         //installation  rect
        var apptestrec = document.getElementById("bar-installation-rec");
        apptestrec.style.backgroundColor = "greenyellow";
         //installation  lable
        var installationlbl = document.getElementById("bar-apptest-lbl");
        installationlbl.style.color = "greenyellow"; 
        localStorage.setItem("installation","true");
        var lbl = document.getElementById("step-5-lbl");
        var check = document.createElement("p");
        var icon = document.createElement("i");
        icon.classList.add('fas','text-success','fa-check','display-1');
        check.appendChild(icon);
        lbl.replaceWith(check);
        }             
}
    //maintains progress
    checkprogress(){
        if(this.apptest=="true"){
            this.successprog('apptest');
        }
        if(this.service=="true"){
            this.successprog('service');
        }
        if(this.details=="true"){
            this.successprog('details');
        }
       if(this.payment=="true"){
            this.successprog('payment');
        }
       if(this.installation=="true"){
            this.successprog('installation');
        }                          
    }
    //rotate the circular progress
    rotateCircularBar(){
        //apptest rotates until the step is successfull
        var apptestcirc = document.getElementById("bar-apptest-circle");
        apptestcirc.style.transitionDuration = "10s";
        apptestcirc.style.transform = 'rotate(360deg)';
        
    }
    rotation(){
        this.timer = setInterval(this.rotateCircularBar(),10000);
        return this.timer;
    }
}