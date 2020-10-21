<template>
	<div>
		<app-header/>
		<!-- Start All Title Box -->
	    <div class="all-title-box">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h2>Contact Us</h2>
	                    <ul class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Home</a></li>
	                        <li class="breadcrumb-item active"> Contact Us </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End All Title Box -->
		
	    <!-- Start Contact Us  -->
	    <div class="contact-box-main">
	        <div class="container">
	            <div class="row" v-for="(result, index) in userContact" :key="result.id" >
	                <div class="col-lg-8 col-sm-12">
	                    <div class="contact-form-right">
	                        <h2>GET IN TOUCH</h2>
	                        <p>{{ result.touch_description }}</p>
	                        <form id="contactForm" @submit.prevent="sendData()" @keydown="form.onKeydown($event)">
	                        <!--  -->
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <div class="form-group">
	                                        <input type="text" v-model="form.title" class="form-control" id="title" name="title" placeholder="Your Name" required="" data-error="Please enter your title">
	                                        <div class="help-block with-errors"></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="form-group">
	                                        <input type="email" v-model="form.email" placeholder="Your Email" id="email" class="form-control" name="email" required="" data-error="Please enter your email">
	                                        <div class="help-block with-errors"></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="form-group">
	                                        <input type="number" v-model="form.phone" placeholder="Your Phone" id="phone" class="form-control" name="phone" required="" data-error="Please enter your phone">
	                                        <div class="help-block with-errors"></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="form-group">
	                                        <input type="text" v-model="form.subject" class="form-control" id="subject" name="subject" placeholder="Subject" required="" data-error="Please enter your Subject">
	                                        <div class="help-block with-errors"></div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                    <div class="form-group">
	                                        <textarea class="form-control" v-model="form.message" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required=""></textarea>
	                                        <div class="help-block with-errors"></div>
	                                    </div>
	                                    <div class="submit-button text-center">
	                                        <button class="btn hvr-hover" id="submit" type="submit">Send Message</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
					<div class="col-lg-4 col-sm-12">
	                    <div class="contact-info-left">
	                        <h2>{{ result.title }}</h2>
	                        <p>{{ result.description }}</p>
	                        <ul>
	                            <li>
	                                <p><i class="fas fa-map-marker-alt"></i>Address: <a href="#">{{ result.address }}</a></p>
	                            </li>
	                            <li>
	                                <p><i class="fas fa-phone-square"></i>Phone: <a href="#">{{ result.phone }}</a></p>
	                            </li>
	                            <li>
	                                <p><i class="fas fa-envelope"></i>Email: <a href="#">{{ result.email }}</a></p>
	                            </li>
	                        </ul>
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
        name: 'ContactUs',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
            return {
	            userContact: {},           	
	            form: new Form({
		            id: '',
		            title: '',
		            email: '',
		            phone: '',
		            subject: '',
		            message: '',
		            status: ''
	            })
	        }
        },

        created() {
            this.getData();  
        },

        methods: {
        	getData() {
                axios.get('/api/userContact')
                .then(response => {
                    this.userContact=response.data;
                })
                .catch(e => {
                    console.log('error..');
                })
            },

            sendData() {
                this.form.post('/api/message')
                .then(response => {
                	if(this.form.successful){
                		this.form.reset();
                		this.form.clear();
                        toastr.success('Successfully message sent.', 'Success')
                    }
                })
                .catch(e => {
                    toastr.error('Something is missing...!', 'Prepare to die!')
                })
            },
        },

    }
</script>
