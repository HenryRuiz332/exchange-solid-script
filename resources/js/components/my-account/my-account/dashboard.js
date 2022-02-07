export const dashboard = {
     
     data(){
          return {
               stats: [
                    {
                         id : 1,
                         title : 'Total traffic',
                         numbers: '348.980',
                         percent : '3',
                         time: 'Last mont',
                         icon: 'ni ni-active-40',
                         classIcon: 'icon icon-shape bg-gradient-red text-white rounded-circle shadow',
                    },
                    {
                         id : 2,
                         title : 'Users',
                         numbers: '348',
                         percent : '89',
                         time: '24hr',
                         icon: 'ni ni-chart-pie-35',
                         classIcon: 'icon icon-shape bg-gradient-orange text-white rounded-circle shadow',
                         
                    },
                    {
                         id : 3,
                         title : 'Sales',
                         numbers: '5678',
                         percent : '34',
                         time: 'Last mont',
                         icon: 'ni ni-money-coins',
                         classIcon: 'icon icon-shape bg-gradient-green text-white rounded-circle shadow',
                    },
                    {
                         id : 4,
                         title : 'Performance',
                         numbers: 97,
                         percent : 45,
                         time: 'Last mont',
                         icon: 'ni ni-chart-bar-32"',
                         classIcon: 'icon icon-shape bg-gradient-info text-white rounded-circle shadow',
                    }

               ],
               formProfile : new Form({
                    id: '',
                    username: '',
                   
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
          this.getDashboard()
     },
     methods:{
         
          getDashboard(){
               let getModule = 'my-dashboard/'  + this.$attrs.token
               axios.get(this.$urlApp + this.$apiPath + getModule)
               .then(response => {
                    if (response.status == 200) {
                        console.log(response)
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
