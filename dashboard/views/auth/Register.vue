<template>
	<div>
       <!--  sign-in-page -->
		<section class="" >
            <div class="container bg-white mt-5 p-0"> 
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-6 align-self-center" style="margin-top: -5vw">
                        <div class="sign-in-from text-left">
                            <h1 class="mb-0" style="color:#009ADA">Registrarse</h1>
                          <!--   <p>Enter your email address and password to access admin panel.</p> -->
                            <form class="mt-4" @submit.prevent="register" >
                                <div class="form-group text-left">
                                    <label for="exampleInputEmail1" class="mr-auto"  style="color:#009ADA">Nombre Completo</label>
                                    <input 
                                        v-model="form.name"
                                        type="text" 
                                        class="form-control mb-0" 
                                        id="exampleInputEmail1" 
                                        placeholder="Nombre completo">
                                </div>
                                <div class="form-group text-left">
                                    <label for="exampleInputEmail1" class="mr-auto"  style="color:#009ADA">Email</label>
                                    <input 
                                        v-model="form.email"
                                        type="email" 
                                        class="form-control mb-0" 
                                        id="exampleInputEmail1" 
                                        placeholder="Correo Electrónico">
                                </div>
                               
                                <div class="form-group text-left">
                                    <label for="exampleInputPassword1"  style="color:#009ADA">Contraseña</label>
                                    <input 
                                        v-model="form.password"
                                        type="password" 
                                        class="form-control mb-0" 
                                        id="exampleInputPassword1" 
                                        placeholder="Contraseña">
                                </div>
                                 <div class="form-group text-left">
                                    <label for="exampleInputPassword1"  style="color:#009ADA">Confirmar Contraseña</label>
                                    <input 
                                        v-model="form.passwordConfirm"
                                        type="password" 
                                        class="form-control mb-0" 
                                        id="exampleInputPassword1" 
                                        placeholder="Confirmar Contraseña">
                                </div>
                                <div class="d-inline-block w-100 text-left">
                                    <button 
                                        :disabled="validateForm"
                                      
                                        class="btn btn-outline-primary float-right" 
                                        >Enviar</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Ya tengo una cuenta 
                                        <a href="/login" class="">Entrar</a>
                                    </span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="https://www.instagram.com/"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 text-center">
                         <carousel-sign></carousel-sign>
                    </div>
                    <preload v-if="pre"></preload>
                </div>
            </div>
        </section>
	</div>
</template>
 
<script> 
	
    import CarouselSign from "./design/CarouselSign"
	export default{
      
        components:{
            'carousel-sign' : CarouselSign
        },
    	data:() => ({
    		form: {
                name: '',
                email : '',
                password : '',
               
           },
            remember : false,
             validateForm: false,
            pre: false
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
                

            register(){
                this.pre = true
                axios.post('/register',  this.form)
                .then(response => {
                    axios.get('/get/user').then((response) => {
                     
                       
                        let token =  response.data.token_login
                        localStorage.setItem('session_app', token)
                        localStorage.setItem('ID', response.data.id)
                        let redirect = window.location.origin + '/my-account/dashboard/'+ token 
                        window.location.replace(redirect);
                       

                    }).catch(() => {
                       
                    })
                   
   
          })
          .catch(e => {
                this.pre = false
               alert("these credentials do not match our records")
          })
            }

	    }
};
</script>