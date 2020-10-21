<template>
    <div>
       <!-- Start Footer  -->
	    <footer>
	        <div class="footer-main" style="z-index: 9999999999;">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-4 col-md-12 col-sm-12">
	                        <div class="footer-top-box">
	                            <h3>Business Time</h3>
	                            <ul class="list-time">
	                                <li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="col-lg-4 col-md-12 col-sm-12">
	                        <div class="footer-top-box">
	                            <h3>Newsletter</h3>
	                            <form class="newsletter-box">
	                                <div class="form-group">
	                                    <input class="" type="email" name="Email" placeholder="Email Address*">
	                                    <i class="fa fa-envelope"></i>
	                                </div>
	                                <button class="btn hvr-hover" type="submit">Subscribe</button>
	                            </form>
	                        </div>
	                    </div>
	                    <div class="col-lg-4 col-md-12 col-sm-12">
	                        <div class="footer-top-box">
	                            <h3>Social Media</h3>
	                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	                            <ul>
	                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </footer>
	    <!-- End Footer  -->

	    <!-- Start copyright  -->
	    <div class="footer-copyright">
	        <p class="footer-company">All Rights Reserved. &copy; 2020 <a href="#">FreshShop</a> Design By :
	            <a href="#" title="Free Website templates">Najmun Nafiz</a></p>
	    </div>
	    <!-- End copyright  -->

	    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    </div>
</template>
<script>
    export default {
        name: 'Footer',

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
