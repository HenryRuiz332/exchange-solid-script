<template>
    <div>
        <div class="controls d-flex justify-content-end">
            <v-tooltip top v-for="control, i in controls" :key="i" v-if="control.show">
                <template v-slot:activator="{ on, attrs }">
                      <v-btn
                            class="mx-2"
                            fab
                            dark
                            small
                            v-bind="attrs"
                            v-on="on"
                            :color="control.color"
                            @click="control.method">
                                <i :class="control.iconClass"></i>
                        </v-btn>
                </template>
                <span>{{ control.infoTooltip }}</span>
            </v-tooltip>



            <v-tooltip top v-if="itemsTable.length > 0">
                <template v-slot:activator="{ on, attrs }">
                      <v-btn
                           
                            class="mx-2"
                            fab
                            dark
                            small
                            v-bind="attrs"
                            v-on="on"
                            color="#F44336"
                            @click="openDialogDelete">
                                <i class="fa fa-trash"></i>
                        </v-btn>
                </template>
                <span>Delete All</span>
            </v-tooltip>
        </div>

       
    </div>
        
</template>
<script>
    export default {
    	props:{
            itemsTable: Array,
    		openDialogControl: Function,
    		getFuntion: Function,
            openDialogDelete: Function,
            nameComponent: String,
    	},
     data: () => ({
          controls:[
              
          ]     
     }),

        computed: {
               
        },

        watch: {
             
        },

        created () {
              this.controls = [
                   {
                         id:1,
                         color: '#9F7AF3',
                         method: this.openDialogControl,
                         iconClass : 'fa fa-plus pr-0',
                         infoTooltip : 'New ' + this.nameComponent,
                         show: true
                         
                       
                    },
                    {
                         id:2,
                         color: '#1A237E',
                         method: this.getFuntion,
                         iconClass : 'fa fa-refresh',
                         infoTooltip : 'Reload',
                         show: true
                        
                        
                    },
                    {
                         id:3,
                         color: '#F44336',
                         method: this.openDialogDelete,
                         iconClass : 'fa fa-trash',
                         infoTooltip : 'Delete All',
                         show: false
                      
                        
                    }
               ]
        },

        methods: {
              

              
        },
     };
</script>

<style type="text/css">
    .controls v-btn{
        color: #fff!important;
    }
    @media (max-width: 303px) { 
        .btn{
           font-size: 8px!important;
        }

       
    }
    

    /*@media (min-width: 700px) { 
        .btnFloat{
            display: none!important;
        }
    }*/
</style>