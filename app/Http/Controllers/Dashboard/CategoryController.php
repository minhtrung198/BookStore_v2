<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(5);
        // dd($categories->toArray());
        return view('dashboards.categories.list_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.categories.create_category');
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
            'category_name'=>'required|unique:categories|max:255'
        ]);
        $data = $request->all();
        Category::create($data);
        return redirect()->route('dashboards.categories.list_category');
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
        $category = Category::find($id);
        return view('dashboards.categories.edit_category', compact('category'));
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
            'category_name'=>'required|unique:categories|max:255'
        ]);
        $data = $request->except('status');
        Category::find($id)->update($data);
        return redirect()->route('dashboards.categories.list_category');
        // dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        $categories->product()->delete();
        return redirect()->route('dashboards.categories.list_category');
    }
    public function record(){
        $category = Category::onlyTrashed()->get();
        return view('dashboards.categories.record_category', compact('category'));
    }
    public function restore($id){
        Category::withTrashed()->where('id', '=', $id)->restore();
        $category = Category::all();
        return redirect()->route('dashboards.categories.list_category');
    }
    public function force($id){
        Category::withTrashed()->where('id', '=', $id)->forceDelete();
        $category = Category::all();
        return redirect()->route('dashboards.categories.list_category');
    }
}
