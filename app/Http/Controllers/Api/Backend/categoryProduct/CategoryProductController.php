<?php

namespace App\Http\Controllers\Api\Backend\categoryProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\CategoryProduct;
use App\Http\Resources\Backend\CategoryProduct\CategoryProductResource;
use App\Http\Resources\Backend\CategoryProduct\CategoryProductCollection;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryProduct::orderBy('id', 'DESC')->with('category')->paginate(5);  
        return response ($data);   
    }

    public function search($field, $query)
    {
        return new CategoryProductCollection(CategoryProduct::where($field,'LIKE',"%$query%")->latest()->paginate(5));
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
            'category_id'=>'required',
        ]);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/categoryProduct/')) {
                mkdir('uploads/categoryProduct/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/categoryProduct/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data = new CategoryProduct;
        $data -> title = $request -> title;
        $data -> category_id = $request -> category_id;
        $data -> image = $name;
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
        return new CategoryProductResource(CategoryProduct::find($id));
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
            'category_id'=>'required'
        ]);

        $data = CategoryProduct::findOrFail($id);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/categoryProduct/')) {
                mkdir('uploads/categoryProduct/',0777,true);
            }
            unlink('uploads/categoryProduct/'.$data->image);
            \Image::make($request->get('image'))->save(public_path('uploads/categoryProduct/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> category_id = $request -> category_id;
        $data -> image = $name;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = CategoryProduct::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = CategoryProduct::find($id);
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
        $data = CategoryProduct::findOrFail($id);
        if(file_exists('uploads/categoryProduct/'.$data->image)){
            unlink('uploads/categoryProduct/'.$data->image);
        }
        $data->delete();
    }
}
