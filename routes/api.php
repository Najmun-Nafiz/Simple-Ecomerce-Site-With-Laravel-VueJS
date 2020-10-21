<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['namespace'=>'Backend'], function(){ 


	/* ************************** */
	/* Category Api-Controller */
	/* ************************** */
	Route::apiResource('category', 'category\CategoryController');
	Route::get('catename/category', 'category\CategoryController@catename');
	Route::get('search/category/{field}/{query}', 'category\CategoryController@search');
	Route::get('category/active/{id}', 'category\CategoryController@active');
	Route::get('category/unactive/{id}', 'category\CategoryController@unactive');
	
	/* ************************** */
	/* Slider Api-Controller */
	/* ************************** */
	Route::apiResource('slider', 'slider\SliderController');
	Route::get('search/slider/{field}/{query}', 'slider\SliderController@search');
	Route::get('slider/active/{id}', 'slider\SliderController@active');
	Route::get('slider/unactive/{id}', 'slider\SliderController@unactive');

	/* ************************** */
	/* Product Api-Controller */
	/* ************************** */
	Route::apiResource('product', 'product\ProductController');
	Route::get('search/product/{field}/{query}', 'product\ProductController@search');
	Route::get('product/active/{id}', 'product\ProductController@active');
	Route::get('product/unactive/{id}', 'product\ProductController@unactive');

	/* ************************** */
	/* Blog Api-Controller */
	/* ************************** */
	Route::apiResource('blog', 'blog\BlogController');
	Route::get('search/blog/{field}/{query}', 'blog\BlogController@search');
	Route::get('blog/active/{id}', 'blog\BlogController@active');
	Route::get('blog/unactive/{id}', 'blog\BlogController@unactive');

	/* ************************** */
	/* CategoryProduct Api-Controller */
	/* ************************** */
	Route::apiResource('categoryProduct', 'categoryProduct\CategoryProductController');
	Route::get('search/categoryProduct/{field}/{query}', 'categoryProduct\CategoryProductController@search');
	Route::get('categoryProduct/active/{id}', 'categoryProduct\CategoryProductController@active');
	Route::get('categoryProduct/unactive/{id}', 'categoryProduct\CategoryProductController@unactive');

	/* ************************** */
	/* Sub-Category Api-Controller */
	/* ************************** */
	Route::apiResource('subCategory', 'subCategory\SubCategoryController');
	Route::get('subCatename/subCategory/{category_id}', 'subCategory\SubCategoryController@subCatename');
	Route::get('search/subCategory/{field}/{query}', 'subCategory\SubCategoryController@search');
	Route::get('subCategory/active/{id}', 'subCategory\SubCategoryController@active');
	Route::get('subCategory/unactive/{id}', 'subCategory\SubCategoryController@unactive');

	/* ************************** */
	/* Footer Office-Time Api-Controller */
	/* ************************** */
	Route::apiResource('officeTime', 'officeTime\OfficeTimeController');
	Route::get('search/officeTime/{field}/{query}', 'officeTime\OfficeTimeController@search');
	Route::get('officeTime/active/{id}', 'officeTime\OfficeTimeController@active');
	Route::get('officeTime/unactive/{id}', 'officeTime\OfficeTimeController@unactive');

	/* ************************** */
	/* Footer Subscriber Api-Controller */
	/* ************************** */
	Route::apiResource('subscriber', 'subscriber\SubscriberController');
	Route::get('search/subscriber/{field}/{query}', 'subscriber\SubscriberController@search');
	Route::get('subscriber/active/{id}', 'subscriber\SubscriberController@active');
	Route::get('subscriber/unactive/{id}', 'subscriber\SubscriberController@unactive');

	/* ************************** */
	/* Footer SocialMedia Api-Controller */
	/* ************************** */
	Route::apiResource('socialMedia', 'socialMedia\SocialMediaController');
	Route::get('search/socialMedia/{field}/{query}', 'socialMedia\SocialMediaController@search');
	Route::get('socialMedia/active/{id}', 'socialMedia\SocialMediaController@active');
	Route::get('socialMedia/unactive/{id}', 'socialMedia\SocialMediaController@unactive');

	/* ************************** */
	/* ContactUs Api-Controller */
	/* ************************** */
	Route::apiResource('contactUs', 'contactUs\ContactUsController');
	Route::get('search/contactUs/{field}/{query}', 'contactUs\ContactUsController@search');
	Route::get('contactUs/active/{id}', 'contactUs\ContactUsController@active');
	Route::get('contactUs/unactive/{id}', 'contactUs\ContactUsController@unactive');

	/* ************************** */
	/* AboutUs Api-Controller */
	/* ************************** */
	Route::apiResource('aboutUs', 'aboutUs\AboutUsController');
	Route::get('search/aboutUs/{field}/{query}', 'aboutUs\AboutUsController@search');
	Route::get('aboutUs/active/{id}', 'aboutUs\AboutUsController@active');
	Route::get('aboutUs/unactive/{id}', 'aboutUs\AboutUsController@unactive');

	/* ************************** */
	/* Seller Api-Controller */
	/* ************************** */
	Route::apiResource('seller', 'seller\SellerController');
	Route::get('search/seller/{field}/{query}', 'seller\SellerController@search');
	Route::get('seller/active/{id}', 'seller\SellerController@active');
	Route::get('seller/unactive/{id}', 'seller\SellerController@unactive');

	/* ************************** */
	/* Seller Api-Controller */
	/* ************************** */
	Route::apiResource('message', 'message\MessageController');
	Route::get('search/message/{field}/{query}', 'message\MessageController@search');
	Route::get('message/active/{id}', 'message\MessageController@active');
	Route::get('message/unactive/{id}', 'message\MessageController@unactive');

});


Route::group(['namespace'=>'Frontend'], function(){

	/* ************************** */
	/* Frontend Api-Controller */
	/* ************************** */
	Route::apiResource('userContact', 'FrontendController');

	Route::get('userslider', 'FrontendController@Slider');

	Route::get('userCategory', 'FrontendController@userCategory');
	Route::get('userSubCategory', 'FrontendController@userSubCategory');


	Route::get('userBlog', 'FrontendController@userBlog');
	Route::get('userUpdateBlog', 'FrontendController@userUpdateBlog');
	Route::get('userAboutUs', 'FrontendController@userAboutUs');
	Route::get('userGallery', 'FrontendController@userGallery');
	Route::get('galleryFilterProduct/{id}', 'userProduct\ProductController@filterProduct');
	Route::get('userSellers', 'FrontendController@userSellers');
	Route::get('profileChange/{id}', 'FrontendController@profileChange');
	Route::put('profileUpdate/{id}', 'FrontendController@profileUpdate');


	Route::get('userProduct', 'userProduct\ProductController@userProduct');
	Route::get('userCategoryProduct', 'userProduct\ProductController@userCategoryProduct');
	Route::get('filterProduct/{id}', 'userProduct\ProductController@filterProduct');
	Route::get('categoryWithProducts/{category_id}', 'userProduct\ProductController@userProducts');
	Route::get('subCategoryByProducts/{id}', 'userProduct\ProductController@userSubProducts');
	Route::get('productDetail/{id}', 'userProduct\ProductController@productDetail');
});



