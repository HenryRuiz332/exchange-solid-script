<template>
     
     <div class="container "  v-if="snackbar">
          <!-- <div class="alert text-white bg-danger" role="alert">
               <div class="iq-alert-text">Deleted Item <b>Success</b></div>
               <button type="button" @click="closeInfoDelete">
               <i class="ri-close-line"></i>
               </button>
            </div> -->
             <div  v-if="snackbar">
               <b-alert 
                    v-model="snackbar"
                    class=" m-0 rounded"
                    style="z-index: 2000;"
                    variant="danger">
                              Deleted Item <b> Success</b>
                          <button type="button" @click="closeInfoDelete" class="ml-auto">
                         <i class="ri-close-line"></i>
                    </button>
               </b-alert> 
               <div class="ml-auto">
                   
               </div>
          </div>
     </div>
</template>
<script>
     export default {
         props:{
                snackbar: Boolean,
               deleteNotify: Boolean
         },
          data: () => ({
               info: ''
          }),
          mounted(){

          },
          created(){
               
          },
          methods:{
               closeInfoDelete() {
                    this.$emit('close_info_delete')
               },
               openInfoDelete() {
                    this.$emit('open_info_delete')
               }
          }
     };
</script>