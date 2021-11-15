import axios from "axios"
axios.defaults.withCredentials = true;

export default {
  namespaced: true,

  state: {
    authenticated: false,
    user: null
  },

  getters: {
    authenticated (state) {
      return state.authenticated
    },

    user (state) {
      return state.user
    },
  },

  mutations: {
    SET_AUTHENTICATED (state, value) {
      state.authenticated = value
    },

    SET_USER (state, value) {
      state.user = value
    }
  },

 actions: {
    async signIn ({ dispatch }, credentials) {
          await axios.get('/sanctum/csrf-cookie')
           .then(response => {
                
          })
          .catch(e => {
            
          })
          await  axios.post('/login', credentials)
           .then(response => {

               let roles = response.data.user.roles
               let token =  response.data.token

                if (roles.length>0) {
                    for(let u=0; u<roles.length; u++){ 
                      if (roles[u].name == 'Admin') {
                              let redirect = 'dashboard/main/' + token
                              localStorage.setItem('session_app', token)
                              window.location.replace(redirect);

                              break
                      }else{
                         
                          let redirect = window.location.origin + '/my-account/dashboard/'  + token
                          localStorage.setItem('ID', response.data.user.id)
                           localStorage.setItem('session_app', token)
                          window.location.replace(redirect);
                          break
                      }
                    }
                }else{
                  
                    let redirect = window.location.origin + '/my-account/dashboard/'  + token
                    localStorage.setItem('ID', response.data.user.id)
                    localStorage.setItem('session_app', token)
                    window.location.replace(redirect);
                    
                }
 
             
              
          })
          .catch(e => {
               alert("these credentials do not match our records")
          })


          
    },
   
    async signOut ({ dispatch }) {
      await axios.post('/logout')

      return dispatch('me')
    },

    me ({ commit }) {
      return axios.get('/get/user').then((response) => {
        commit('SET_AUTHENTICATED', true)
        commit('SET_USER', response.data)

      }).catch(() => {
        commit('SET_AUTHENTICATED', false)
        commit('SET_USER', null)
      })
    }
  }
}