
require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'

//Vue Form installation....
import { Form, HasError, AlertError } from 'vform'
window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Vue Router installation....
import VueRouter from 'vue-router'
Vue.use(VueRouter)











//All Backend Router are includes here....
 import Dashboard from './components/backend/Dashboard.vue'
 import Slider from './components/backend/slider/Slider.vue'
 import Category from './components/backend/category/Category.vue'
 import SubCategory from './components/backend/subCategory/SubCategory.vue'
 import Product from './components/backend/product/Product.vue'
 import Blog from './components/backend/blog/Blog.vue'
 import CategoryProduct from './components/backend/categoryProduct/CategoryProduct.vue'
 import OfficeTime from './components/backend/officeTime/OfficeTime.vue'
 import Subscriber from './components/backend/subscriber/Subscriber.vue'
 import SocialMedia from './components/backend/socialMedia/SocialMedia.vue'
 import AboutUs from './components/backend/aboutUs/AboutUs.vue'
 import Seller from './components/backend/seller/Seller.vue'
 import ContactUs from './components/backend/contactUs/ContactUs.vue'
 import Message from './components/backend/message/Message.vue'


//All Frontend Router are includes here....
 import Master from './components/frontend/Master.vue'
 import Home from './components/frontend/Master.vue'
 import ProfileChange from './components/frontend/profileChange/ProfileChange.vue'
 import Aboutus from './components/frontend/aboutUs/AboutUs.vue'
 import UserGallary from './components/frontend/gallary/Gallary.vue'
 import UserCheckOut from './components/frontend/checkOut/CheckOut.vue'
 import UserContactUs from './components/frontend/contactUs/ContactUs.vue'
 import UserCart from './components/frontend/userCart/UserCart.vue'
 import UserProductDetail from './components/frontend/userProductDetail/UserProductDetail.vue'
 import UserBlogDetail from './components/frontend/userBlogDetail/UserBlogDetail.vue'
 import ShopPage from './components/frontend/shopPage/ShopPage.vue'


 const routes= [
    { path: '/admin/dashboard', component: Dashboard },
    { path: '/admin/slider', component: Slider },
    { path: '/admin/category', component: Category },
    { path: '/admin/subCategory', component: SubCategory },
    { path: '/admin/product', component: Product },
    { path: '/admin/blog', component: Blog },
    { path: '/admin/categoryProduct', component: CategoryProduct },
    { path: '/admin/officeTime', component: OfficeTime },
    { path: '/admin/subscriber', component: Subscriber },
    { path: '/admin/socialMedia', component: SocialMedia },
    { path: '/admin/aboutUs', component: AboutUs },
    { path: '/admin/seller', component: Seller },
    { path: '/admin/contactUs', component: ContactUs },
    { path: '/admin/message', component: Message },


    // Frontend Routes...
    { path: '/', component: Master },
    { path: '/home', component: Home },
    { path: '/profileChange/:id', component: ProfileChange },
    { path: '/aboutUs', component: Aboutus },
    { path: '/gallary', component: UserGallary },
    { path: '/checkOut', component: UserCheckOut },
    { path: '/contactUs', component: UserContactUs },
    { path: '/ourLocation', component: UserContactUs },
    { path: '/userCart', component: UserCart },
    { path: '/productDetail/:id', component: UserProductDetail },
    { path: '/blogDetail/:id', component: UserBlogDetail },
    { path: '/shopPage/:category_id', component: ShopPage },
]






 var router = new VueRouter({
	mode: 'history',
    routes
});




// Default route here.....

// Vue.component('app-navbar', require('./components/frontend/partial/Header.vue').default);



const app = new Vue({
    el: '#app',
    router,
});
