<template>
    <!-- Start Products  -->
	<div class="products-box pb-5">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="title-all text-center">
	                    <h1>Category Wise Product</h1>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="special-menu text-center">
	                    <div class="button-group filter-button-group" v-for="(result, index) in categories" :key="result.id">
	                        <a data-filter="#'result.id'" class="btn btn-light mr-2" :class="{ 'active': activeIndex === result.id }" @click="productByCategory(result.id)">{{ result.title }}</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row special-list">

	            <div v-if="categoryWithProduct === true" class="col-lg-3 col-md-6 special-grid" v-for="(result, index) in products" :key="result.id">
	                <div class="products-single fix">
	                    <div class="box-img-hover" style="height:200px;width:100%;">
	                        <div class="type-lb">
	                            <p class="new">New</p>
	                        </div>
	                        <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
	                        <div class="mask-icon">
	                            <ul>
	                                <li><router-link :to='"/productDetail/"+ result.id' data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></router-link></li>
	                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
	                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
	                            </ul>
	                            <a class="cart" href="#">Add to Cart</a>
	                        </div>
	                    </div>
	                    <div class="why-text">
	                        <h4><router-link :to='"/productDetail/"+ result.id'>{{ result.title }}</router-link></h4>
	                        <h5> {{ result.price }}</h5>
	                    </div>
	                </div>
	            </div>

	            <div v-if="categoryWithProduct === false" class="col-lg-3 col-md-6 special-grid" v-for="(result, index) in categoryProducts" :key="result.id">
	                <div class="products-single fix">
	                    <div class="box-img-hover" style="height:200px;width:100%;">
	                        <div class="type-lb">
	                            <p class="new">New</p>
	                        </div>
	                        <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
	                        <div class="mask-icon">
	                            <ul>
	                                <li><router-link :to='"/productDetail/"+ result.id' data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></router-link></li>
	                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
	                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
	                            </ul>
	                            <a class="cart" href="#">Add to Cart</a>
	                        </div>
	                    </div>
	                    <div class="why-text">
	                        <h4><router-link :to='"/productDetail/"+ result.id'>{{ result.title }}</router-link></h4>
	                        <h5> {{ result.price }}</h5>
	                    </div>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>
	<!-- End Products  -->
</template>
<script>
    export default {
        name: 'ProductCategory',

        data() {
			return {
				activeIndex: undefined,
				categoryWithProduct: true,
				id: '',
				categories: {},
				products: {},
				categoryProducts: {},
			}
		},

		created() {
        	this.getData();  
        	this.getProduct();  
    	},

    	methods: {
	      	getData() {
	          	axios.get('/api/userCategory')
	          	.then(response => {
	            	this.categories=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},

	      	getProduct() {
	          	axios.get('/api/userProduct')
	          	.then(response => {
	            	this.products=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},


	     	productByCategory(id){
	     		this.activeIndex = id;
	     		axios.get('/api/filterProduct/'+id)
	          	.then(response => {
	            	this.categoryProducts=response.data;
	     			this.categoryWithProduct = false;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	}
	  	}
    }
</script>
