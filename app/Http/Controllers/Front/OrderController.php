<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Mail;
use Auth;
use App\Mail\ShoppingMail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateOrderRequest;
use App\Models\OrderDetail;
use Carbon\Carbon;

session_start();
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::where('status', 1)->get();
        $products = Cart::content();
        $totalAmount = Cart::priceTotal();
        $cartCount = Cart::content()->count();
        //$users = Cart::session(auth()->id());
        return view('fronts.cart.show_checkout',compact('products','users','$totalAmount','$cartCount'));
    }

    public function save_checkout(Request $request)
    {
        $this->validate($request,
            [
                'fullname' => 'required',
                'email' => 'email',
                'phone' => 'required|numeric',
                'address' => 'required'
            ],
            [
                'fullname.required' => 'Tên không được bỏ trống.',
                //'email.required' => 'Email không được bỏ trống.',
                'email.email' => 'Email không đúng.',
                'phone.required' => 'Điện thoại không được bỏ trống.',
                //'phone.max' => 'Số điện thoại không đúng số.',
                'phone.numeric' => 'Số điện thoại không đúng.',
                'address.required' => 'Bạn chưa nhập địa chỉ.'
            ]
        );

        $totalMoney = str_replace(',','',Cart::subtotal(0,3));
        $cart = Session::get('cart');
        //dd($totalMoney);
        $order_id = array();
        $user_id = $request->get('user_id');
        if($user_id != null){
            $cart = Cart::content();
            if(Cart::count() >= 1){
                $order_id = Order::insertGetId([
                'user_id' =>  $user_id,
                'id' => $request->id,
                'fullname' => $request->fullname,
                'total' => (int)$totalMoney,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'quantity' =>$request->quantity,
                'created_at' =>Carbon::now(),
                 ]);
                 //Cart::destroy();
                //  $total = Cart::priceTotal();
                // $this->sendOrderConfirmationMail($order_id, $cart, $total);
                //return redirect('/')->with('message','Cảm ơn bạn đã đặt hàng.');
            }
            else{
                return redirect('/show-checkout')->with('error', 'There is nothing to order!')->withInput();
                
            }
        }
        //dang nhap
        else{
            $order_id = Order::insertGetId([
                'user_id' =>  null,
                'id' => $request->id,
                'fullname' => $request->fullname,
                'total' => (int)$totalMoney,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'quantity' =>$request->quantity,
                'created_at' =>Carbon::now(),
                ]);
                // $total = Cart::priceTotal();
                // $this->sendOrderConfirmationMail($order_id, $cart, $total);
        }
        //else{
        if($order_id)
        {
            $products = Cart::content();
            if(Cart::count() >= 1){
                foreach($products as $product)
                {
                    OrderDetail::insert([
                        'order_id' => $order_id,
                        'product_id' => $product->id,
                        'quantity' => $product->quantity,
                        'price' => $product->price,
                        'created_at' => Carbon::now(),
                    ]);
                //     $total = Cart::priceTotal();
                // $this->sendOrderConfirmationMail($order_id, $cart, $total);
                }
            }    
            Cart::destroy();
        return redirect('/')->with('message','Cảm ơn bạn đã đặt hàng.');
    
        }
        // Mail::to($order_id->email)->send(new ShoppingMail($order_id));
        // // Cart::destroy();
        // Session::forget('cart');
        // $listCategory = Category::where('status', 1)->get();
        
       //dd($request->all());
    }
    // public function sendOrderConfirmationMail($orderInfo, $cart, $total){
    //     $toEmail = $orderInfo['email'];
    //     $fromEmail ='admin@gmail.com';
    //     $username = $orderInfo['username'];
    //     $data =['username' => $username, 'orderInfo' => $orderInfo, 'cart' => $cart, 'total' => $total];
    //     \Mail::send('mails.contact-us', $data, function($message) use ($toEmail, $fromEmail, $username){
    //         $message->to($toEmail, $username);
    //         $message->subject('Order Confirmation Mail');
    //     });
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
