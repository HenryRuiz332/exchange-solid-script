<template>
	<div>
		<div class="iq-card iq-card-block iq-card-stretch p-3 text-white" >
               
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<h5 class="text-white">
                         <v-badge
                              color="#43A047"
                              :content="countVisitors"
                            >
                               {{ nameModule }} 
                            </v-badge> </h5> 
                         <CrudControls  
                                        :itemsTable="tableVisitors"
                                        :openDialogControl="openDialog" 
                                        :getFuntion="getVisitors"
                                        :nameComponent="'Direcciones de Clientes'"
                                        :openDialogDelete="openDialogDelete"
                                         />  
                        
				</v-col>
			</v-row>
			<v-row>
				<v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
					<!-- <v-data-table
                              show-select
                              v-model="tableVisitors"
                              dark
                              style="border-radius: 10px"
                              :headers="headersTable"
                              :items="visitors"
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
                                        @click="editCategory(item)">
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
                    </v-data-table> -->

                    <div class="iq-card">
                      
                        <div class="iq-card-body">
                        <!--    <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
                           <div class="table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" >
                                 <thead>
                                     <tr>
                                         <th style="color:#fff">Calle</th>
                                         <th style="color:#fff">num_ext</th>
                                         <th style="color:#fff">num_int</th>
                                         <th style="color:#fff">colonia</th>
                                         <th style="color:#fff">estado</th>
                                         <th style="color:#fff">pais</th>
                                         <th style="color:#fff">cliente_id</th>
                                        <th style="color:#fff">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr v-for="visitor,i in direcciones" :key="i">
                                         <td style="color:#fff">{{visitor.calle}}</td>
                                         <td style="color:#fff">{{visitor.num_ext}}</td>
                                         <td style="color:#fff">{{visitor.num_int}}</td>
                                         <td style="color:#fff">{{visitor.colonia}}</td>
                                         <td style="color:#fff">{{visitor.estado}}</td>
                                         <td style="color:#fff">{{visitor.pais}}</td>
                                            <td style="color:#fff">{{visitor.cliente_id}}</td>
                                         <td>
                                              <v-icon
                                                   color="#4CAF50"
                                                  dark
                                                  small
                                                  class="mr-2"
                                                  @click="editDireccion(visitor)">
                                                       mdi-pencil
                                             </v-icon>
                                             <v-icon
                                                  color="#E53935"
                                                  dark
                                                  small
                                                  @click="deleteObj(visitor)">
                                                  mdi-delete
                                             </v-icon>
                                         </td>
                                     </tr>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                           <th style="color:#fff">Calle</th>
                                         <th style="color:#fff">num_ext</th>
                                         <th style="color:#fff">num_int</th>
                                         <th style="color:#fff">colonia</th>
                                         <th style="color:#fff">estado</th>
                                         <th style="color:#fff">pais</th>
                                         <th style="color:#fff">cliente_id</th>
                                         <th style="color:#fff">Actions</th>
                                     </tr>
                                 </tfoot>
                             </table>
                           </div>
                            <paginate id="pages" v-if="pagination.last_page > 1"
                              :pagination="pagination"
                              :offset="5"
                              @paginate="getVisitors()"></paginate>
                      </div>
                 </div>
                 
				</v-col>
			</v-row>
		</div> 

          <DialogDeleteCategoriesPosts  :dialogDelete="dialogDelete"
                         :closeDelete="closeDelete"
                         :deleteItemConfirm="deleteItemConfirm" />
          <v-dialog     
                    style="z-index:1000"
                    v-model="dialogFormD"
                    max-width="70%">
                    <FormDirecciones 
                              :formVisitors="formVisitors"
                              :closeVisitors="closeVisitors" 
                              :formTitle="formTitle" 
                              :editMode="editMode"
                              :getVisitors="getVisitors"
                              :clientes="clientes"
                              />
          </v-dialog>

	</div>
</template>

<script>
     import CrudControls from './../../../../global_components/admin/crud/CrudControls' 
     import DialogDeleteCategoriesPosts from './../../../../global_components/admin/crud/DialogDelete' 
     import FormDirecciones from './partials_module/FormDirecciones'

     import { direcciones } from './../../../../api/users/direcciones' 
	export default{
          mixins : [direcciones],
          components:{
               CrudControls,
               DialogDeleteCategoriesPosts,
               FormDirecciones,
          },
		props:{
			nameModule: String,
               openInfo:Function

		},
    	     data:() => ({
               headersTable: [
                    { text: 'Calle', value: 'calle' },
                     { text: 'num_ext', value: 'num_ext' },
                      { text: 'num_int', value: 'num_int' },
                       { text: 'colonia', value: 'colonia' },
                        { text: 'estado', value: 'estado' },
                         { text: 'pais', value: 'pais' },
                   	{ text: 'cliente_id', value: 'cliente_id' },
                 
                    { text: 'Actions', value: 'actions', sortable: false },
               ],

               openS:''

    	     }),
    	computed:{

    	},
    	watch: {
          dialog (val) {
          val || this.closeFormDirecciones()
          },
          dialogDelete (val) {
            val || this.closeDelete()
          },

          
        
     },
    	mounted () {
          this.openS = this.$attrs.openInfo
     },

	methods: {
          


     },
};
</script>
<style type="text/css">
     
</style>