<template>
	<div>
         
		<div class="iq-card iq-card-block iq-card-stretch p-3 text-white" >

			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">

					<h5 class="text-white">All {{ nameModule }}</h5>

                         <CrudControls  
                                        :itemsTable="tableCommissions"
                                        :openDialogControl="openDialog" 
                                        :getFuntion="getCommissions"
                                        :nameComponent="'Commissions'"
                                        :openDialogDelete="openDialogDelete"
                                         />  
                        
				</v-col>
			</v-row>
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<v-data-table
                              show-select
                              v-model="tableCommissions"
                              dark
                              style="border-radius: 10px"
                              :headers="headersTable"
                              :items="commissions"
                              sort-by="calories"
                              class="elevation-1">

                             <template v-slot:top>
                                   <v-toolbar
                                        style="border-radius: 10px 10px 0 0"
                                        dark
                                        flat>
                                        <v-toolbar-title>{{ titleCrud }}</v-toolbar-title>
                                        <v-divider
                                             class="mx-4"
                                             inset
                                             vertical>
                                                  
                                        </v-divider>
                                        <v-spacer></v-spacer>
                                   </v-toolbar>
                             </template>
                             <template v-slot:item.actions="{ item }">
                                  <!--  <v-icon
                                        color="#4CAF50"
                                        dark
                                        small
                                        class="mr-2"
                                        @click="editUser(item)">
                                             mdi-pencil
                                   </v-icon> -->
                                   <v-icon
                                        color="#E53935"
                                        dark
                                        small
                                        @click="deleteObj(item)">
                                        mdi-delete
                                   </v-icon>
                              </template>
                    </v-data-table>
				</v-col>
			</v-row>
		</div>

          <DialogDelete  :dialogDelete="dialogDelete"
                         :closeDelete="closeDelete"
                         :deleteItemConfirm="deleteItemConfirm" />
          <v-dialog     
                    style="z-index:1000"
                    v-model="dialogForm"
                    max-width="70%">
                    <FormCommissions 
                              :formCommissions="formCommissions"
                              :closeFormCommissions="closeFormCommissions" 
                              :formTitle="formTitle" 
                              :editMode="editMode"
                              :commissions="commissions"
                              :getCommissions="getCommissions"
                              :saveCommissions="saveCommissions"
                              :errors="errors"/>
          </v-dialog>

	</div>
</template>

<script>
     
     import CrudControls from './../../../../global_components/admin/crud/CrudControls' 
     import DialogDelete from './../../../../global_components/admin/crud/DialogDelete' 
     import FormCommissions from './partials_module/CommissionsForm'

     import { commissions } from './partials_module/commissions' 

	export default{
          mixins: [commissions],
          components:{
               CrudControls,
               DialogDelete,
               FormCommissions,
              
          },
    	     data:() => ({

               headersTable: [
                    { text: '$', value: 'dolar' },
                    { text: '%', value: 'percentage' },
                    { text: 'Status', value: 'status' },
                    { text: 'Actions', value: 'actions', sortable: false },
               ],     
    	     }),
    	computed:{

    	},
    	watch: {
          dialog (val) {
          val || this.closeFormCommissions()
          },
          dialogDelete (val) {
            val || this.closeDelete()
          },

          
        
     },
    	mounted () {
          
     },

	methods: {
          
               
     },
};
</script>
<style type="text/css">
     
</style>