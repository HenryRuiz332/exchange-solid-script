<template>
    <div>
        <b-form @submit="updateProfile" >
            <b-form-group id="input-group-name" label="Nombre:" label-for="input-name">
                <b-form-input
                    id="input-name"
                    v-model="formProfile.name"
                    required
                    aria-describedby="input-live-name">        
                </b-form-input>
                <b-form-invalid-feedback id="input-live-name">
                  Enter at least 3 letters
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group id="input-group-apellido" label="Apellido:" label-for="input-apellido">
                <b-form-input
                    id="input-apellido"
                    v-model="formProfile.last_name"
                    required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-alias" label="Alias:" label-for="input-alias" description="Un alias es un nombre de usuario único.">
                <b-form-input
                    id="input-alias"
                    v-model="formProfile.username"
                    required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-document" label="Documento:" label-for="input-document">
                <b-form-input
                    id="input-document"
                    v-model="formProfile.document"
                    required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-email" label="Email:" label-for="input-email">
                <b-form-input
                    id="input-email"
                    v-model="formProfile.email"
                    required></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-phone" label="Teléfono:" label-for="input-phone">
                <b-form-input
                    id="input-phone"
                    v-model="formProfile.phone"
                    required></b-form-input>
            </b-form-group>

          <!-- <b-form-group id="input-group-3" label="Food:" label-for="input-3">
            <b-form-select
              id="input-3"
              v-model="formProfile.food"
              :options="foods"
              required
            ></b-form-select>
          </b-form-group> -->

          <!-- <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">
            <b-form-checkbox-group
              v-model="formProfile.checked"
              id="checkboxes-4"
              :aria-describedby="ariaDescribedby"
            >
              <b-form-checkbox value="me">Check me out</b-form-checkbox>
              <b-form-checkbox value="that">Check that out</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group> -->

            <b-button type="submit" variant="primary">Actualizar</b-button>
            
            
        </b-form>
    </div>
</template>

<script>
    export default {
        name: 'FormProfile',
        props:{
            formProfile: Object,
            updateProfile: Function,
           
        },
        data:() =>({
            
        }),
        computed:{
            
        },
        mounted() {
            
        },
        methods:{
          
        }
    };
</script>
