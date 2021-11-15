<template>
	<div>
		<div class="sign-in-detail text-white">
           <!--  <a class="sign-in-logo mb-5" href="#">
                <img src="/vendor/undraw/myapp.svg" class="img-fluid" alt="logo">
            </a> -->
            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                <div class="item" v-for="item, index in carousel" :key="index">
                    <img :src="item.src" :class="item.class" :alt="item.alt" width="222">
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
    				src: '/vendors/undraw/myapp.svg',
    				class : "img-fluid mb-4",
    				alt : 'Sing in Prueba 789',
    				h4 : 'Sign In Prueba 789 App',
    				p : ''
    			},
    			{
    				id: 2,
    				src: '/vendors/undraw/newsletter.svg',
    				class : "img-fluid mb-4",
    				alt : 'Sing in Prueba 789',
    				h4 : 'Sign In Prueba 789 App',
    				p : ''
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
   		background:  #009ADA!important;
   	}

</style>