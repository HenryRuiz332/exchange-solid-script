<template>
     <v-dialog
          v-model="dialog"
          
          persistent
          width="300">
          <v-card
               class="text-center"
               color="#9C7AF3"
               >
               <v-card-text>
                             <span style="color:white!important">Loading...</span><br>
                    <v-progress-circular
               class="mt-4"
               :width="3"
               color="#fff"
               indeterminate></v-progress-circular>
                  </v-card-text>
          </v-card>
    </v-dialog>
</template>
<script>
     export default {
          // props:{
          //      infoLoader : String
          // },
     data () {
               return {
               dialog: true,
               }
     },
     };
</script>