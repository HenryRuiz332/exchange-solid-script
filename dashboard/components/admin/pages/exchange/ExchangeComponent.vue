<template>
	<div>
        exchnge
		<!-- <div class="iq-card iq-card-block iq-card-stretch p-3 text-white" >

			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">

					<h5 class="text-white">All {{ nameModule }}</h5>

                         <CrudControls  
                                        :itemsTable="tableUser"
                                        :openDialogControl="openDialog" 
                                        :getFuntion="getUsers"
                                        :nameComponent="'User'"
                                        :openDialogDelete="openDialogDelete"
                                         />  
                        
				</v-col>
			</v-row>
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<v-data-table
                              show-select
                              v-model="tableUser"
                              dark
                              style="border-radius: 10px"
                              :headers="headersTable"
                              :items="users"
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
                                   <v-icon
                                        color="#4CAF50"
                                        dark
                                        small
                                        class="mr-2"
                                        @click="editUser(item)">
                                             mdi-pencil
                                   </v-icon>
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
                    <FormUser 
                              :formUser="formUser"
                              :closeFormUser="closeFormUser" 
                              :formTitle="formTitle" 
                              :editMode="editMode"
                              :roles="roles"
                              :status="status"
                              :users="users"
                              :getUsers="getUsers"
                             
                             
                              />
          </v-dialog>
 -->
	</div>
</template>

<script>
     // import NotificationCrud from './../../../../global_components/admin/crud/NotificationCrud' 
     // import CrudControls from './../../../../global_components/admin/crud/CrudControls' 
     // import DialogDelete from './../../../../global_components/admin/crud/DialogDelete' 
     // import FormUser from './partials_module/Form'

     // import { users } from './../../../../api/users/users' 

	export default{
          // mixins: [users],
          // components:{
          //      NotificationCrud,
          //      CrudControls,
          //      DialogDelete,
          //      FormUser,
              
          // },
		props:{
			nameModule: String
		},
    	     data:() => ({

               headersTable: [
                    { text: 'Name', value: 'name' },
                    { text: 'Last name', value: 'last_name' },
                    { text: 'Username', value: 'username' },
                    { text: 'Email', value: 'email' },
                    { text: 'Phone', value: 'phone' },
                    { text: 'document', value: 'document' },
                   
                  
                    { text: 'Actions', value: 'actions', sortable: false },
               ],     
    	     }),
    	computed:{

    	},
    	watch: {
          dialog (val) {
          val || this.closeFormUser()
          },
          dialogDelete (val) {
            val || this.closeDelete()
          },

          
        
     },
    	mounted () {
          
     },

	methods: {
          
               closInfo(){
                    this.responseOk=false
                }
         
     },
};
</script>
<style type="text/css">
     
</style>