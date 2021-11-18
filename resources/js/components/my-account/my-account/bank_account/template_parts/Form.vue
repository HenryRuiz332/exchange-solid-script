<template>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
            <h4>Añadir Datos Bancarios <span style="font-size: 13px"><i class="fa fa-info" id="popover-2" variant="outline-primary"></i></span></h4>

            
            <b-popover
              target="popover-2"
              title="Acerca de los Datos Bancarios"
              triggers="hover focus"
              content="1- Los datos bancarios son requeridos para hacer intercambios en la plataforma, ya que le permite saber al sistema a que cuenta bancaria se va a realizar la transferencia.
                2- Puede agregar 'Cuenta Bancaria' o 'Pago Móvil', para hacer intercambios. 
                3- Sus datos estan seguros no compartiremos su información con nadie."
            ></b-popover>

           

            <div>
                <b-tabs active-nav-item-class="text-uppercase " active-tab-class=""
                    content-class="mt-3">
                        <b-tab title="Pago Móvil" active @click="selectedMovil">
                            <b-form   @submit.prevent="saveBankAccountMovil">
                                <label>Seleccione un Banco:</label>
                                <b-form-select v-model="formBankAccountMovil.bank_id" :options="banks" value="1" class="mb-3">
                                     
                                    <template #first>
                                        <b-form-select-option value="id" disabled>-- Elija un Banco --</b-form-select-option>
                                    </template>
                                  
                                 
                                </b-form-select>

                                <b-form-group id="input-group-document" label="Documento del Titular de la cuenta:" label-for="input-document" :description="errors.errors.document ? errors.errors.document[0] : null">
                                        <b-form-input
                                            id="input-document"
                                            v-model="formBankAccountMovil.document"
                                            required></b-form-input>
                                    </b-form-group>

                                <i class="fa fa-info" id="popover-phone" variant="outline-primary"></i>
                                <b-form-group id="input-group-phone" label="Teléfono:" label-for="input-phone" :description="errors.errors.phone ? errors.errors.phone[0] : null">
                                        <b-form-input
                                            id="input-phone"
                                            v-model="formBankAccountMovil.phone"
                                            required></b-form-input>
                                </b-form-group>
                                
                                <b-popover
                                  target="popover-phone"
                                  title="Info"
                                  triggers="hover focus"
                                  content="Coloque el número telefónico asociado a su pago móvil de cuenta bancaria."
                                ></b-popover>

                                <b-button type="button" variant="outline-danger"  @click="cleanFormBankAccount">Limpiar</b-button>
                                    <b-button type="submit" variant="outline-primary" v-show="!this.formBankAccountMovil.progress">Guardar</b-button>

                                    <b-spinner variant="outline-primary" type="grow" label="Loading" v-if="formBankAccountMovil.progress"></b-spinner>
                            </b-form>
                        </b-tab>

                        <b-tab title="Cuenta Bancaria"  @click="selectedTr">
                            <small>Para Transferencias Bancarias nuestro sistema maneja dos bancos nacionales (BBVA Provincial y Banesco) para que las mismas sean efectivas inmediatamente.</small>
                            <b-form  @submit.prevent="saveBankAccount">
                                <label>Seleccione un Banco:</label>
                                <b-form-select v-model="formBankAccount.bank_id" :options="banks" class="mb-3">
                                 
                                    <template #first>
                                        <b-form-select-option :value="null" disabled>-- Elija un Banco --</b-form-select-option>
                                    </template>
                                    
                                 
                                </b-form-select>

                                <b-form-group id="input-group-name_user_account" label="Nombre del Titular de la cuenta:" label-for="input-name_user_account" :description="errors.errors.name_user_account ? errors.errors.name_user_account[0] : null">
                                    <b-form-input
                                        id="input-name_user_account"
                                        v-model="formBankAccount.name_user_account"
                                        aria-describedby="input-live-name_user_account" required> 
                                    </b-form-input>
                                    
                                </b-form-group>

                                <b-form-group id="input-group-account_number" label="Número de Cuenta:" label-for="input-account_number" :description="errors.errors.account_number ? errors.errors.account_number[0] : null">
                                    <b-form-input
                                        id="input-account_number"
                                        v-model="formBankAccount.account_number"
                                        required></b-form-input>
                                </b-form-group>

                                <b-form-group id="input-group-document" label="Documento del Titular de la cuenta:" label-for="input-document" :description="errors.errors.document ? errors.errors.document[0] : null">
                                    <b-form-input
                                        id="input-document"
                                        v-model="formBankAccount.document"
                                        required></b-form-input>
                                </b-form-group>

                                <b-button type="button" variant="outline-danger"  @click="cleanFormBankAccount ">Limpiar</b-button>
                                <b-button type="submit" variant="outline-primary" v-show="!this.formBankAccount.progress && !editMode">Guardar</b-button>
                                <b-button type="button" variant="outline-primary" v-show="editMode" @click="updateBankAccount">Actualizar</b-button>

                                <b-spinner variant="outline-primary" type="grow" label="Loading" v-if="formBankAccount.progress"></b-spinner>
                       
                            </b-form>  
                        </b-tab>
                </b-tabs>
            </div>       
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
            <h4>Pago Móvil / Cuentas Bancarias </h4> 
            <b-spinner variant="outline-primary" type="grow" label="Loading" v-if="isloading"></b-spinner>
            <div>
                <i class="fa fa-refresh" v-if="banksAccounts.length == 0" @click="getBanksAccounts"></i>
                <small v-if="banksAccounts.length == 0">No tienes datos registrados</small>
            </div>
            <paginate id="pages" v-if="pagination.last_page > 1"
                  :pagination="pagination"
                  :offset="4"
                  @paginate="getBanksAccounts()"></paginate>
             <b-card
                v-for="bank,i in banksAccounts" :key="i"
                :header="bank.type">
                <b-card-text v-show="bank.type == 'Pago Móvil'">
                    Banco: {{ bank.bank.bank_name + ' - ' + bank.bank.code}}<br>
                    Documento: {{bank.document}}<br>
                    Teléfono: {{ bank.phone}}<br></b-card-text>

                 <b-card-text v-show="bank.type == 'Transferencia Bancaria'">
                    Banco: {{ bank.bank.bank_name + ' - ' + bank.bank.code}}<br>
                    Titular: {{ bank.name_user_account}}<br>
                    Nro Cuenta: {{ bank.account_number}}<br>
                    Documento: {{bank.document}}<br>
                    </b-card-text>
                    <!-- <b-button class="btn btn-sm"  variant="outline-success" @click="editFormBankAccount(bank)">Editar</b-button> -->
                    <b-button class="btn btn-sm"  
                            variant="outline-danger" 
                            v-b-modal="'modal-' + bank.id" 
                            @click="$bvModal.show('modal-'+ bank.id)">Eliminar</b-button>

                   
                    <b-modal :id="'modal-'+ bank.id" title="Eliminar" variant="outline-danger" hide-footer>
                        <span style="color:red">Eliminar {{ bank.type + ' - '+ bank.bank.bank_name }}</span>

                        <b-button class="mt-3"  variant="outline-primary" block @click="$bvModal.hide('modal-'+ bank.id)">Cerrar</b-button>
                        <b-button class="mt-3"  variant="outline-danger" block @click="deleteObj(bank)">Eliminar</b-button>
                    </b-modal>
            </b-card>

            <div>
          
          
          </div>    
             
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">

        <paginate id="pages" v-if="pagination.last_page > 1"
                          :pagination="pagination"
                          :offset="4"
                          @paginate="getBanksAccounts()"></paginate>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'FormBankAccount',
        props:{
            formBankAccount: Object,
            formBankAccountMovil: Object,
            cleanFormBankAccount: Function,
            saveBankAccount: Function,
            saveBankAccountMovil: Function,
            banks: Array,
            banksAccounts: Array,
            getBanksAccounts: Function,
            pagination: Object,

            editFormBankAccount: Function,
            editMode: Boolean,
            updateBankAccount: Function,

            deleteObj: Function,
            tb: String
           
           
        },
        data:() =>({
            
        }),
        computed:{
            errors() {
                return this.$store.getters.geterrors
            },
            isloading: function() {
                return this.$store.getters.getloading
            },
            
        },
        mounted() {
            
        },
        methods:{
            selectedTr(){
                this.formBankAccountMovil.type = 'Transferencia Bancaria'
                this.getBanksAccounts(this.formBankAccountMovil.type)


            },
            selectedMovil(){
                this.formBankAccountMovil.type='Pago Móvil'
                this.getBanksAccounts(this.formBankAccountMovil.type)
               

            }
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
