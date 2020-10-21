<template>
    <div> 
	    <!-- Start Main Top -->
	    <header class="main-header"> 
	        <!-- Start Navigation -->
	        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav navber-height">
	            <div class="container">
	                <!-- Start Header Navigation -->
	                <div class="navbar-header">
	                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
	                        <i class="fa fa-bars"></i>
	                    </button>
	                    <a class="navbar-brand mb-2" :href="'/'"><img :src="'/frontend/images/logo.png'" class="logo" alt=""></a>
	                </div>
	                <!-- End Header Navigation -->

	                <div class="collapse navbar-collapse" id="navbar-menu">
	                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
	                        <li class="nav-item active">
	                            <a :href="'/'" class="nav-link">Home</a>
	                        </li>
	                        <li class="nav-item">
	                            <router-link to="/aboutUs" class="nav-link">About Us</router-link>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
	                                SHOP Category
	                                <i class="fas fa-angle-down pl-1"></i>
	                            </a>
	                            <ul class="dropdown-menu pt-1">

	                                <li v-for="(result, index) in categories" :key="result.id"><router-link :to='"/shopPage/"+ result.category_id'>{{ result.title }}</router-link></li>

	                            </ul>
	                        </li>
	                        <li class="nav-item">
	                            <router-link to="/gallary" class="nav-link">Gallary</router-link>
	                        </li>
	                        <li class="nav-item">
	                            <router-link to="/checkOut" class="nav-link">Checkout</router-link>
	                        </li>
	                        <li class="nav-item">
	                            <router-link to="/contactUs" class="nav-link">Contact-Us</router-link>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /.navbar-collapse -->

	                <!-- Start Atribute Navigation -->
	                <div class="attr-nav">
	                    <ul>
	                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
	                        <li class="side-menu">
	                            <router-link to="/userCart">
	                                <i class="fa fa-shopping-bag"></i>
	                                <span class="badge" v-for="(result, index) in carts" :key="index">{{ index+1 }}</span>
	                                <p>My Cart</p>
	                            </router-link>
	                        </li>
	                    </ul>
	                </div>
	                <!-- End Atribute Navigation -->
	            </div>
	            
	        </nav>
	        <!-- End Navigation -->
	    </header>
	    <!-- End Main Top -->

	    <!-- Start Top Search -->
	    <div class="top-search">
	        <div class="container">
	            <div class="input-group">
	                <span class="input-group-addon"><i class="fa fa-search"></i></span>
	                <input type="text" class="form-control" placeholder="Search">
	                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
	            </div>
	        </div>
	    </div>
	    <!-- End Top Search -->
    </div>

</template>
<script>
    export default {
        name: 'Header',

        props: {
            carts: {
                type: Array,
                require: true
            }
        },

        data() {
        	return {
        		categories: {},
        		cart: {},
        		msg: 'NAJMUN'
        	}
        },

        created() {
        	this.getData();  
      	},

        methods: {
	      	getData() {
	          	axios.get('/api/userCategoryProduct')
	          	.then(response => {
		            this.categories=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},
	    },

	   //   watch: {
		  //   msg: function() {
		  //     this.cart.push(this.msg);
		  //   }
	  	// }
    }
</script>
