<template>
	<div>
         
		<div class="iq-card iq-card-block iq-card-stretch p-3 text-white" >

			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">

					<h5 class="text-white">All {{ nameModule }}</h5>

                         <CrudControls  
                                        :itemsTable="tableCryptocurriencies"
                                        :openDialogControl="openDialog" 
                                        :getFuntion="getCryptocurriencies"
                                        :nameComponent="'Cryptocurriencies'"
                                        :openDialogDelete="openDialogDelete"
                                         />  
                        
				</v-col>
			</v-row>
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<v-data-table
                              show-select
                              v-model="tableCryptocurriencies"
                              dark
                              style="border-radius: 10px"
                              :headers="headersTable"
                              :items="cryptocurriencies"
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
                    <CryptocurrienciesForm 
                              :formCryptocurriencies="formCryptocurriencies"
                              :closeFormCryptocurriencies="closeFormCryptocurriencies" 
                              :formTitle="formTitle" 
                              :editMode="editMode"
                              :cryptocurriencies="cryptocurriencies"
                              :getCryptocurriencies="getCryptocurriencies"
                              :saveCryptocurriencies="saveCryptocurriencies"
                              :errors="errors"/>
          </v-dialog>

	</div>
</template>

<script>
     
     import CrudControls from './../../../../global_components/admin/crud/CrudControls' 
     import DialogDelete from './../../../../global_components/admin/crud/DialogDelete' 
     import CryptocurrienciesForm from './partials_module/CryptocurrienciesForm'

     import { cryptocurriencies } from './partials_module/cryptocurriencies' 

	export default{
          mixins: [cryptocurriencies],
          components:{
               CrudControls,
               DialogDelete,
               CryptocurrienciesForm,
              
          },
    	     data:() => ({

               headersTable: [
                    { text: 'SVG', value: 'svg' },
                    { text: 'Cripto', value: 'crypto' },
                    { text: 'Status', value: 'status' },
                    { text: 'Actions', value: 'actions', sortable: false },
               ],     
    	     }),
    	computed:{

    	},
    	watch: {
          dialog (val) {
          val || this.closeFormCryptocurriencies()
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