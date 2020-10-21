<?php

namespace App\Http\Controllers\Api\Backend\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Seller;
use App\Http\Resources\Backend\Seller\SellerResource;
use App\Http\Resources\Backend\Seller\SellerCollection;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SellerCollection(Seller::orderBy('id', 'DESC')->paginate(4));
    }

    public function search($field, $query)
    {
        return new SellerCollection(Seller::where($field,'LIKE',"%$query%")->latest()->paginate(4));
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
            'description'=>'required',
            'profession'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required'
        ]);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/seller/')) {
                mkdir('uploads/seller/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/seller/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data = new Seller;
        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> profession = $request -> profession;
        $data -> facebook = $request -> facebook;
        $data -> twitter = $request -> twitter;
        $data -> linkedin = $request -> linkedin;
        $data -> instagram = $request -> instagram;
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
        return new SellerResource(Seller::find($id));
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
            'description'=>'required',
            'profession'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required'
        ]);

        $data = Seller::findOrFail($id);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/seller/')) {
                mkdir('uploads/seller/',0777,true);
            }
            unlink('uploads/seller/'.$data->image);
            \Image::make($request->get('image'))->save(public_path('uploads/seller/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> profession = $request -> profession;
        $data -> facebook = $request -> facebook;
        $data -> twitter = $request -> twitter;
        $data -> linkedin = $request -> linkedin;
        $data -> instagram = $request -> instagram;
        $data -> image = $name;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = Seller::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = Seller::find($id);
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
        $data = Seller::findOrFail($id);
        if(file_exists('uploads/seller/'.$data->image)){
            unlink('uploads/seller/'.$data->image);
        }
        $data->delete();
    }
}
