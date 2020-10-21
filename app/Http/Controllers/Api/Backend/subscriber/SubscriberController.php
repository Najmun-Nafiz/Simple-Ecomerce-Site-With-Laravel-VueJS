<?php

namespace App\Http\Controllers\Api\Backend\subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Subscriber;
use App\Http\Resources\Backend\Subscriber\SubscriberResource;
use App\Http\Resources\Backend\Subscriber\SubscriberCollection;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SubscriberCollection(Subscriber::orderBy('id', 'DESC')->paginate(5));
    }

    public function search($field, $query)
    {
        return new SubscriberCollection(Subscriber::where($field,'LIKE',"%$query%")->latest()->paginate(5));
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
            'subscriber'=>'required',
        ]);

        $data = new Subscriber;
        $data -> subscriber = $request -> subscriber;
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
        //
    }

    public function active($id)
    {
        $data = Subscriber::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = Subscriber::find($id);
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
        $data = Subscriber::findOrFail($id);
        $data->delete();
    }
}
