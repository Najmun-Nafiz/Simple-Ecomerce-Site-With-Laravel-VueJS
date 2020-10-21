<?php

namespace App\Http\Controllers\Api\Backend\aboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\AboutUs;
use App\Http\Resources\Backend\AboutUs\AboutUsResource;
use App\Http\Resources\Backend\AboutUs\AboutUsCollection;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AboutUsCollection(AboutUs::orderBy('id', 'DESC')->paginate(1));
    }

    public function search($field, $query)
    {
        return new AboutUsCollection(AboutUs::where($field,'LIKE',"%$query%")->latest()->paginate(1));
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
        ]);

        if($request->get('back_image')) 
        {
            $back_image = $request->get('back_image');
            $backImageName = time().'.' .explode('/', explode(':', substr($back_image, 0, strpos($back_image, ';')))[1])[1];

            if (!file_exists('uploads/aboutUs/backImage/')) {
                mkdir('uploads/aboutUs/backImage/',0777,true);
            }
            \Image::make($request->get('back_image'))->save(public_path('uploads/aboutUs/backImage/').$backImageName);
        }
        else{
            $backImageName = 'default.png';
        }

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/aboutUs/')) {
                mkdir('uploads/aboutUs/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/aboutUs/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data = new AboutUs;
        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> image = $name;
        $data -> back_image = $backImageName;
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
        return new AboutUsResource(AboutUs::find($id));
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
        ]);

        $data = AboutUs::findOrFail($id);

        if($request->get('back_image')) 
        {
            $back_image = $request->get('back_image');
            $backImageName = time().'.' .explode('/', explode(':', substr($back_image, 0, strpos($back_image, ';')))[1])[1];

            if (!file_exists('uploads/aboutUs/backImage/')) {
                mkdir('uploads/aboutUs/backImage/',0777,true);
            }
            unlink('uploads/aboutUs/backImage/'.$data->back_image);
            \Image::make($request->get('back_image'))->save(public_path('uploads/aboutUs/backImage/').$backImageName);
        }
        else{
            $backImageName = 'default.png';
        }

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/aboutUs/')) {
                mkdir('uploads/aboutUs/',0777,true);
            }
            unlink('uploads/aboutUs/'.$data->image);
            \Image::make($request->get('image'))->save(public_path('uploads/aboutUs/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> image = $name;
        $data -> back_image = $backImageName;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = AboutUs::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = AboutUs::find($id);
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
        $data = AboutUs::findOrFail($id);
        if(file_exists('uploads/aboutUs/'.$data->image)){
            unlink('uploads/aboutUs/'.$data->image);
        }
        if(file_exists('uploads/aboutUs/backImage/'.$data->back_image)){
            unlink('uploads/aboutUs/backImage/'.$data->back_image);
        }
        $data->delete();
    }
}
