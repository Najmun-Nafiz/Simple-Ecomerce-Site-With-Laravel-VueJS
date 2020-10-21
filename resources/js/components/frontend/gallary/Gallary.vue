<template>
   <div>
        <app-header/>
        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Gallary</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gallary</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

         <!-- Start Gallery  -->
    <div class="products-box pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Our Gallery</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group" v-for="(result, index) in categories" :key="result.id">

                            <button class="bg-button-gallery mr-2" @click="productByCategory(result.id)">{{ result.title }}</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">

                <div  v-if="categoryWithProduct === true" class="col-lg-3 col-md-6 special-grid fruits" v-for="(result, index) in galleries" :key="result.id">
                    <div class="products-single fix">
                        <div class="box-img-hover" style="height:200px;width:100%;">
                            <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
                            <div class="mask-icon">
                                <ul>
                                    <li><router-link :to='"/productDetail/"+ result.id' data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></router-link></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add To Cart</a>
                            </div>
                        </div>                        
                    </div>
                </div>

                <div v-if="categoryWithProduct === false" class="col-lg-3 col-md-6 special-grid fruits" v-for="(result, index) in categoryProducts" :key="result.id">
                    <div class="products-single fix">
                        <div class="box-img-hover" style="height:200px;width:100%;">
                            <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
                            <div class="mask-icon">
                                <ul>
                                    <li><router-link :to='"/productDetail/"+ result.id' data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></router-link></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add To Cart</a>
                            </div>
                        </div>                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Gallery  -->
    <app-footer/>
  </div>

</template>
<script>
    import Header from '../partial/Header';
    import Footer from '../partial/Footer';
    export default {
        name: 'Gallary',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
            return {
                categoryWithProduct: true,
                categories: {},
                galleries: {},
                categoryProducts: {},
            }
        },

        created() {
            this.getData();  
            this.getGallery();  
        },

        methods: {
            getData() {
                axios.get('/api/userCategory')
                .then(response => {
                    this.categories=response.data;
                    $(window).scrollTop(0);
                })
                .catch(e => {
                    console.log('error..');
                })
            },

            getGallery() {
                axios.get('/api/userGallery')
                .then(response => {
                    this.galleries=response.data;
                })
                .catch(e => {
                    console.log('error..');
                })
            },


            productByCategory(id){
                axios.get('/api/galleryFilterProduct/'+id)
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
