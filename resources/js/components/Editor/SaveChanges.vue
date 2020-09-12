<template>
    <div>
        <button @click="SaveChange()" type="button" class="btn save-btn-style btn-lg btn-outline-primary">Save changes</button>
    </div>
</template>
<style >
    .save-btn-style{
       position: fixed;
       float: left;
       left: 10px;
    }
</style>
<script>
export default {
    methods: {
        SaveChange(){
                      let timerInterval
          this.$swal({
            title:  'Saving ' + page + ' Changes',
            html: 'Wait a moment',
            timer: 5000,
            timerProgressBar: true,
            onBeforeOpen: () => {
              this.$swal.showLoading()
              timerInterval = setInterval(() => {
                const content = this.$swal.getContent()
                if (content) {
                  const b = content.querySelector('b')
                  if (b) {
                    b.textContent = this.$swal.getTimerLeft()
                  }
                }
              }, 100)
            },
            onClose: () => {
              clearInterval(timerInterval)
              window.location.reload();
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === this.$swal.DismissReason.timer) {
              
            }
          })
            
        }
    },
}
</script>