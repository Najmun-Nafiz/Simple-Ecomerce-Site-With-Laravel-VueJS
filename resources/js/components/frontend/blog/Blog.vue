<template>
    <!-- Start Blog  -->
	<div class="latest-blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-all text-center">
						<h1>latest blog</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-md-6 col-lg-4 col-xl-4" v-for="(result, index) in blogs" :key="result.id">
					<div class="blog-box">
						<div class="blog-img">
							<img class="img-fluid" :src="'/uploads/blog/'+result.image" style="height:200px;width:100%;" alt="">
						</div>
						<div class="blog-content">
							<div class="title-blog">
								<h3><router-link :to='"/blogDetail/"+ result.id'>{{ result.title }}</router-link></h3>
								<p>{{ result.description }}</p>
							</div>
							<ul class="option-blog">
								<li><a href="#"><i class="far fa-heart"></i></a></li>
								<li><router-link :to='"/blogDetail/"+ result.id'><i class="fas fa-eye"></i></router-link></li>
								<li><a href="#"><i class="far fa-comments"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Blog  -->
</template>
<script>
    export default {
        name: 'Blog',

        data() {
			return {
				blogs: {},
			}
		},

		created() {
            this.getData();
        },

        methods: {
        	getData() {
              axios.get('/api/userBlog/')
                  .then(response => {
                  	this.blogs=response.data;
                  })

                  .catch(e => {
                     console.log('error..');
                  })        
            },
        }
    }
</script>
