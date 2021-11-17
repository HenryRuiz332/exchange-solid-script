<template>

	<nav aria-label="...">
		<ul class="pagination justify-content-center">
			<li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">
				<a class="page-link" @click.prevent="changePage(1)"><<
				</a>
			</li>


			<li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">
				<a class="page-link" @click.prevent="changePage(pagination.current_page -1)"> <
				</a>
			</li>

			<li class="page-item" v-for="page in pages" :key="page" :class="isCurrentPage(page) ? 'active' : '' ">
				<a class="page-link" @click.prevent="changePage(page)">
					{{page}}
					<span v-if="isCurrentPage(page)" class="sr-only">(Actual)</span>
				</a>
			</li>

			<li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">
				<a class="page-link" @click.prevent="changePage(pagination.current_page + 1)"> >
				</a>
			</li>

			<li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">
				<a class="page-link" @click.prevent="changePage(pagination.last_page)">>>
				</a>
			</li>

		</ul>
	</nav>

</template>

<script>
    export default {
    	props:['pagination', 'offset'],
    	methods:{
    		isCurrentPage(page){
    			return this.pagination.current_page === page
    		},
    		changePage(page){
    			if (page > this.pagination.last_page) {
    				page = this.pagination.last_page;
    			}
    			this.pagination.current_page = page;
    			this.$emit('paginate');
    		}
    	},
    	computed:{
    		pages(){
    			let pages = []

    			let from = this.pagination.current_page - Math.floor(this.offset / 2)

    			if (from < 1) {
    				from = 1
    			}

    			let to = from + this.offset - 1

    			if (to > this.pagination.last_page) {
    				to = this.pagination.last_page
    			}


    			while (from <= to) {
    				pages.push(from)
    				from++
    			}

    			return pages
    		}
    	}


    };
</script>

<style>
	.page-link{
		color: #000!important;
	}
	/*.pagination li .page-link{
		background: #343A40!important;
		border: 0px solid #f9c91a!important ;
	}
	*/
	
	.page-item.active .page-link {
	    z-index: 3;
	    color: #000;
	    background-color: #009ADA!important;
	    border-color: #009ADA;
	    cursor:  auto;

	}
	.page-item .page-link {
		cursor: pointer;
	}
</style>
