<template>
    <div>
        <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>BLOGS</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">BLOGS</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame blog-image"> 
                    	<img class="img-fluid" :src="'/uploads/blog/'+blogDetails.image" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="noo-sh-title-top">{{ blogDetails.title }}</h3>
                    <p>{{ blogDetails.description }}</p>
                </div>
            </div>

            <div class="row my-5 pt-5">
	                <div class="col-lg-12">
	                    <div class="title-all text-center">
	                        <h1>Update Blogs</h1>
	                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
	                    </div>
	                </div>
	                <div class="col-md-6 col-lg-3 col-xl-3" v-for="(result, index) in blogs" :key="result.id">
					<div class="blog-box">
						<div class="blog-img">
							<img class="img-fluid" :src="'/uploads/blog/'+result.image" style="height:200px;width:100%;" alt="">
						</div>
						<div class="blog-content">
							<div class="title-blogs p-2">
								<a @click.prevent="categoryByBlog(result.id)" href=""><h2>{{ result.title }}</h2></a>
								<p class="pb-3">{{ result.description }}</p>
							</div>
							<ul class="option-blog">
								<li><a href="#"><i class="far fa-heart"></i></a></li>
								<li><a @click.prevent="categoryByBlog(result.id)" href="#"><i class="fas fa-eye"></i></a></li>
								<li><a href="#"><i class="far fa-comments"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
	        </div>
        </div>
    </div>
    <!-- End About Page -->
    </div>
</template>
<script>
    export default {
        name: 'UserBlogDetail',

        data() {
			return {
				Id: this.$route.params.id,
				blogDetails: '',
				blogs: {},
			}
		},

		created() {
            this.getData();
            this.getBlogs();
        },

        methods: {
        	getData() {
              axios.get('/api/blogDetail/'+this.Id)
                  .then(response => {
                  	this.blogDetails=response.data;
                  	$(window).scrollTop(0);
                  })

                  .catch(e => {
                     console.log('error..');
                  })        
            },

            getBlogs() {
	          	axios.get('/api/userUpdateBlog')
	          	.then(response => {
	            	this.blogs=response.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	},

	      	categoryByBlog(id) {
	      		axios.get('/api/blogDetail/'+ id)
                .then(response => {
                    this.blogDetails=response.data;
                    $(window).scrollTop(0);
                })

                .catch(e => {
                    console.log(e);
                })
	      	}
        }
    }
</script>
