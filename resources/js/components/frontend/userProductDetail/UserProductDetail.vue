<template>
	<div>
		<app-header :carts="carts"/>

		<!-- Start All Title Box -->
	    <div class="all-title-box">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h2>Shop Detail</h2>
	                    <ul class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
	                        <li class="breadcrumb-item active">Shop Detail </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End All Title Box -->
	    <!-- Start Shop Detail  -->
	    <div class="shop-detail-box-main">
	        <div class="container">
	            <div class="row">
		                <div class="col-xl-5 col-lg-5 col-md-6">
		                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
		                        <div class="carousel-inner" role="listbox">
		                            <div class="carousel-item active"> 
		                            	<img class="d-block w-100" :src="'/uploads/product/'+productDetails.image1" style="height:350px;width:100%;" alt="First slide"> 
		                            </div>
		                            <div class="carousel-item"> 
		                            	<img class="d-block w-100" :src="'/uploads/product/'+productDetails.image2" style="height:350px;width:100%;" alt="Second slide"> 
		                            </div>
		                            <div class="carousel-item"> 
		                            	<img class="d-block w-100" :src="'/uploads/product/'+productDetails.image3" style="height:350px;width:100%;" alt="Third slide"> 
		                            </div>
		                        </div>
		                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
								<i class="fa fa-angle-left" aria-hidden="true"></i>
								<span class="sr-only">Previous</span> 
								</a>
		                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
								<i class="fa fa-angle-right" aria-hidden="true"></i> 
								<span class="sr-only">Next</span> 
								</a>
		                        <ol class="carousel-indicators">
		                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
		                                <img class="d-block w-100 img-fluid" :src="'/uploads/product/'+productDetails.image1" alt="" style="height:65px;width:100%;">
		                            </li>
		                            <li data-target="#carousel-example-1" data-slide-to="1">
		                                <img class="d-block w-100 img-fluid" :src="'/uploads/product/'+productDetails.image2" alt="" style="height:65px;width:100%;">
		                            </li>
		                            <li data-target="#carousel-example-1" data-slide-to="2">
		                                <img class="d-block w-100 img-fluid" :src="'/uploads/product/'+productDetails.image3" alt="" style="height:65px;width:100%;">
		                            </li>
		                        </ol>
		                    </div>
		                </div>
		                <div class="col-xl-7 col-lg-7 col-md-6">
		                    <div class="single-product-details">
		                        <h2>{{ productDetails.title }}</h2>
		                        <h5>$ {{ productDetails.price }}</h5>
		                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span><p>
								<h4>Description:</h4>
								<p>{{ productDetails.description }}</p>
								<ul>
									<li>
										<div class="form-group quantity-box">
											<label class="control-label">Quantity</label>
											<input class="form-control" value="0" min="0" max="20" type="number">
										</div>
									</li>
								</ul>

								<div class="price-box-bar">
									<div class="cart-and-bay-btn">
										<a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
										<a class="btn hvr-hover" data-fancybox-close="" href="#" @click="addProductToCart(productDetails)">Add to cart</a>
									</div>
								</div>

								<div class="add-to-btn">
									<div class="add-comp">
										<a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
										<a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
									</div>
									<div class="share-bar">
										<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
										<a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
										<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
										<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
										<a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
									</div>
								</div>
		                    </div>
		                </div>
	            </div>

	            <div class="row my-5 pt-5">
	                <div class="col-lg-12">
	                    <div class="title-all text-center">
	                        <h1>Update Products</h1>
	                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
	                    </div>
	                </div>
	                <div class="col-lg-3 col-md-6 special-grid"  v-for="(result, index) in products" :key="result.id">
			                <div class="products-single fix">
			                    <div class="box-img-hover" style="height:200px;width:100%;">
			                        <div class="type-lb">
			                            <p class="new">New</p>
			                        </div>
			                        <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
			                        <div class="mask-icon">
			                            <ul>
			                                <li><a @click.prevent="categoryByProduct(result.id)" href="" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
			                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
			                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
			                            </ul>
			                            <a class="cart" href="#" @click="addProductToCart(result)">Add to Cart</a>
			                        </div>
			                    </div>
			                    <div class="why-text">
			                        <h4><a @click.prevent="categoryByProduct(result.id)" href="">{{ result.title }}</a></h4>
			                        <h5> {{ result.price }}</h5>
			                    </div>
			                </div>
			            </div>
	            </div>

	        </div>
	    </div>
	    <!-- End Cart -->
	    <app-footer/>
	</div>
</template>
<script>
	import Header from '../partial/Header';
    import Footer from '../partial/Footer';
    export default {
        name: 'UserProductDetail',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
			return {
				Id: this.$route.params.id,
				category_id: null,
				productDetails: '',
				products: {},
				carts: []
			}
		},

        created() {
            this.getData();
            // this.getProduct();
        },

        methods: {
        	getData() {
              axios.get('/api/productDetail/'+this.Id)
                  .then(response => {
                  	this.productDetails=response.data;
                  	this.category_id=response.data.category_id;
                  	$(window).scrollTop(0);
                  	this.getProduct();
                  })

                  .catch(e => {
                     console.log('error..');
                  })        
            },

        	getProduct() {
	          	axios.get('/api/categoryWithProducts/'+ this.category_id)
	          	.then(response => {
	            	this.products=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},

	      	categoryByProduct(id) {
	      		axios.get('/api/productDetail/'+ id)
                .then(response => {
                    this.productDetails=response.data;
                    this.category_id=response.data.category_id;
                    $(window).scrollTop(0);
                    this.getProduct();
                })

                .catch(e => {
                    console.log(e);
                })
	      	},

	      	addProductToCart(result) {
                this.carts.push(result);
                // this.$emit('clicked', result);
            }
        }
    }
</script>
