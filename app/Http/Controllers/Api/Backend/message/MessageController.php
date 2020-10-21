<?php

namespace App\Http\Controllers\Api\Backend\message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Message;
use App\Http\Resources\Backend\Message\MessageResource;
use App\Http\Resources\Backend\Message\MessageCollection;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MessageCollection(Message::orderBy('id', 'DESC')->paginate(5));
    }

    public function search($field, $query)
    {
        return new MessageCollection(Message::where($field,'LIKE',"%$query%")->latest()->paginate(5));
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
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $data = new Message;
        $data -> title = $request -> title;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> subject = $request -> subject;
        $data -> message = $request -> message;
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
        return new MessageResource(Message::find($id));
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
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $data = Message::findOrFail($id);

        $data -> title = $request -> title;
        $data -> email = $request -> email;
        $data -> phone = $request -> phone;
        $data -> subject = $request -> subject;
        $data -> message = $request -> message;
        $data -> status = false;
        $data-> save();
    }

    public function active($id)
    {
        $data = Message::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = Message::find($id);
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
        $data = Message::findOrFail($id);
        $data->delete();
    }
}
