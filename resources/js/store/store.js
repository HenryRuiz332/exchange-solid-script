import state_module from './modules/state_module'
import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex)

const store = new Vuex.Store({
	strict: false,

	modules: {
		state: state_module,
		 
		// 
	},

})

export default store;
