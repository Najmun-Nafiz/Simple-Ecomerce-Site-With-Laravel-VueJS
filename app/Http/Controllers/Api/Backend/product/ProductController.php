<?php

namespace App\Http\Controllers\Api\Backend\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Product;
use App\Http\Resources\Backend\Product\ProductResource;
use App\Http\Resources\Backend\Product\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->with('sub_category','category')->paginate(4);  
        return response ($data); 
    }

    public function search($field, $query)
    {
        return new ProductCollection(Product::where($field,'LIKE',"%$query%")->latest()->paginate(4));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'storage'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'description'=>'required'
        ]);

        // For First Image
        if($request->get('image1')) 
        {
            $image1 = $request->get('image1');
            $name1 = uniqid().'.'.explode('/', explode(':', substr($image1, 0, strpos($image1, ';')))[1])[1];

            if (!file_exists('uploads/product/')) {
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image1'))->save(public_path('uploads/product/').$name1);
        }
        else{
            $name1 = 'default.png';
        }

        // For Second Image
        if($request->get('image2')) 
        {
            $image2 = $request->get('image2');
            $name2 = uniqid().'.' .explode('/', explode(':', substr($image2, 0, strpos($image2, ';')))[1])[1];

            if (!file_exists('uploads/product/')) {
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image2'))->save(public_path('uploads/product/').$name2);
        }
        else{
            $name2 = 'default.png';
        }

        // For Third Image
        if($request->get('image3')) 
        {
            $image3 = $request->get('image3');
            $name3 = uniqid().'.' .explode('/', explode(':', substr($image3, 0, strpos($image3, ';')))[1])[1];

            if (!file_exists('uploads/product/')) {
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image3'))->save(public_path('uploads/product/').$name3);
        }
        else{
            $name3 = 'default.png';
        }

        $data = new Product;
        $data -> title = $request -> title;
        $data -> storage = $request -> storage;
        $data -> price = $request -> price;
        $data -> category_id = $request -> category_id;
        $data -> sub_category_id = $request -> sub_category_id;
        $data -> description = $request -> description;
        $data -> image1 = $name1;
        $data -> image2 = $name2;
        $data -> image3 = $name3;
        $data -> status = false;
        $data-> save();
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
        $this->validate($request,[
            'title'=>'required',
            'storage'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'description'=>'required'
        ]);

        $data = Product::findOrFail($id);

        // For First Image
        if($request->get('image1')) 
        {
            $image1 = $request->get('image1');
            $name = uniqid().'.' .explode('/', explode(':', substr($image1, 0, strpos($image1, ';')))[1])[1];

            if (file_exists('uploads/product/'.$data->image1) AND !empty($data->image1)) {
                unlink('uploads/product/'.$data->image1);
            }
            else if(!file_exists('uploads/product/')){
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image1'))->save(public_path('uploads/product/').$name);
        }
        else{
            $name = 'default.png';
        }

        // For Second Image
        if($request->get('image2')) 
        {
            $image2 = $request->get('image2');
            $name2 = uniqid().'.' .explode('/', explode(':', substr($image2, 0, strpos($image2, ';')))[1])[1];

            if (file_exists('uploads/product/'.$data->image2) AND !empty($data->image2)) {
                unlink('uploads/product/'.$data->image2);
            }
            else if(!file_exists('uploads/product/')){
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image2'))->save(public_path('uploads/product/').$name2);
        }
        else{
            $name2 = 'default.png';
        }

        // For Third Image
        if($request->get('image3')) 
        {
            $image3 = $request->get('image3');
            $name3 = uniqid().'.' .explode('/', explode(':', substr($image3, 0, strpos($image3, ';')))[1])[1];

            if (file_exists('uploads/product/'.$data->image3) AND !empty($data->image3)) {
                unlink('uploads/product/'.$data->image3);
            }
            else if(!file_exists('uploads/product/')){
                mkdir('uploads/product/',0777,true);
            }
            \Image::make($request->get('image3'))->save(public_path('uploads/product/').$name3);
        }
        else{
            $name3 = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> storage = $request -> storage;
        $data -> price = $request -> price;
        $data -> category_id = $request -> category_id;
        $data -> sub_category_id = $request -> sub_category_id;
        $data -> description = $request -> description;
        $data -> image1 = $name;
        $data -> image2 = $name2;
        $data -> image3 = $name3;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = Product::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = Product::find($id);
        $data -> status = false;
        $data -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);

        if(file_exists('uploads/product/'.$data->image1)){
            unlink('uploads/product/'.$data->image1);
        }

        if(file_exists('uploads/product/'.$data->image2)){
            unlink('uploads/product/'.$data->image2);
        }

        if(file_exists('uploads/product/'.$data->image3)){
            unlink('uploads/product/'.$data->image3);
        }
        $data->delete();
    }
}
