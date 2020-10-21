<template>
    <!-- Start Categories  -->
	<div class="categories-shop">
		<div class="container">
			<div class="row">
	            <div class="col-lg-12">
	                <div class="title-all text-center">
	                    <h1>Seletc Categories</h1>
	                </div>
	            </div>
	        </div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" v-for="(result, index) in categoryProducts" :key="result.id">
					<div class="shop-cat-box">
						<img class="img-fluid categoryProduct-image" :src="'/uploads/categoryProduct/'+result.image" alt="">
						<router-link :to='"/shopPage/"+ result.category_id' class="btn hvr-hover">{{ result.title }}</router-link>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Categories -->
</template>
<script>
    export default {
        name: 'CategoryProduct',

        data() {
        	return {
        		categoryProducts: {},
        	}
        },

        created() {
        	this.getData();  
      	},

        methods: {
	      	getData() {
	          	axios.get('/api/userCategoryProduct')
	          	.then(response => {
		            this.categoryProducts=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},
	    }
    }
</script>
