const state_module = {
	strict: false,

	state: {
		isOk : false,
		is_loading: false,

		auth:false,

		user: {
			name: '...',
			role: 0,
			email:'',
			id: '',
		},

		errors:{
			errors:{

			}
		}

	},

	getters: {
		getloading: state => state.is_loading,

		getResponse: state => state.isOk,

		geterrors: state =>  state.errors,

		getuser: state => state.user,

		getauth: state => state.auth
	},

	mutations: {
		is_loading: (state, status) => state.is_loading = status,

		isOk: (state, isOk) => state.isOk = isOk,

		is_errors: (state, errors) =>	state.errors = errors,

		user: (state, user) => state.user = user,

		auth: (state, status) => state.auth = status
	},

	actions: {
		isLoading: (context, status) => context.commit('is_loading', status),

		isOk: (context, isOk) => context.commit('isOk', isOk),

		setErrors: (context, errors) => context.commit('is_errors', errors),

		setUser: (context, user) => context.commit('user', user),

		setAuth: (context, status) => context.commit('auth', status)		
	}
}

export default state_module;
