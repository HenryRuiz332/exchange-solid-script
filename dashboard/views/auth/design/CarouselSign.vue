<template>
	<div>
		<div class="sign-in-detail text-white">
           <!--  <a class="sign-in-logo mb-5" href="#">
                <img src="/vendor/undraw/myapp.svg" class="img-fluid" alt="logo">
            </a> -->
            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                <div class="item" v-for="item, index in carousel" :key="index">
                    <img :src="item.src" :class="item.class" :alt="item.alt" width="300" height="300">
                    <h4 class="mb-1 text-white">{{ item.h4 }}</h4>
                    <p>{{ item.p }}</p>
                </div>
            </div>
        </div>
	</div>
</template>

<script type="text/javascript">
	export default {
        data: () => ({
    		carousel : [

    			{
    				id: 1,
    				src: '/vendors/undraw/businessman.svg',
    				class : " mb-4",
    				alt : 'Iniciar Sesión SolidScript Exchange',
    				// h4 : 'Inicia Sesión y comienza a intercambiar',
    				p : '¡Inicia Sesión y comienza a intercambiar!'
    			},
    			{
    				id: 2,
    				src: '/vendors/undraw/contract.svg',
    				class : " mb-4",
    				alt : 'Seguridad ante todo',
    				// h4 : '',
    				p : 'Tus datos estan seguros. No compartimos tu información personal.'
    			},
                {
                    id: 3,
                    src: '/vendors/undraw/register_banck_account.svg',
                    class : " mb-4",
                    alt : 'Registra cuents bancarias',
                    // h4 : '',
                    p : 'Registra al menos una cuenta bancaria, para recibir pagos.'
                },
                {
                    id: 4,
                    src: '/vendors/undraw/confianza.svg',
                    class : " mb-4",
                    alt : 'Confianza',
                    // h4 : '',
                    p : 'Nuestra empresa crece cada día en base a tu confianza.'
                },
    		
    		]      
        }),
		computed:{
           carouseles(){
           		return  this.carousel
           }
        },
        mounted:function(){
            this.carousel
        },
        methods:{
           
        }

	};
</script>
<style type="text/css">
	.sign-in-detail {
   		background:  #171923!important;
   	}

</style>