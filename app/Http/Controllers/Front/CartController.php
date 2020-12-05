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
        return view('fronts.cart.show_cart',compact('listCategory','productID','quantity','products'));
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        print_r($data);
    }
    public function save_cart(Request $request)
    {
        $productID = $request->product_id_hidden;
        $products = Product::where('id',$productID)->first();
        $quantity = $request->qty;
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
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
