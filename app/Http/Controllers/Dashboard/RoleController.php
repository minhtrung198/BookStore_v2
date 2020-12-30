<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;

use Illuminate\Http\Request;

use App\Http\Requests\RoleRequest;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('dashboards.roles.list_role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.roles.create_role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name'=>'required|unique:roles'
        ],[
            'name.required'=>'Trường tên không được bỏ trống',
            'name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Role::create($data);
        return redirect()->route('dashboards.roles.list_role');
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
        $roles = Role::find($id);
        return view('dashboards.roles.edit_role', compact('roles'));
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
        $data = $this->validate($request,[
            'name'=>'required|unique:roles'
        ],[
            'name.required'=>'Trường tên không được bỏ trống',
            'name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Role::find($id)->update($data);
        return redirect()->route('dashboards.roles.list_role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        $roles->users()->delete();
        return redirect()->route('dashboards.roles.list_role');
    }
    public function record(){
        $roles = Role::onlyTrashed()->get();
        return view('dashboards.roles.record_role', compact('roles'));
    }
    public function restore($id){
        Role::withTrashed()->where('id', '=', $id)->restore();
        $roles = Role::all();
        return redirect()->route('dashboards.roles.list_role');
    }
    public function force($id){
        Role::withTrashed()->where('id', '=', $id)->forceDelete();
        $roles = Role::all();
        return redirect()->route('dashboards.roles.list_role');
    }
}
