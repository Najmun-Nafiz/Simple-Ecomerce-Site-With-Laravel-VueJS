<template>
    <div>
        <app-header/>

        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>ABOUT US</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">ABOUT US</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->
        <!-- Start About Page  -->
        <div class="about-box-main">
            <div class="container">
                <div class="row" v-for="(result, index) in aboutUs" :key="result.id">
    				<div class="col-lg-6">
                        <div class="banner-frame"> <img class="img-fluid" :src="'/uploads/aboutUs/'+result.image" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="noo-sh-title-top">{{ result.title }}</h2>
                        <p>{{ result.description }}</p>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <h2 class="noo-sh-title">Meet Our Team</h2>
                    </div>
                    <div class="col-sm-6 col-lg-3" v-for="(result, index) in sellers" :key="result.id">
                        <div class="hover-team team-section-height">
                            <div class="our-team"> <img :src="'/uploads/seller/'+result.image" alt="" style="height: 300px; width: 100%;">
                                <div class="team-content text-center p-0">
                                    <h3 class="title border-0">{{ result.title }}</h3> 
                                    <span class="post p-0 border">{{ result.profession }}</span> 
                                </div>
                                <ul class="social">
                                    <li>
                                        <a :href="result.facebook" class="fab fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a :href="result.twitter" class="fab fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a :href="result.instagram" class="fab fa-instagram"></a>
                                    </li>
                                    <li>
                                        <a :href="result.linkedin" class="fab fa-linkedin"></a>
                                    </li>
                                </ul>
                                <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                            </div>
                            <div class="team-description">
                                <p>{{ result.description }} </p>
                            </div>
                            <hr class="my-0"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Page -->
        <app-footer/>
    </div>
</template>
<script>
    import Header from '../partial/Header';
    import Footer from '../partial/Footer';
    export default {
        name: 'AboutUs',

        components: {
            'app-header': Header,
            'app-footer': Footer,
        },

        data() {
            return {
                aboutUs: {},
                sellers: {}
            }
        },

        created() {
            this.getData();  
            this.seller();  
        },

        methods: {
            getData() {
                axios.get('/api/userAboutUs')
                .then(response => {
                    this.aboutUs=response.data;
                })
                .catch(e => {
                    console.log('error..');
                })
            },

            seller() {
                axios.get('/api/userSellers')
                .then(response => {
                    this.sellers=response.data;
                })
                .catch(e => {
                    console.log('error..');
                })
            },
        }
    }
</script>
