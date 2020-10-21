<?php

namespace App\Http\Controllers\Api\Backend\contactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\ContactUs;
use App\Http\Resources\Backend\ContactUs\ContactUsResource;
use App\Http\Resources\Backend\ContactUs\ContactUsCollection;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ContactUsCollection(ContactUs::orderBy('id', 'DESC')->paginate(5));
    }

    public function search($field, $query)
    {
        return new ContactUsCollection(ContactUs::where($field,'LIKE',"%$query%")->latest()->paginate(5));
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
            'touch_description'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/contactUs/')) {
                mkdir('uploads/contactUs/',0777,true);
            }
            \Image::make($request->get('image'))->save(public_path('uploads/contactUs/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data = new ContactUs;
        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> touch_description = $request -> touch_description;
        $data -> address = $request -> address;
        $data -> phone = $request -> phone;
        $data -> email = $request -> email;
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
        return new ContactUsResource(ContactUs::find($id));
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
            'touch_description'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        $data = ContactUs::findOrFail($id);

        if($request->get('image')) 
        {
            $image = $request->get('image');
            $name = time().'.' .explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            if (!file_exists('uploads/contactUs/')) {
                mkdir('uploads/contactUs/',0777,true);
            }
            unlink('uploads/contactUs/'.$data->image);
            \Image::make($request->get('image'))->save(public_path('uploads/contactUs/').$name);
        }
        else{
            $name = 'default.png';
        }

        $data -> title = $request -> title;
        $data -> description = $request -> description;
        $data -> touch_description = $request -> touch_description;
        $data -> address = $request -> address;
        $data -> phone = $request -> phone;
        $data -> email = $request -> email;
        $data -> image = $name;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = ContactUs::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = ContactUs::find($id);
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
        $data = ContactUs::findOrFail($id);
        if(file_exists('uploads/contactUs/'.$data->image)){
            unlink('uploads/contactUs/'.$data->image);
        }
        $data->delete();
    }
}
