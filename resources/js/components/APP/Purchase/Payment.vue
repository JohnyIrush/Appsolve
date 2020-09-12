<template>
  <div class="Theme m-1">
      <div class="row justify-content-center">
          <div class="col-xs col-sm col-md">
             <div class="spinner-border app-select-progress  offset-sm-5" role="status">
             </div>
          </div>
      </div> 
        <div class="col-sm-12">
         <div class="card Theme">
             <div class="row justify-content-center m-1">
              <div class="col-sm p-0">
                <div class="card Theme p-2">
                    <div class="card-header">
                        <h4 class="heading-color">Charges</h4>
                    </div>
                   <div class="card-body">
                     <table class="table table-hover table-dark">
                      <thead>
                      </thead>
                      <div id="charge">
                      <tbody class="chart">                       
                        <tr>
                          <td text>
                            <img src="Images/pro.png" class="img-fluid offset-sm-1 text-center prod-h" alt="" srcset=""> 
                          </td>
                        </tr>
                      </tbody>
                      </div>
                      <thead>
                        <tr>
                          <th class="heading-color" scope="col">Total</th>
                          <th class="heading-color" scope="col">$900</th>
                        </tr>
                      </thead>                                           
                    </table>                    
                   </div>                  
                </div>
              </div>
              <div class="col-sm-6 p-0">
                  <div class="card Theme p-2">
                   <div class="card-header">
                       <h4 class="heading-color">Payment Information</h4>
                   </div>
                   <div class="card-body">  
                    <div class="dropdown">
                      <button type="button" class="btn btn-outline-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span> <i class="fas fa-money-bill    "></i> Select Payment Method</span> </button>
                      <div class="dropdown-menu Theme" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item link-color" data-toggle="collapse" href="#paypal" role="button" aria-expanded="false" aria-controls="collapseExample"><p> <i class="fab icon-size fa-paypal" aria-hidden="true"></i>ayPal</p></a>
                        <a class="dropdown-item link-color" data-toggle="collapse" href="#stripe" role="button" aria-expanded="false" aria-controls="collapseExample"><p>Stripe</p></a>
                      </div>
                    </div>  
                     <!--Paypal Payment-->
                    <div class="collapse mt-2"  id="paypal">
                      <div class="card Theme card-body">
                             <div class="card-header">
                               <h3 class="heading-color">Payment By Paypal</h3>
                             </div>
                             <div class="card-body">
                              <div id="paypalbody" class="form-group">
                               <!--<a  href="http://127.0.0.1:8000/payment" class="text-success"><i class="fab fa-paypal" aria-hidden="true"></i> <span>Pay with paypal</span></a>--> 
                                <div id="paypal-button-container"></div>  
                              </div>                                                          
                             </div>
                      </div>                        
                    </div>     
                     <!--Stripe Payment-->
                    <div class="collapse mt-2"  id="stripe">
                      <div class="card Theme card-body">
                             <div class="card-header">
                               <h3 class="heading-color">Payment By Stripe</h3>
                             </div>
                             <div class="card-body">
                              <div class="form-group">
                               <a  href="http://127.0.0.1:8000/stripe" class="text-success"><i class="fab fa-paypal" aria-hidden="true"></i> <span>Pay with Stripe</span></a> 
                              </div>                                                          
                             </div>
                      </div>                        
                    </div>                                                                           
                   </div>
                   <div class="card-footer"></div>
                  </div>
              </div>              
             </div>
         </div>
        </div>    
  </div>
</template>

<script>
    export default {
        methods: {
      displaypaybuttons(){
       paypal.Buttons().render('paypalbody');
       paypal.Buttons({
      createOrder(data, actions){
       return actions.order.create({
         purchase_units: [{
           amount: {
             value: '0.01'
           }
         }]
       })        
      }
       }).render('#paypal-button-container');
        },
       Ufmessage(){
           setTimeout(()=>{
        this.$swal('Please Select The Method of payment');
           },3000);
       }            
        },
     mounted() {  
     this.displaypaybuttons();
    }
    }
</script>

<style scoped>
.icon-size{
    font-size: 20px;
}
.app-select-progress{
   width: 2rem; 
   height: 2rem;
   color: lawngreen;
}
#charge{
  display: flex;
}
.chart{
  display: inline;
}
.prod-h{
  height: 500px;
  width: 500px;
}
</style>