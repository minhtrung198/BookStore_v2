<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Publishers;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->category_id
        $products = Product::where('status', 1);
        if($request->category_id)
        {
            $products->where('category_id',$request->category_id);
        }
        if($request->sort_by){
            $sort_by = $request->sort_by;
            if($sort_by == 'decrease'){
                $products = $products->orderBy('price','DESC');
            }else{
                if($sort_by == 'increment'){
                    $products = $products->orderBy('price','ASC');
            }else{
                if($sort_by == 'name'){
                    $products =$products->orderBy('name','ASC');
                }else{
                    if($sort_by == 'new'){
                    $products =$products->orderBy('created_at','DESC');
                }}
            }
        }
        }
        $products= $products->paginate(12)->appends(request()->query());
        return view('fronts.product.main',compact('products'));
    }
    
    public function getListProduct(Request $request,$id)
    {
        $categories = Category::all();
        $category_id_product = Category::where('id',$id)->get();
        foreach($category_id_product as $key => $cate){
            $category_id = $cate->category_id;
        }
        // if(isset($_GET['sort_by'])){
        //     $sort_by = $_GET['sort_by'];
        //     if($sort_by == 'decrease'){
        //         $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('price','DESC')->paginate(6)->appends(request()->query());
        //     }elseif($sort_by=='increment'){
        //         $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('price','DESC')->paginate(6)->appends(request()->query());
        //     }elseif($sort_by=='name'){
        //         $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('name','ASC')->paginate(6)->appends(request()->query());
        //     }
        // }else{
        //     $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('id','DESC')->paginate(6);
        // }
        Product::orderBy('price','decrease')->get();
        return view('fronts.product.main',compact('categories','category_by_id','category_id_product'));
    }

    public function productDetail($id){
        $products = Product::with('author','publisher')->find($id);
        return view('fronts.product.detail',compact('products'));
    }
    public function newBook(){
        $products = Product::where('status',1)->orderBy('created_at','DESC')->get();
        return view('fronts.product.index',compact('products'));
    }

    public function cateProduct($id)
    {
       // $categories = Category::all();
        //lấy sp theo thể loại, 
        $categories = Category::where('id',$id)->first();//lấy thể loại mình cần lấy
        $products = Product::where('category_id', $categories->id)->paginate(6);//sau đó trỏ tới sản phẩm mình muốn lấy thông  qua category-id
        return view('fronts.product.category',compact('categories','products'));
    }
    

    public function comment($id,Request $request)
    {
       
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
