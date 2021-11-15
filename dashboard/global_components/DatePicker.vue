<template>
	<div>
		 <v-menu ref="menu" v-model="menu" :close-on-content-click="false" :return-value.sync="model" transition="scale-transition" offset-y min-width="290px">

            <template v-slot:activator="{ on, attrs }">
                <v-text-field filled   :label="label" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"  @click="$emit('close')">
                </v-text-field>
            </template>

            <v-date-picker v-model="model" no-title scrollable>
                <v-spacer></v-spacer>

                <v-btn text color="primary" @click="menu = false">
                    Cancel
                </v-btn>

                <v-btn text color="primary" @click="clickOk">
                    OK
                </v-btn>
            </v-date-picker>

        </v-menu>
	</div>
</template>
<script type="text/javascript">
	export default {
		props:{
			label:String,
			model: String,
			clickOk: Function
		},
		data:() => ({
			  menu: false,
		}),
	};
</script>