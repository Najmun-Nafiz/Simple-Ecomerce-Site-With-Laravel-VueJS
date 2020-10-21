<?php

namespace App\Http\Controllers\Api\Backend\slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Slider;
use App\Http\Resources\Backend\Slider\SliderResource;
use App\Http\Resources\Backend\Slider\SliderCollection;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SliderCollection(Slider::orderBy('id', 'DESC')->paginate(5));
    }

    public function search($field, $query)
    {
        return new SliderCollection(Slider::where($field,'LIKE',"%$query%")->latest()->paginate(5));
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
            'description'=>'required'
        ]);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/slider/')) {
                mkdir('uploads/slider/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/slider/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data = new Slider;
        $data -> title = $request -> title;
        $data -> description = $request -> description;
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
        return new SliderResource(Slider::find($id));
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
            'description'=>'required'
        ]);

        $data = Slider::findOrFail($id);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/slider/')) {
                mkdir('uploads/slider/',0777,true);
            }
            unlink('uploads/slider/'.$data->image);
            \Image::make($request->get('image'))->save(public_path('uploads/slider/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> image = $name;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = Slider::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = Slider::find($id);
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
        $data = Slider::findOrFail($id);
        if(file_exists('uploads/slider/'.$data->image)){
            unlink('uploads/slider/'.$data->image);
        }
        $data->delete();
    }
}
