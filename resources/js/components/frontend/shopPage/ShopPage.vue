<template>
    <div>
        <app-header/>
        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Shop</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start Shop Page  -->
        <div class="shop-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                        <div class="right-product-box">
                            <div class="product-item-filter row">
                                <div class="col-12 col-sm-8 text-center text-sm-left">
                                    <div class="toolbar-sorter-right">
                                        <span>Sort by </span>
                                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">High Price → High Price</option>
                                        <option value="3">Low Price → High Price</option>
                                        <option value="4">Best Selling</option>
                                    </select>
                                    </div>
                                    <p>Showing all 4 results</p>
                                </div>
                                <div class="col-12 col-sm-4 text-center text-sm-right">
                                    <ul class="nav nav-tabs ml-auto">
                                        <li>
                                            <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product-categorie-box">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                        <div class="row">

                                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" v-for="(result, index) in products" :key="result.id">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover" style="height:200px;width:100%;">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img :src="'/uploads/product/'+result.image1" style="height:100%;width:100%;" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>
                                                            <a class="cart" href="#" @click="addProductToCart(result)">Add to Cart</a>
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

                                    <div role="tabpanel" class="tab-pane fade" id="list-view">
                                        <div class="list-view-box" v-for="(result, index) in products" :key="result.id">
                                            <div class="row">

                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover" style="height:200px;width:100%;">
                                                            <div class="type-lb">
                                                                <p class="new">New</p>
                                                            </div>
                                                            <img :src="'/uploads/product/'+result.image1" class="img-fluid" alt="Image" style="height:100%;width:100%;">
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4><router-link :to='"/productDetail/"+ result.id'>{{ result.title }}</router-link></h4>
                                                        <h5> {{ result.price }}</h5>
                                                        <p>{{ result.description }}</p>
                                                        <a class="btn hvr-hover" href="#" @click="addProductToCart(result)">Add to Cart</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Siderar Category Section Start Here... -->
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                        <div class="product-categori">
                            <div class="search-product">
                                <form action="#">
                                    <input class="form-control" placeholder="Search here..." type="text">
                                    <button type="submit"> <i class="fa fa-search"></i> </button>
                                </form>
                            </div>
                            <div class="filter-sidebar-left">
                                <div class="title-left">
                                    <h3>Categories</h3>
                                </div>
                                <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">

                                    <div class="list-group-collapse sub-men" v-for="(result, index) in categories" :key="result.id">
                                        <a class="list-group-item list-group-item-action" :href="'#tab-'+result.id" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2" @click="Iconcahnge(result.id)">{{ result.title }} 
                                            <small class="text-muted"></small>
                                            <i class="fas float-right" :class="[iconId ? 'fa-minus' : 'fa-plus']"></i>
                                        </a>

                                        <div class="collapse" :id="'tab-'+result.id" data-parent="#list-group-men">
                                            <div class="list-group" v-for="(results, index) in result.sub_category" :key="results.id">

                                                <a @click="categoryByProduct(results.id)" href="#" class="list-group-item list-group-item-action">{{ results.title }} <small class="text-muted">(10)</small></a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2" v-for="(result, index) in cart" :key="index">
                        <a href="#">{{ result.title }}</a>
                        <a href="#">{{ result.price }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Page -->
        <app-footer/>
    </div>
</template>
<script>
    import Header from '../partial/Header';
    import Footer from '../partial/Footer';
    export default {
        name: 'ShopPage',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
            return {
                category_id: this.$route.params.category_id,
                products: {},
                categories: {},
                subCategories: {},
                iconId: false,
                selectedIconId: null,
                cart: [],
            }
        },


        created() {
            this.getData();
            this.getCategory();
            this.getSubCategory();
        },

        methods: {
            getData() {
              axios.get('/api/categoryWithProducts/'+ this.category_id)
                  .then(response => {
                    this.products=response.data;
                    $(window).scrollTop(0);
                  })

                  .catch(e => {
                     console.log('error..');
                  })        
            },

            getCategory() {
                axios.get('/api/userCategory')
                  .then(response => {
                    this.categories=response.data;
                    $(window).scrollTop(0);
                  })

                  .catch(e => {
                     console.log('error..');
                  })  
            },

            getSubCategory() {
                axios.get('/api/userSubCategory')
                  .then(response => {
                    this.subCategories=response.data;
                    $(window).scrollTop(0);
                  })

                  .catch(e => {
                     console.log('error..');
                  })  
            },

            Iconcahnge(id) {
                console.log(id);
                this.selectedIconId = id;
                if(id === this.selectedIconId){
                    this.iconId =! this.iconId;
                }
            },

            categoryByProduct(id) {
                // console.log(id);
                axios.get('/api/subCategoryByProducts/'+ id)
                .then(response => {
                    this.products=response.data;
                    $(window).scrollTop(0);
                })

                .catch(e => {
                    console.log(e);
                })
            },

            addProductToCart(result) {
                this.cart.push(result);
                this.$emit('clicked', result);
            }

        }
    }
</script>
