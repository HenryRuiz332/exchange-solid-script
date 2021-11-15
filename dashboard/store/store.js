import state_module from './modules/state_module'
import Vue from "vue"
import Vuex from "vuex"
import auth from './auth'

Vue.use(Vuex)

const store = new Vuex.Store({
	strict: false,

	modules: {
		state: state_module,
		 auth,
		// 
	},

})

export default store;
