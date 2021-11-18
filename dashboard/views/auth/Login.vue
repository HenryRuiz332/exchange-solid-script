<template>
	<div>
		<section class="" >
            <div class="container bg-white mt-5 p-0"> 
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-6 align-self-center" style="margin-top: -5vw">
                        <div class="sign-in-from text-left">
                            <h1 class="mb-0" style="color:#009ADA">Iniciar Sesión</h1>
                          <!--   <p>Enter your email address and password to access admin panel.</p> -->
                            <form class="mt-4" @submit.prevent="submit" >

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
                                    <a href="#" class="float-right">¿Has olvidado tu contraseña?</a>
                                    <input 
                                        v-model="form.password"
                                        type="password" 
                                        class="form-control mb-0" 
                                        id="exampleInputPassword1" 
                                        placeholder="Mínimo 8 caracteres">
                                </div>
                                <div class="d-inline-block w-100 text-left">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1 ">
                                        <input v-model="remember" 
                                            type="checkbox" 
                                            class="custom-control-input" 
                                            id="customCheck1"
                                            @change="changeRemember">
                                        <label class="custom-control-label" for="customCheck1"  style="color:#009ADA">Recordar</label>
                                    </div>
                                    <button 
                                        :disabled="validateForm"
                                        type="submit" 
                                        class="btn btn-outline-primary float-right" 
                                        >Entrar</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">¿No tienes una cuenta? 
                                        <a href="/register" class="">Registrarse</a>
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
	import { mapActions } from 'vuex'
    import CarouselSign from "./design/CarouselSign"
	export default{
      
        components:{
            'carousel-sign' : CarouselSign
        },
    	data:() => ({
    		form: {
                email : '',
                password : '',
                token_login: ''
            },
            remember : false,
             
            pre: false
    	}),
    	computed:{
        	
        	
    	},
    	mounted(){
    		

    	},
		methods:{
            
	       	 
			changeRemember(value){
                this.remember = value
            },

	    }
};
</script>