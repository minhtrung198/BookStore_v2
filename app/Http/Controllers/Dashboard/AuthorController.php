<?php

namespace App\Http\Controllers\Dashboard;

use DB;

use App\Models\Author;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = DB::table('authors')->paginate(5);
        return view('dashboards.authors.list_author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.authors.create_author');
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
            'author_name'=>'required|unique:authors|max:255'
        ],[
            // 'author_name.required'=>'Trường tên không được bỏ trống',
            // 'author_name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Author::create($data);
        return redirect()->route('dashboards.authors.list_author');
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
        $authors = Author::find($id);
        return view('dashboards.authors.edit_author', compact('authors'));
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
            'author_name'=>'required|unique:authors|max:255'
        ],[
            // 'author_name.required'=>'Trường tên không được bỏ trống',
            // 'author_name.unique'=>'Tên đã tồn tại'
        ]);
        $data = $request->all();
        Author::find($id)->update($data);
        return redirect()->route('dashboards.authors.list_author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::find($id);
        $authors->delete();
        $authors->product()->delete();
        return redirect()->route('dashboards.authors.list_author');
    }
    public function record(){
        $authors = Author::onlyTrashed()->get();
        return view('dashboards.authors.record_author', compact('authors'));
    }
    public function restore($id){
        Author::withTrashed()->where('id', '=', $id)->restore();
        $authors = Author::all();
        return redirect()->route('dashboards.authors.list_author');
    }
    public function force($id){
        Author::withTrashed()->where('id', '=', $id)->forceDelete();
        $authors = Author::all();
        return redirect()->route('dashboards.authors.list_author');
    }
}
