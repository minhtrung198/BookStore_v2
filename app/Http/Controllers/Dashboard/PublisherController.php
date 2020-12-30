<?php

namespace App\Http\Controllers\Dashboard;

use DB;

use App\Models\Publisher;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = DB::table('publishers')->paginate(5);
        return view('dashboards.publishers.list_publisher', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.publishers.create_publisher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'publisher_name'=>'required|unique:publishers|max:255'
        ],[
            // 'publisher_name.required'=>'Tên trường không được bỏ trống',
            // 'publisher_name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Publisher::create($data);
        return redirect()->route('dashboards.publishers.list_publisher');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publishers = Publisher::find($id);
        return view('dashboards.publishers.edit_publisher', compact('publishers'));
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
        $data = $this->validate($request, [
            'publisher_name'=>'required|unique:publishers|max:255'
        ],[
            // 'publisher_name.required'=>'Tên trường không được bỏ trống',
            // 'publisher_name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Publisher::find($id)->update($data);
        return redirect()->route('dashboards.publishers.list_publisher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publishers = Publisher::find($id);
        $publishers->delete();
        $publishers->product()->delete();
        return redirect()->route('dashboards.publishers.list_publisher');
    }
    public function record(){
        $publishers = Publisher::onlyTrashed()->get();
        return view('dashboards.publishers.record_publisher', compact('publishers'));
    }
    public function restore($id){
        publisher::withTrashed()->where('id', '=', $id)->restore();
        $publishers = Publisher::all();
        return redirect()->route('dashboards.publishers.list_publisher');
    }
    public function force($id){
        Publisher::withTrashed()->where('id', '=', $id)->forceDelete();
        $publishers = Publisher::all();
        return redirect()->route('dashboards.publishers.list_publisher');
    }
}
