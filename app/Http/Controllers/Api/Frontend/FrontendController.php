<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Slider;
use App\Admin\Category;
use App\Admin\SubCategory;
use App\Admin\Product;
use App\Admin\ContactUs;
use App\Admin\AboutUs;
use App\Admin\Blog;
use App\Admin\Seller;
use App\User;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContactUs::where('status', true)->orderBy('id', 'DESC')->get();
        return response($data);
    }

    public function Slider()
    {
        $data = Slider::where('status', true)->orderBy('id', 'DESC')->get();
        return response($data);
    }

    public function userCategory()
    {
        $data = Category::where('status', true)->orderBy('id', 'DESC')->with('sub_category')->get();
        return response($data);
    }

    public function userSubCategory()
    {
        $data = SubCategory::where('status', true)->orderBy('id', 'DESC')->with('category')->get();
        return response($data);
    }

    public function userBlog()
    {
        $data = Blog::where('status', true)->orderBy('id', 'DESC')->limit(3)->get();
        return response($data);
    }

    public function userUpdateBlog()
    {
        $data = Blog::where('status', true)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function blogDetail($id)
    {
        $data = Blog::findOrFail($id);
        return response($data);
    }

    public function userAboutUs()
    {
        $data = AboutUs::where('status', true)->orderBy('id', 'DESC')->get();
        return response($data);
    }

    public function userGallery()
    {
        $data = Product::where('status', true)->orderBy('id', 'DESC')->limit(12)->get();
        return response($data);
    }

    public function filterProduct($id)
    {
        $data = Product::where('category_id', $id)->orderBy('id', 'DESC')->limit(12)->get();
        return response($data);
    }

    public function userSellers()
    {
        $data = Seller::where('status', true)->orderBy('id', 'DESC')->get();
        return response($data);
    }

    public function profileChange($id)
    {
        $data = User::findOrFail($id);
        return response($data);
    }

    public function profileUpdate(Request $request, $id)
    {

        $data = User::findOrFail($id);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (file_exists('uploads/users/profile/')) {
                unlink('uploads/users/profile/'.$data->image);
            }
            else{
                mkdir('uploads/users/profile/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/users/profile/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> address = $request -> address;
        $data -> image = $name;
        $success = $data-> update();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
