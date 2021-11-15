export const app = {
     data(){
          return {
               appGetProperties: {
                   appName: null,
                   session: null,
                   countries: [],
                   states: [],
                   cities: [],
                   pagesVisited : '',
                   usersRegistered: 0,
                   user:{},
               },
               responseOk : false,
              
          }    
     },
     mounted(){
          this.getPropertiesApp()
     },
     methods:{
          getPropertiesApp(){
              
               let getModule = 'app'

               axios.get(this.$urlApp + this.$apiPath +  getModule).then(res => {
                    let vmApp = this.appGetProperties
                    vmApp.appName = res.data.appName
                    vmApp.session = res.data.session

                   
                    vmApp.pagesVisited = res.data.pagesVisited
                    vmApp.usersRegistered = res.data.usersRegistered

                    vmApp.user = res.data.user
                    
                    this.setItemsSession(vmApp)
                    console.log( this.appGetProperties)
                   
               }, res => {
                    
               })

          },
          setItemsSession(properties){
               // localStorage.setItem('app_name', properties.appName)
               // // localStorage.setItem('session_app', properties.session)
               // localStorage.setItem('countries', JSON.stringify(properties.countries))
               // localStorage.setItem('user', JSON.stringify(properties.user))
          }
     },
  computed: {
     localStorageSessionApp: function() {
          return localStorage.session_app
     },
     AppName(){
          return localStorage.app_name
     }
  }
}
