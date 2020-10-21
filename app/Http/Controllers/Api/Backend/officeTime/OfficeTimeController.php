<?php

namespace App\Http\Controllers\Api\Backend\officeTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\OfficeTime;
use App\Http\Resources\Backend\OfficeTime\OfficeTimeResource;
use App\Http\Resources\Backend\OfficeTime\OfficeTimeCollection;
class OfficeTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OfficeTimeCollection(OfficeTime::orderBy('id', 'DESC')->paginate(1));
    }

    public function search($field, $query)
    {
        return new OfficeTimeCollection(OfficeTime::where($field,'LIKE',"%$query%")->latest()->paginate(1));
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
            'daily_rutine'=>'required',
            'optional_day'=>'required',
            'off_day'=>'required'
        ]);

        $data = new OfficeTime;
        $data -> title = $request -> title;
        $data -> daily_rutine = $request -> daily_rutine;
        $data -> optional_day = $request -> optional_day;
        $data -> off_day = $request -> off_day;
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
        return new OfficeTimeResource(OfficeTime::find($id));
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
            'daily_rutine'=>'required',
            'optional_day'=>'required',
            'off_day'=>'required'
        ]);

        $data = OfficeTime::find($id);
        $data -> title = $request -> title;
        $data -> daily_rutine = $request -> daily_rutine;
        $data -> optional_day = $request -> optional_day;
        $data -> off_day = $request -> off_day;
        $data -> status = false;
        $data-> update();
    }

    public function active($id)
    {
        $data = OfficeTime::find($id);
        $data -> status = true;
        $data -> save();
    }

    public function unactive($id)
    {
        $data = OfficeTime::find($id);
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
        $data = OfficeTime::findOrFail($id);
        $data->delete();
    }
}
