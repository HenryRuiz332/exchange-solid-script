export const menu_sidebar = {
     data(){
          return {
               items: [
                   



                    {      
                         idEvent: 'clients',
                         menu: 'Clients',
                         path: '#',
                         icon: 'fa fa-user-friends',
                         nvUrl: '/dashboard/clients/'+ localStorage.getItem('session_app'),
                         children: [
                              {   
                                   idEvent: 'clients',
                                   menu: 'Todos los clientes',
                                   path: '/dashboard/clients/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-users',  
                              },
                              {   
                                   idEvent: 'clients',
                                   menu: 'Direcciones',
                                   path: '/dashboard/direcciones/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-user-tag',  
                              },
                             

                         ]
             
             

                    },
                    
                   


         
               ]
          }
     },

  computed: {
      computedheaders: function() {
          return this.items
      }
  }
}
