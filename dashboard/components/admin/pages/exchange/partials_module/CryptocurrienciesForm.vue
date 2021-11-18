<template>
	<div>
		<v-card color="#1D203F" class="text-white formCryptocurriencies">
            <v-card-title>
                <span class="headline">{{ formTitle }}</span>
            </v-card-title>

             <v-card-text >
                  <v-container>
                       
                       	<v-row>
                       	      <v-col cols="12"xs="12" sm="12" md="6" lg="6" xl="6">
                                   <v-text-field
                                        dark
                                        v-model="formCryptocurriencies.name"
                                        label="Name"
                                        :error-messages="errors.errors.name ? errors.errors.name[0] : null">
                                           
                                   </v-text-field>
                              </v-col>
                       		<v-col cols="12"xs="12" sm="12" md="6" lg="6" xl="6">
                       			<v-text-field
                       				dark
                                        v-model="formCryptocurriencies.crypto"
                                        label="Crypto"
                                        :error-messages="errors.errors.crypto ? errors.errors.crypto[0] : null">
                                           
                                 </v-text-field>
                       		</v-col>
                              <v-col cols="12"xs="12" sm="12" md="6" lg="6" xl="6">
                                   <v-text-field
                                        dark
                                        v-model="formCryptocurriencies.svg"
                                        label="Svg"
                                        :error-messages="errors.errors.crypto ? errors.errors.crypto[0] : null">
                                           
                                 </v-text-field>
                              </v-col>
                            	<v-col cols="12"xs="12" sm="12" md="12" lg="12" xl="12">
                                 	<v-checkbox
                                 		dark
                                        v-model="formCryptocurriencies.status"
                                        label="Status">
                                        
                                   	</v-checkbox>
                            	</v-col>
                       	</v-row>
                                      
                            
                     
                  </v-container>
             </v-card-text>

             <v-card-actions>
                  <v-spacer></v-spacer>
                       <v-btn
                           	x-smal
                           	rounded
                           	dark
                            color="#F44336"
                            @click="closeFormCryptocurriencies">
                                 Close Form
                       </v-btn> &nbsp;
                       <v-btn v-if="editMode == false"
                           	x-smal
                           	rounded
                           	dark
                            color="#9F7AF3"
                             @click="saveCryptocurriencies">
                                 Save
                       </v-btn>
                      <!--  <v-btn v-else
                           	x-smal
                           	rounded
                           	dark
                            	color="#9F7AF3"
                             	@click="updateUser">
                                 Update
                       </v-btn> -->
             </v-card-actions>
        </v-card>
	</div>
</template>
<script>
	

	export default{
		
    	props:{
    		closeFormCryptocurriencies: Function,
    		formTitle: String,
    		formCryptocurriencies: Object,
    		editMode: Boolean,
    		cryptocurriencies: Array,
    		getCryptocurriencies: Function,
    		saveCryptocurriencies: Function,
    		errors: Object,
    	},
    
    	data:() => ({
    		menu: false,
    		multipleFile: false,
    	}),
    	
    	computed:{
        	storageCountries(){
        		return JSON.parse(localStorage.countries)
        	},
    	},
    	mounted(){

    	},
	methods:{
     
       	

     //   	updateUser () {
       		
       		
     //       	this.formCryptocurriencies.post(this.$urlApp + this.$apiPath + 'users/' + this.formCryptocurriencies.id)
     //           .then(response => {
     //              	if (response.status == 200) {
     //              		localStorage.setItem('user', JSON.stringify(response.data.user))
					// this.getCommissions()
     //           		this.closeformCryptocurriencies()
     //           		this.$successbvToast('cliente actualizado! ') 
     //              	}
                  
     //         	})
     //         	.catch(e => {
     //            	this.$errorbvToast()
     //         	})
     //   	},


    }
};
</script>
