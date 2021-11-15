<template>
     <!-- 
     <div class="container "  v-if="snackbar">
          <div class="alert text-white bg-success" role="alert">
               <div class="iq-alert-text">Update Module <b>Success</b></div>
               <button type="button" @click="closInfo">
               <i class="ri-close-line"></i>
               </button>
            </div>

              
     </div> -->
     <div  v-if="snackbar">
          <b-alert 
               v-model="snackbar"
               class=" m-0 rounded"
               style="z-index: 2000;"
               variant="success">
                    Update Module <b>Success</b>
                     <button type="button" @click="closInfo" class="ml-auto">
                    <i class="ri-close-line"></i>
               </button>
          </b-alert> 
          <div class="ml-auto">
              
          </div>
     </div>
     <!-- <div class="text-center">
   
          <v-snackbar
               style="z-index:10000"
               absolute
               bottom
               color="success"
               outlined
               right
              
               v-model="snackbar">
               {{ info }}

               <template v-slot:action="{ attrs }">
                    <v-btn
                         color="#9B7AF3"
                         text
                         v-bind="attrs"
                         @click="closInfo()">
                              Cerrar
                         </v-btn>
               </template>
          </v-snackbar>
     </div> -->
</template>
<script>
     export default {
         props:{
               snackbar: Boolean,
               deleteNotify: Boolean
         },
          data: () => ({
            timeout:1000,
             info: 'wldlwkd',
            
          }),
          mounted(){

          },
          created(){
               
          },
          methods:{
               closInfo() {
                    this.$emit('close_info')
               },
               openInfo() {
                    this.$emit('open_info')
               },
               
          }
     };
</script>