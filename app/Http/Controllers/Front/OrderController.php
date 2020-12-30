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
use App\Mail\ShoppingMail;
use Auth;
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
        // dd('gg');
        $products = Product::where('status', 1)->get();
        $products = Cart::content();
        //$total=Cart::total();
        $cartqty=Cart::count();
        $cart = Session::get('cart');
        
        if ($cart) {
        // dd('gg1');
            $totalPayment = $this->subtotal($cart);
            $totalQuantity = $this->subquantity($cart);
        }else{
        // dd('gg2');
            $totalPayment = 0;
            $totalQuantity = 0;
        }
        //dd('gg');
        return view('fronts.cart.show_checkout',compact('products','users','cartCount','totalPayment','totalQuantity'));
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
        $totalPayment  = str_replace(',','',Cart::total(0,3));
        $cart = Session::get('cart');
        
        //dd($cart);
        if ($cart) {
            $totalPayment = $this->subtotal($cart);
            $totalQuantity = $this->subquantity($cart);
        }else{
            $totalPayment = 0;
            $totalQuantity = 0;
        }
        //dd($totalMoney);
        $order_id = array();
        $data = $request->all();
        //$user_id = !empty($request->get('user_id')) ? $request->get('user_id') : null ;
        // $user_id = $request->get('user_id');
        if(Session::get('user_id') != null){
                $order_id = Order::insertGetId([
                'user_id' =>  Session::get('user_id'),
                'id' => $request->id,
                'fullname' => $request->fullname,
                'total' => (int)$totalPayment,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'notes' => $request->notes,
                'quantity' =>$totalQuantity,
                'created_at' =>Carbon::now(),
                 ]);
        }
        else{
            $order_id = Order::insertGetId([
                'user_id'  =>  null,
                'id'       => $request->id,
                'fullname' => $request->fullname,
                'total'    => (int)$totalPayment,
                'address'  => $request->address,
                'phone'    => $request->phone,
                'email'    => $request->email,
                'notes'    => $request->notes,
                'quantity' =>$totalQuantity,
                'created_at' =>Carbon::now(),
                ]);
        }
        if($order_id){
            $cart = Session::get('cart');
            foreach($cart as $itemCart)
            {
                OrderDetail::insert([
                    // 'product_id' => $itemCart->id,
                    'order_id'   => $order_id,
                    'product_id' => $itemCart['product_id'],
                    'price'      => $itemCart['price'],
                    'phone'      => $request->phone,
                    'quantity'   => $itemCart['qty'],
                    'fullname'      => $request->fullname,
                    'created_at' =>Carbon::now(),
                ]);
            }
            $totalPayment = $this->subtotal($cart);
            $totalQuantity = $this->subquantity($cart);
            $this->sendOrderConfirmationMail($data, $cart, $totalPayment,$totalQuantity);
        }
       
        Session::forget('cart');
        return redirect('/')->with('message','Cảm ơn bạn đã đặt hàng.');
    }
   
    public function sendOrderConfirmationMail($order_id, $cart, $totalPayment,$totalQuantity){
        $toEmail = $order_id['email'];
        $fromEmail ='khanhlytran109@gmail.com';
        $username = $order_id['fullname'];
        $data =['fullname' => $username, 'order_id' => $order_id, 'cart' => $cart, 'total' => $totalPayment,'totalQuantity' => $totalQuantity];
        \Mail::send('fronts.mails.sendMail', $data, function($message) use ($toEmail, $fromEmail, $username){
            $message->to($toEmail, $username);
            $message->subject('Order Confirmation Mail');
        });
    }
    //ham tinh tong tien
    public function subtotal($cart)
    {
        //dd($cart);
        $subtotal = 0;
        foreach ($cart as $key => $cat) {
             //dd($cat);
            $subtotal += $cat['qty']*$cat['price'];
        }
        return $subtotal;
    }
    //ham tinh so luong
    public function subquantity($cart){
        $subquantity = 0;
        foreach ($cart as $key => $cat) {
             //dd($cat);
            $subquantity += $cat['qty'];
        }
        return $subquantity;
    }
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
    public function show()
    {
        // $cart = Session::get('cart');
        // // if ($cart) {
        // // // dd('gg1');

        // //     $totalPayment = $this->subtotal($cart);
        // // }else{
        // // dd('gg2');

        // //     $totalPayment = 0;
        // // }
        // return view('fronts.cart.show_checkout',compact('cart'));
        
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
