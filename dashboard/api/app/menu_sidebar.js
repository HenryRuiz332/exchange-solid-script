export const menu_sidebar = {
     data(){
          return {
               items: [
                   
                    {      
                         idEvent: 'users',
                         menu: 'Users',
                         path: '#',
                         icon: 'fa fa-user-friends',
                         nvUrl: '/dashboard/users/'+ localStorage.getItem('session_app'),
                         children: [
                              {   
                                   idEvent: 'users',
                                   menu: 'Users',
                                   path: '/dashboard/users/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-users',  
                              },
                         ]
                    },

                    {      
                         idEvent: 'exchange',
                         menu: 'Exchange',
                         path: '#',
                         icon: 'fa fa-rocket',
                         nvUrl: '/dashboard/exchange/'+ localStorage.getItem('session_app'),
                         children: [
                              {   
                                   idEvent: 'exchange',
                                   menu: 'Exchange',
                                   path: '/dashboard/exchange/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-exchange-alt',  
                              },
                              {   
                                   idEvent: 'exchange',
                                   menu: 'Commissions',
                                   path: '/dashboard/exchange/commissions/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-calculator',  
                              },
                              {   
                                   idEvent: 'exchange',
                                   menu: 'Cryptocurriencies',
                                   path: '/dashboard/exchange/cryptocurriencies/'+ localStorage.getItem('session_app'),
                                   icon: 'fa fa-gem',  
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
