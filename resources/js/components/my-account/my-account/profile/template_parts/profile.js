export const profile = {
     
     data(){
          return {
               formProfile : new Form({
                     id: '',
                     username: '',
                     name: '',
                     last_name: '',
                     date_age: '',
                     document: '',
                     email: '',
                     phone: '',
                     email_verified_at: '',
                     password: '',
                     avatar: '',
                     token_login: '',
                     access_token: '',
               }),

               formPassword : new Form({
                    current_password: '',
                    password: '',
                    password_confirm: ''
               }),

               show: false,

               roles: [],
               status: [],
               tableUser: [],
               dialogForm: false,
               dialogDelete: false,
               editIndexObj: -1,
               editMode: false,
               users:[],
               trashAll : '',


              
              
               selectDel :[],


             

          }
     },
     computed: {
          formTitle () {
               return this.editIndexObj === -1 ? 'Nuevo Cliente' : 'Editar Cliente'
          },
          titleCrud(){
               this.title = this.nameModule
               return this.title
          },
     },
     mounted(){
          this.getProfile()
     },
     methods:{
          onSubmit(event) {
                event.preventDefault()
                alert(JSON.stringify(this.formProfile))
          },
          onReset(event) {
                event.preventDefault()
                // Reset our formProfile values
                this.formProfile.email = ''
                this.formProfile.name = ''
                this.formProfile.food = null
                this.formProfile.checked = []
                // Trick to reset/clear native browser formProfile validation state
                
                this.$nextTick(() => {
                  
                })
          },
          getProfile(){
               let getModule = 'users/' + this.$attrs.IDuser + '/' + this.$attrs.token
               axios.get(this.$urlApp + this.$apiPath + getModule)
               .then(response => {
                    if (response.status == 200) {
                         this.formProfile.id = response.data.user.id
                         this.editProfile(response.data.user) 
                    }
                  
               })
               .catch(e => {
                    this.$errorbvToast()
               })
              
          },
          editProfile (item) {
               this.editMode = true
               this.formProfile.reset()
               this.formProfile.clear()
               this.formProfile.fill(item)
               // this.editedIndex = this.users.indexOf(item)
             
              
          },
          updateProfile() {
               event.preventDefault()
               this.formProfile.post(this.$urlApp + this.$apiPath + 'users/' + this.formProfile.id + '/' + this.$attrs.token)
               .then(response => {
                    if (response.status == 200) {
                         this.$successbvToast('Perfil actualizado! ') 
                          
                    }
                  
               })
               .catch(e => {
                    this.$errorbvToast()
               })
          },
          updatePassword() {

               this.formPassword.post(this.$urlApp + this.$apiPath + 'update-password/' + this.$attrs.token)
               .then(response => {
                    if (response.status == 200) {
                         this.$successbvToast('Contraseña actualizada! ') 
                         this.formPassword.reset()
                         this.formPassword.clear()
                    }
                  
               })
               .catch(e => {
                     
                    this.$errorbvToast()
               })
          },


          deleteObj (item) {
               this.selectDel = []
               this.selectDel.push(item)
               this.dialogDelete = true
          },
          closeDelete () {
               if ( this.tableUser.length > 0) {
                    this.selectDel = this.tableUser
               }
               this.dialogDelete = false
               this.selectDel = []
               
          },
          deleteItemConfirm () {
               axios.post(this.$urlApp + this.$apiPath + 'users-delete', {
                    'deletes' : this.selectDel
               })
               .then(response => {
                    if (response.status == 200) {
                         this.getUsers()
                         this.closeDelete()
                         this.$deletebvToast()
                    }else{
                         this.$errorbvToast()
                    }
               })
               .catch(e => {
                   this.$errorbvToast()
               })

          },

          
          closeFormUser() {

               this.dialogForm = false
               this.formUser.roles= []
               this.formUser.reset()
               this.formUser.clear()
               this.editMode = false


             
              
               this.getUsers()
          },

          


          
     },
       
}
