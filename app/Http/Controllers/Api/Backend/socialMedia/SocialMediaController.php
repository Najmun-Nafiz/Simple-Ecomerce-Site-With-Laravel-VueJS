<?php

namespace App\Http\Controllers\Api\Backend\socialMedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\SocialMedia;
use App\Http\Resources\Backend\SocialMedia\SocialMediaResource;
use App\Http\Resources\Backend\SocialMedia\SocialMediaCollection;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SocialMediaCollection(SocialMedia::orderBy('id', 'DESC')->paginate(1));
    }

    public function search($field, $query)
    {
        return new SocialMediaCollection(SocialMedia::where($field,'LIKE',"%$query%")->latest()->paginate(1));
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
            'facebook'=>'required',
            'twitter'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'rss'=>'required',
            'pinterest'=>'required',
            'whatsapp'=>'required'
        ]);

        $data = new SocialMedia;
        $data -> facebook = $request -> facebook;
        $data -> twitter = $request -> twitter;
        $data -> linkedin = $request -> linkedin;
        $data -> instagram = $request -> instagram;
        $data -> rss = $request -> rss;
        $data -> pinterest = $request -> pinterest;
        $data -> whatsapp = $request -> whatsapp;
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
        return new OfficeTimeResource(SocialMedia::find($id));
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
            'facebook'=>'required',
            'twitter'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'rss'=>'required',
            'pinterest'=>'required',
            'whatsapp'=>'required'
        ]);

        $data = SocialMedia::findOrFail($id);
        $data -> facebook = $request -> facebook;
        $data -> twitter = $request -> twitter;
        $data -> linkedin = $request -> linkedin;
        $data -> instagram = $request -> instagram;
        $data -> rss = $request -> rss;
        $data -> pinterest = $request -> pinterest;
        $data -> whatsapp = $request -> whatsapp;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = SocialMedia::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = SocialMedia::find($id);
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
        $data = SocialMedia::findOrFail($id);
        $data->delete();
    }
}
