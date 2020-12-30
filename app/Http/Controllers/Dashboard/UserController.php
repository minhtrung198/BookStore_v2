<?php

namespace App\Http\Controllers\Dashboard;

use DB;

use App\Models\User;

use App\Models\Role;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('role')->paginate(5);
        return view('dashboards.users.list_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboards.users.create_user', compact('roles'));
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
            'first_name'=>'required|min:0|max:10',
            'last_name'=>'required|min:0|max:10',
            'phone'=>'required|numeric|min:5',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:18',
            'address'=>'required',
            'role_id'=>'required',
            'image'=>'required|mimes:png, jpg, jpeg, gif, svg|max:2048'
        ],[
            // 'first_name.required'=>'Trường Tên không được bỏ trống',
            // 'first_name.max'=>'Ký tự tối đa là 10',
            // 'last_name.required'=> 'Trường Họ không được bỏ trống',
            // 'last_name.max'=>'Ký tự tối đa là 10',
            // 'phone.numeric'=>'SĐT không đúng định dạng',
            // 'phone.required'=>'SĐT không được bỏ trống',
            // 'email.unique'=>'Email đã Tồn tại',
            // 'email.required'=>'Trường Email không được bỏ trống',
            // 'email.email'=>'Email này không đúng định dạng', 
            // 'password.required'=>'Trường mật khẩu không được bỏ trống',
            // 'password.min'=>'Trường mật khẩu tối thiểu 6 ký tự', 
            // 'password.max'=>'Trường mật khẩu tối đa 18 ký tự',
            // 'address.required'=>'Bắt buộc phải nhập',
            // 'role_id.required'=>'Bắt buộc phải chọn',
            // 'image.required'=>'Không được bỏ trống'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('dashboards.users.list_user');
        // dd($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id', '=', $id)
                    ->first();
        return view('dashboards.users.detail_user', compact('users'));
        // dd($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $users = User::find($id);
        return view('dashboards.users.edit_user', compact('users','roles'));
                    //dd($users);
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
            'first_name'=>'required|min:0|max:10',
            'last_name'=>'required|min:0|max:10',
            'phone'=>'required|numeric|min:5',
            'email'=>'required|email',
            'address'=>'required',
            'role_id'=>'required',
            'image'=>'required'
        ],[
            // 'first_name.required'=>'Trường Tên không được bỏ trống',
            // 'first_name.max'=>'Ký tự tối đa là 10',
            // 'last_name.required'=> 'Trường Họ không được bỏ trống',
            // 'last_name.max'=>'Ký tự tối đa là 10',
            // 'phone.numeric'=>'SĐT không đúng định dạng',
            // 'phone.required'=>'SĐT không được bỏ trống',
            // 'email.unique'=>'Email đã Tồn tại',
            // 'email.required'=>'Trường Email không được bỏ trống',
            // 'email.email'=>'Email này không đúng định dạng', 
            // 'address.required'=>'Bắt buộc phải nhập',
            // 'role_id.required'=>'Bắt buộc phải chọn',
            // 'image.required'=>'Không được bỏ trống'
        ]);
        $data = $request->except('_token', '_method');
        $data['password'] = bcrypt($data['password']);
        User::find($id)->update($data);
        return redirect()->route('dashboards.users.list_user')->with('message', 'Update User Success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        $users->reviews()->delete();
        $users->orders()->delete();
        return redirect()->route('dashboards.users.list_user');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if($search != ""){
        $users = User::where('email', 'like', '%'.$search.'%')
                    ->orWhereHas('role', function($query) use ($search){
                        return $query->where('name','like', '%'.$search.'%' );
                    })
                    ->paginate(5);
            $users->appends(['search'=>$search]);
        }
        else{
            $users = User::paginate(5);
        }
        return view('dashboards.users.list_search', ['users' => $users]);
        // dd($users);
    }
    public function record(){
        $users = User::with('role')
                    ->join('roles', function($join){
                        $join->on('users.role_id', '=', 'roles.id');
                    })
                    ->onlyTrashed()->paginate(5);
        $users1 = User::onlyTrashed()->paginate(5);
        return view('dashboards.users.record_user', compact('users'));
    }
    public function restore($email){
        User::withTrashed()->where('email', '=', $email)->restore();
        $users = User::all();
        return redirect()->route('dashboards.users.list_user');
    }
    public function force($email){
        User::withTrashed()->where('email', '=', $email)->forceDelete();
        $users = User::all();
        return redirect()->route('dashboards.users.list_user');
    }
}