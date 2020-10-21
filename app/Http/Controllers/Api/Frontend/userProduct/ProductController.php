<?php

namespace App\Http\Controllers\Api\Frontend\userProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Product;
use App\Admin\CategoryProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function userCategoryProduct()
    {
        $data = CategoryProduct::where('status', true)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function filterProduct($id)
    {
        $data = Product::where('category_id', $id)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function userProduct()
    {
        $data = Product::where('status', true)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function userProducts($category_id)
    {
        $data = Product::where('category_id', $category_id)->where('status', true)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function userSubProducts($id)
    {
        $data = Product::where('sub_category_id', $id)->orderBy('id', 'DESC')->limit(8)->get();
        return response($data);
    }

    public function productDetail($id)
    {
        $data = Product::findOrFail($id);
        return response($data);
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
