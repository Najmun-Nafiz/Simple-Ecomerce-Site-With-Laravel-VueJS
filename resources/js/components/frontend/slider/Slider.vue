<template>
		<!-- Start Slider -->
		<div id="slides-shop" class="cover-slides">
			<ul class="slides-container">

				<li class="text-center" v-for="(result, index) in sliders" :key="result.id">
					<img :src="'/uploads/slider/'+result.image" alt="">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="m-b-20 freshshop-title text-center m-auto"><strong>{{ result.title }}</strong></h1>
								<p class="m-b-40 freshshop-description m-auto">{{ result.description }}</p>
								<p><router-link to="/gallary" class="btn hvr-hover" >Shop New</router-link></p>
								<a href="#" class="btn btn-secondary" @click="addProductToCart(result)">NAJMUN</a>
							</div>
						</div>
					</div>
				</li>

			</ul>
			<div class="slides-navigation">
				<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- End Slider -->
</template>
<script>
	export default {
		name: 'Slider',

		data() {
			return {
				sliders: [],
			}
		},

		created() {
        	this.getData();  
    	},

    	methods: {
	      getData() {
	          	axios.get('/api/userslider')
	          	.then(response => {
	            	this.sliders=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},

	      	addProductToCart(result) {
                this.$emit('clicked', result);
            }
	  	}
	}
</script>