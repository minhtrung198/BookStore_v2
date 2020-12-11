<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Session;
use Cart;
session_start();
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//show cart
    {

        $listCategory = Category::where('status', 1)->get();
        return view('fronts.cart.show_cart',compact('listCategory'));
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);//tao session 1 id, luc xoa,update thi dua vao session_id de xoa
        $cart = Session::get('cart');//tao 1 ss kiem tra co ton tai ss carr chua
        if($cart == true)
        {
            $is_avaiable=0;
            foreach($cart as $key => $value){
                if($value['cart_id'] == $data['cart_id']){//no se lay id ben form de so sanh co bang id ben cart nay k neu bang thi ++ len, neu k trung` thi tao id ms
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id'=> $session_id,
                    'name'=> $data['name'],
                    'cart_id'=> $data['cart_id'],
                    'image'=> $data['image'],
                    'quantity'=> $data['qty'],
                    'price'=> $data['price'],
                );
                Session::put('cart',$cart);//dù có tồn tại hay k, thì cung tạo ss_put 
            }
        }else{
            $cart[] = array(
                'session_id'=> $session_id,
                'name'=> $data['name'],
                'cart_id'=> $data['id'],
                'image'=> $data['image'],
                'quantity'=> $data['qty'],
                'price'=> $data['price'],
            );
        }
        Session::put('cart',$cart);//dù có tồn tại hay k, thì cung tạo ss_put 

        Session::save();
    }
    public function showCartbyAjax()
    {
        $cart = Session::get('cart');
        
        $products = Product::where('status', 1)->get();
        
        return view('fronts.cart.show_cart_ajax', compact('listCategory'));
    }
    public function save_cart(Request $request)
    {
        $productID = $request->product_id_hidden;
        $products = Product::where('id',$productID)->first();
        $quantity = $request->qty;
        $data['id']=$products->id;
        $data['qty']=$quantity;
        $data['name']=$products->name;
        $data['price']=$products->price;
        $data['weight']='12';
        $data['options']['image']=$products->image;
        Cart::add($data);
        return Redirect()->route('show-cart');
        //dd($data);
    }
    public function deleteToCart($rowId)
    {
        Cart::update($rowId,0);//xoa sp dua vao rowId,va dua ve so luong = 0
        return Redirect()->route('show-cart');
    }
    public function updateQuantityToCart(Request $request)
    {
        $rowId = $request->rowId_cart;//khi goi post thi lay gia tri rowId
        $qty = $request->cart_quantity;//lấy số lượng
        Cart::update($rowId,$qty);//
        return Redirect()->route('show-cart');
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
        $product_id = $request->cart_id_hidden;
        $quantity = $request->qty;
        $product_data = Product::where('id', $product_id)->first();
        $quantity_storage = $request->quantity_storage;
        $data['id'] = $product_data->id;
        // dd($quantity_kho);
        $data['qty'] = $quantity;
        $data['name'] = $product_data->name;
        $data['price'] = $product_data->price;
        $data['weight'] = $quantity_storage;
        $data['options']['image'] = $product_data->image;
        $cart = Cart::content();
            if ($quantity < 0 || $quantity >10 || !is_numeric($quantity) || $quantity > $quantity_storage) {
                return Redirect()->back()->with('message', 'Số lượng hàng còn trong kho không đủ!');
            } else{
                $carts = Cart::add($data);
                // dd($carts);
                return Redirect()->route('show-cart');
            }
        // }
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
    public function update(Request $request)
    {
       

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
