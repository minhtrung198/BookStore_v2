<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Publishers;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->paginate(10);
        //$categories = Category::all();
        return view('fronts.product.main',compact('products'));
    }
    public function productDetail($id){
        $products = Product::with('author','publisher')->find($id);
        return view('fronts.product.detail',compact('products'));
    }
    public function cateProduct($id)
    {
       // $categories = Category::all();
        //lấy sp theo thể loại, 
        $categories = Category::where('id',$id)->first();//lấy thể loại mình cần lấy
        $products = Product::where('category_id', $categories->id)->get();//sau đó trỏ tới sản phẩm mình muốn lấy thông  qua category-id
        return view('fronts.product.category',compact('categories','products'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
