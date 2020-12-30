<?php

namespace App\Http\Controllers\Dashboard;

use DB;

use App\Models\Product;

use App\Models\Author;

use App\Models\Publisher;

use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$products = Product::with('author','publisher','category')->find($id);
        $products = Product::paginate(3);
        return view('dashboards.products.list_product', compact('products'));
        // dd($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('dashboards.products.create_product', compact('authors', 'publishers', 'categories'));
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
            'name'=>'required|unique:products',
            'description'=>'required|max:1000|max:1000',
            'quantity'=>'required|numeric|max:200',
            'price'=>'required|numeric|min:10000',
            'image'=>'required',
            'status'=>'required',
            'author_id'=>'required',
            'publisher_id'=>'required' 
        ]);
        if($data['quantity']>0){
            $data['status'] = '1';
        } 
        else{
            $data['status'] = '0';
        }
        $data = $request->all();
        Product::create($data);
        return redirect()->route('dashboards.products.list_product'); 
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
        $products = Product::where('id', '=', $id)->first();
        return view('dashboards.products.detail_product', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        $products = Product::find($id);
        return view('dashboards.products.edit_product', compact('products', 'authors', 'publishers', 'categories'));
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
            'name'=>'required',
            'description'=>'required',
            'quantity'=>'required|numeric|max:200',
            'price'=>'required|numeric|min:10000',
            'image'=>'required',
            'status'=>'required',
            'author_id'=>'required',
            'publisher_id'=>'required' 
        ]);
         if($data['quantity']>0){
            $data['status'] = '1';
        } 
        else{
            $data['status'] = '0';
        }
         $data = $request->except('_token', '_method');
        Product::find($id)->update($data);
        return redirect()->route('dashboards.products.list_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        $products->reviews()->delete();
        $products->orderDetails()->delete();
        return redirect()->route('dashboards.products.list_product');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        //Nếu người dùng không tìm kiếm, bạn sẽ nhận được dữ liệu tất cả sản phẩm trong bảng sản phẩm 
        if($search!=""){
            $products = Product::where('name', 'like', '%'.$search.'%')
                            ->orWhereHas('author', function($query) use ($search){
                return $query->where('author_name', 'like', '%'.$search.'%');
                                })
                            ->orWhereHas('publisher', function($query) use ($search){
                return $query->where('publisher_name', 'like', '%'.$search.'%');
                                })
                            ->orWhereHas('category', function($query) use ($search){
                return $query->where('category_name', 'like', '%'.$search.'%');
                                })
                            ->paginate(5);
            $products->appends(['search'=> $search]);
        }
        //nếu người dùng tìm kiếm, bạn cần sử dụng $ search = $ request-> input ('search'); nhận giá trị tìm kiếm, sau đó nối thêm từ khóa $products->appends (['search' => $ search]);
        else{
            $products = Product::paginate(5);
        }
            return view('dashboards.products.list_search', ['products' => $products]);
            // dd($products);
    }
    //Record
    public function record(){
        $products = Product::with('publisher','author','category')
                    ->join('publishers',function($join){
                        $join->on('products.publisher_id','=','publishers.id');
                    })
                    ->join('authors',function($join){
                        $join->on('products.author_id','=','authors.id');
                    })
                    ->join('categories',function($join){
                        $join->on('products.category_id','=','categories.id');
                    })
                    ->onlyTrashed()->paginate(5);
        $products1 = Product::onlyTrashed()->paginate(5);
        return view('dashboards.products.record_product', compact('products'));
    }
    //Restore
    public function restore($name){
        Product::withTrashed()->where('name','=',$name)->restore();
        $products = Product::all();
        return Redirect()->route('dashboards.products.list_product')->with('message', 'Delete User Success !');
    }
    //Force
    public function force($name){
        Product::withTrashed()->where('name','=',$name)->forceDelete();
        $products = Product::all();
        return Redirect()->route('dashboards.products.list_product')->with('message', 'Delete User Success !');
    }
    public function sort(Request $request){
        $products = Product::where('id','=',$id);
        // dd($products);
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
                    $products =$products->orderBy('created_at','ASC');
                }
                    }
                }
            }        
        }
        $products= $products->paginate(5)->appends(request()->query());
       return redirect()->back();
    }
}
