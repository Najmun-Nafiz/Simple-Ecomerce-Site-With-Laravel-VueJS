<template>
    <div>  
		<app-header/>
		<app-slider @clicked="najmun"/>
        <app-categoryProduct/>
		<app-productCategory/>
		<app-blog/>
        <app-footer/>
    </div>
</template>
<script>
    import Header from './partial/Header';
    import Slider from './slider/Slider';
    import ProductCategory from './productCategory/ProductCategory';
    import CategoryProduct from './categoryProduct/CategoryProduct';
    import Blog from './blog/Blog';
    import Footer from './partial/Footer';

    export default {
        name: 'Master',

        components: {
            'app-header': Header,
            'app-slider': Slider,
            'app-categoryProduct': CategoryProduct,
            'app-productCategory': ProductCategory,
            'app-blog': Blog,
            'app-footer': Footer,
        },

        data() {
            return {
                activeIndex: false,
                name: {}
            }
        },

        created() {
            this.components;
            $(window).scrollTop(0);
        },

        methods: {
            najmun(data) {
                this.name = data;
            }
        }
    }
</script>
