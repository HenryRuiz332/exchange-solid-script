<template>
	<v-row justify="center">
	<v-dialog v-model="dialogDelete" max-width="290" persistent>
           <v-card >

           	 <v-card-title class="text-h6 warning">
	          Warning
	        </v-card-title>

	        <v-card-text>
           	
                <h5><v-icon color="error">!</v-icon>Are you sure you want to delete this item?</h5>
                
           </v-card-text>
           <v-card-actions class="pt-3">
                     <v-spacer></v-spacer>
                     <v-btn color="success" x-small dark @click="closeDelete">Cancel</v-btn>&nbsp;
                     <v-btn color="red" x-small dark @click="deleteItemConfirm">Ok. Delete</v-btn>
                     <v-spacer></v-spacer>
                </v-card-actions>
           </v-card>
      </v-dialog>
 </v-row>
</template>

<script type="text/javascript">
	
	export default{
		props: {
			dialogDelete: Boolean,
			closeDelete: Function,
			deleteItemConfirm: Function,
			
		}
	};
</script>
<style type="text/css">
	.stylesDelete{
		height: 10vw;
    	text-align: center;
	}
	.warning{
		background: red;
		padding: 5px;
		color:white!important;
	}
	
</style>