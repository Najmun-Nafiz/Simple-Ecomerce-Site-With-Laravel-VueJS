<?php

namespace App\Http\Controllers\Api\Backend\subCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\SubCategory;
use App\Http\Resources\Backend\SubCategory\SubCategoryResource;
use App\Http\Resources\Backend\SubCategory\SubCategoryCollection;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubCategory::orderBy('id', 'DESC')->with('category')->paginate(5);  
        return response($data);
    }

    public function subCatename($category_id)
    {
        $data = SubCategory::Where('category_id', $category_id)->get();  
        return response($data);
    }

    public function search($field, $query)
    {
        return new SubCategoryCollection(SubCategory::where($field,'LIKE',"%$query%")->with('category')->latest()->paginate(5));
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

        $data = new SubCategory;
        $data -> title = $request -> title;
        $data -> category_id = $request -> category_id;
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
        return new SubCategoryResource(SubCategory::find($id));
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
            'category_id'=>'required',
        ]);

        $data = SubCategory::findOrFail($id);
        $data -> title = $request -> title;
        $data -> category_id = $request -> category_id;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = SubCategory::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = SubCategory::find($id);
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
        $data = SubCategory::findOrFail($id);
        $data->delete();
    }
}
