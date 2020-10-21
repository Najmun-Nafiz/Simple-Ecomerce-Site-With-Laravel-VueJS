<template>
    <div>
    	<app-header/>
        <!-- Start All Title Box -->
	    <div class="all-title-box">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h2>CheckOut</h2>
	                    <ul class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Home</a></li>
	                        <li class="breadcrumb-item active">CheckOut</li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End All Title Box -->
	    <!-- Start Cart  -->
	    <div class="cart-box-main">
	        <div class="container">
	            <div class="row new-account-login">
	                <div class="col-sm-6 col-lg-6 mb-3">
	                    <form class="mt-3 collapse review-form-box" id="formLogin">
	                        <div class="form-row">
	                            <div class="form-group col-md-6">
	                                <label for="InputEmail" class="mb-0">Email Address</label>
	                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
	                            <div class="form-group col-md-6">
	                                <label for="InputPassword" class="mb-0">Password</label>
	                                <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
	                        </div>
	                        <button type="submit" class="btn hvr-hover">Login</button>
	                    </form>
	                </div>
	                <div class="col-sm-6 col-lg-6 mb-3">
	                    <form class="mt-3 collapse review-form-box" id="formRegister">
	                        <div class="form-row">
	                            <div class="form-group col-md-6">
	                                <label for="InputName" class="mb-0">First Name</label>
	                                <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
	                            <div class="form-group col-md-6">
	                                <label for="InputLastname" class="mb-0">Last Name</label>
	                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
	                            <div class="form-group col-md-6">
	                                <label for="InputEmail1" class="mb-0">Email Address</label>
	                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
	                            <div class="form-group col-md-6">
	                                <label for="InputPassword1" class="mb-0">Password</label>
	                                <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
	                        </div>
	                        <button type="submit" class="btn hvr-hover">Register</button>
	                    </form>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-6 col-lg-6 mb-3">
	                    <div class="checkout-address">
	                        <div class="title-left">
	                            <h3>Billing address</h3>
	                        </div>
	                        <form class="needs-validation" novalidate="">
	                            <div class="row">
	                                <div class="col-md-6 mb-3">
	                                    <label for="firstName">First name *</label>
	                                    <input type="text" v-model="form.firstName" class="form-control" id="firstName" placeholder="Enter first-name" value="" required="">
	                                    <div class="invalid-feedback"> Valid first name is required. </div>
	                                </div>
	                                <div class="col-md-6 mb-3">
	                                    <label for="lastName">Last name *</label>
	                                    <input type="text" v-model="form.lastName" class="form-control" id="lastName" placeholder="Enter last-name" value="" required="">
	                                    <div class="invalid-feedback"> Valid last name is required. </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <label for="userName">Username *</label>
	                                <div class="input-group">
	                                    <input type="text" v-model="form.userName" class="form-control" id="userName" placeholder="Enter username" required="">
	                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <label for="email">Email Address *</label>
	                                <input type="email" v-model="form.phone" class="form-control" id="email" placeholder="Enter email">
	                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
	                            </div>
	                            <div class="mb-3">
	                                <label for="mobile">Mobile Number *</label>
	                                <input type="number" v-model="form.phone" class="form-control" id="mobile" placeholder="Enter mobile number">
	                                <div class="invalid-feedback"> Please enter a valid mobile address for shipping updates. </div>
	                            </div>
	                            <div class="mb-3">
	                                <label for="address1">Address *</label>
	                                <input type="text" v-model="form.address1" class="form-control" id="address1" placeholder="Enter address-1" required="">
	                                <div class="invalid-feedback"> Please enter your shipping address. </div>
	                            </div>
	                            <div class="mb-3">
	                                <label for="address2">Address 2 *</label>
	                                <input type="text" v-model="form.address2" class="form-control" id="address2" placeholder="Enter address-2"> 
	                            </div>
	                            
	                            <hr class="mb-4">
	                            
	                            <hr class="mb-4">
	                            <div class="title"> <span>Payment</span> </div>
	                            <div class="d-block my-3">
	                                <div class="custom-control custom-radio">
	                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" @click="cardTransfer">
	                                    <label class="custom-control-label" for="credit">Credit card</label>
	                                </div>
	                                <div class="custom-control custom-radio">
	                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" @click="cardTransfer">
	                                    <label class="custom-control-label" for="debit">Debit card</label>
	                                </div>
	                                <div class="custom-control custom-radio">
	                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" @click="cardTransfer">
	                                    <label class="custom-control-label" for="paypal">Paypal</label>
	                                </div>
	                                <div class="custom-control custom-radio">
	                                    <input id="hand" name="paymentMethod" type="radio" class="custom-control-input" required="" @click="handCash">
	                                    <label class="custom-control-label" for="hand">Hand cash</label>
	                                </div>
	                            </div>
	                            <div id="transferField">
	                            	<div class="row">
	                                <div class="col-md-6 mb-3">
	                                    <label for="cc-name">Name on card</label>
	                                    <input type="text" class="form-control" id="cc-name" placeholder="Enter name" required=""> <small class="text-muted">Full name as displayed on card</small>
	                                    <div class="help-block with-errors"></div>
	                                </div>
	                                <div class="col-md-6 mb-3">
	                                    <label for="cc-number">Credit card number</label>
	                                    <input type="text" class="form-control" id="cc-number" placeholder="Enter credit number" required="">
	                                    <div class="invalid-feedback"> Credit card number is required </div>
	                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-3 mb-3">
		                                    <label for="cc-expiration">Expiration</label>
		                                    <input type="text" class="form-control" id="cc-expiration" placeholder="Expire date" required="">
		                                    <div class="invalid-feedback"> Expiration date required </div>
		                                </div>
		                                <div class="col-md-3 mb-3">
		                                    <label for="cc-expiration">CVV</label>
		                                    <input type="text" class="form-control" id="cc-cvv" placeholder="Enter cvv" required="">
		                                    <div class="invalid-feedback"> Security code required </div>
		                                </div>
		                                <div class="col-md-6 mb-3">
		                                    <div class="payment-icon">
		                                        <ul>
		                                            <li><img class="img-fluid" :src="'frontend/images/payment-icon/1.png'" alt=""></li>
		                                            <li><img class="img-fluid" :src="'frontend/images/payment-icon/2.png'" alt=""></li>
		                                            <li><img class="img-fluid" :src="'frontend/images/payment-icon/3.png'" alt=""></li>
		                                            <li><img class="img-fluid" :src="'frontend/images/payment-icon/5.png'" alt=""></li>
		                                            <li><img class="img-fluid" :src="'frontend/images/payment-icon/7.png'" alt=""></li>
		                                        </ul>
		                                    </div>
		                                </div>
		                            </div>
	                            </div>
	                            
	                            <hr class="mb-1"> 
	                        </form>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-lg-6 mb-3">
	                    <div class="row">
	                       <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $80.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $80.00</div>
                                        </div>
                                    </div>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $60.00</div>
                                        </div>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $40.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	                        <div class="col-md-12 col-lg-12">
	                            <div class="order-box">
	                                <div class="title-left">
	                                    <h3>Your order</h3>
	                                </div>
	                                <div class="d-flex">
	                                    <div class="font-weight-bold">Product</div>
	                                    <div class="ml-auto font-weight-bold">Total</div>
	                                </div>
	                                <hr class="my-1">
	                                <div class="d-flex">
	                                    <h4>Sub Total</h4>
	                                    <div class="ml-auto font-weight-bold"> $ 440 </div>
	                                </div>
	                                <div class="d-flex">
	                                    <h4>Discount</h4>
	                                    <div class="ml-auto font-weight-bold"> $ 40 </div>
	                                </div>
	                                <hr class="my-1">
	                                <div class="d-flex">
	                                    <h4>Coupon Discount</h4>
	                                    <div class="ml-auto font-weight-bold"> $ 10 </div>
	                                </div>
	                                <div class="d-flex">
	                                    <h4>Tax</h4>
	                                    <div class="ml-auto font-weight-bold"> $ 2 </div>
	                                </div>
	                                <div class="d-flex">
	                                    <h4>Shipping Cost</h4>
	                                    <div class="ml-auto font-weight-bold"> Free </div>
	                                </div>
	                                <hr>
	                                <div class="d-flex gr-total">
	                                    <h5>Grand Total</h5>
	                                    <div class="ml-auto h5"> $ 388 </div>
	                                </div>
	                                <hr> </div>
	                        </div>
	                        <div class="col-12 d-flex shopping-box"> <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> </div>
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
        name: 'CheckOut',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
        	return {
        		form: new Form ({
        			id: '',
        			firstName: '',
        			lastName: '',
        			userName: '',
        			email: '',
        			phone: '',
        			address1: '',
        			address2: '',
        		})
        	}
        },

        methods: {
        	handCash(){
        		$('#transferField').hide();
        	},

        	cardTransfer(){
        		$('#transferField').show();
        	}
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
