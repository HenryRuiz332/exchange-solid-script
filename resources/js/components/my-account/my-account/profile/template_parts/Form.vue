<template>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
            <h4>Datos Personales</h4>
             <b-form @submit="updateProfile" >
                <b-form-group id="input-group-name" label="Nombre:" label-for="input-name" :description="errors.errors.name ? errors.errors.name[0] : null">
                    <b-form-input
                        id="input-name"
                        v-model="formProfile.name"
                        aria-describedby="input-live-name"> 
                    </b-form-input>
                    
                </b-form-group>

                <b-form-group id="input-group-apellido" label="Apellido:" label-for="input-apellido" :description="errors.errors.last_name ? errors.errors.last_name[0] : null">
                    <b-form-input
                        id="input-apellido"
                        v-model="formProfile.last_name"
                        required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-alias" label="Alias:" label-for="input-alias" :description="errors.errors.username ? errors.errors.username[0] : null">
                    <b-form-input
                        id="input-alias"
                        v-model="formProfile.username"
                        required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-document" label="Documento:" label-for="input-document" :description="errors.errors.document ? errors.errors.document[0] : null">
                    <b-form-input
                        id="input-document"
                        v-model="formProfile.document"
                        required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-email" label="Email:" label-for="input-email" :description="errors.errors.email ? errors.errors.email[0] : null">
                    <b-form-input
                        id="input-email"
                        v-model="formProfile.email"
                        required></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-phone" label="Teléfono:" label-for="input-phone" :description="errors.errors.phone ? errors.errors.phone[0] : null">
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

                <b-button type="submit" variant="primary" v-show="!this.formProfile.progress">Actualizar</b-button>
                <b-button type="button" class="disabledButton" variant="primary" v-show="this.formProfile.progress" disabled>Actualizar</b-button>
       
            </b-form>       
         </div>
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
            <h4>Actualizar contraseña</h4>
           
                <b-form-group id="input-group-current_password" label="Contraseña actual:" label-for="input-current_password" :description="errors.errors.current_password ? errors.errors.current_password[0] : null">
                    <b-form-input
                        id="input-current_password"
                        v-model="formPassword.current_password"
                        aria-describedby="input-live-current_password"
                        type="password"> 
                    </b-form-input>
                    
                </b-form-group>
                <b-form-group id="input-group-new_password" label="Nueva Contraseña:" label-for="input-new_password" :description="errors.errors.password ? errors.errors.password[0] : null">
                    <b-form-input
                        id="input-new_password"
                        v-model="formPassword.password"
                        aria-describedby="input-live-new_password"
                        type="password"> 
                    </b-form-input>
                    
                </b-form-group>
                <b-form-group id="input-group-confirm_password" label="Confirmar Nueva Contraseña:" label-for="input-confirm_password" :description="errors.errors.password_confirm ? errors.errors.password_confirm[0] : null">
                    <b-form-input
                        id="input-confirm_password"
                        v-model="formPassword.password_confirm"
                        aria-describedby="input-live-password_confirm"
                        type="password"> 
                    </b-form-input>
                    
                </b-form-group>
                <b-button type="submit" variant="primary" v-show="!this.formPassword.progress" @click="updatePassword">Actualizar Contraseña</b-button>
                <b-button type="button" class="disabledButton" variant="primary" v-show="this.formPassword.progress" disabled>Actualizar Contraseña</b-button>
            
        </div>
        
    </div>
</template>

<script>
    export default {
        name: 'FormProfile',
        props:{
            formProfile: Object,
            formPassword: Object,
            updateProfile: Function,
            updatePassword: Function,
           
        },
        data:() =>({
            
        }),
        computed:{
            errors() {
                return this.$store.getters.geterrors
            }
        },
        mounted() {
            
        },
        methods:{
          
        }
    };
</script>
<style type="text/css">
    .disabledButton {
        cursor: not-allowed;
    }
    
   small, .small {
        color: red!important;
    }
</style>
