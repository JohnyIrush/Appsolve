<template>
<div class="modal fade" id="createpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content Theme">
      <div class="modal-header">
        <h5 class="modal-title heading-color" id="exampleModalLabel">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="card Theme">
                <div class="card-header heading-color">
                   Create page 
                </div>
                 <div class="card-body">
                   <div class="col-md-12">
                      <form action="/createpage" method="get">
                          <div class="form-group">
                              <label for="name" class="text-white">Page Name</label>
                              <input  v-model="pagedata.page_name" name="name" type="text" class="form-control" placeholder="Name">
                          </div>
                          <div class="form-group">
                              <label for="name" class="text-white">Page Name</label>
                              <input  v-model="pagedata.page_section" name="section" type="text" class="form-control" placeholder="Name">
                          </div>
                          <div class="form-group">
                              <label for="content" class="text-white">Page Markup</label>
                               <textarea  v-model="pagedata.page_markup" cols="100" rows="10" name="content" type="text" class="form-control" placeholder="email address"></textarea>
                          </div>                                       
                          <div class="card-footer">
                              <button class="btn btn-success" type="submit">Save page</button>
                          </div>                     
                      </form>
                   </div>                 
                 </div>
            </div>

        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Page</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    props: ['pagedata'],
    data() {
        return {
            name: '',
            markup: ''
        }
    },
    methods: {
        sendpage(){
          /**
           * page data to besend to database
          
           const data ={
               name: this.name,
               content: this.markup,
            } 
*/
            /**
             * send axios get request 
             * to store page content
            
              axios.post('createpage/',data)
              .then(()=>{
                 this.$swal({
                  position: 'top-end',
                  icon: 'success',
                  title: 'page was created successfully',
                  showConfirmButton: false,
                  timer: 2000
                })
              })*/
        }
    },
}
</script>

<style scoped>

</style>