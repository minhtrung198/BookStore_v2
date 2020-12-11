<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->paginate(8);
       
        //dd($categories);
        return view('fronts.home.index',compact('products','categories'));
    }
    public function search(Request $request)
    {
        //$products = Product::where('status', 1)->get();
        $listSearch = Product::where('name','like','%'.$request->key.'%')
                            ->orWhere('price',$request->key)
                            ->orWhere('name',$request->key)->with('categories')
                            ->get();
        // $key_value = $request->key;
        // $categories = Category::where('status', 1)->get();
        // $listSearch = Product::where('name', 'like', '%'.$key_value.'%')
                            // ->orWhere('price', 'like', '%'.$key_value.'%')
                            // ->get();
        //dd($listSearch);
       
        return view('fronts.home.search',compact('categories','listSearch'));
    }
    public function showContactForm()
    {
        $categories = Category::where('status', 1)->get();
        return view('fronts.home.contact',compact('categories'));
    }
    public function sendEmail(Request $request)
    {
        $toEmail = $request->email;
        $fromEmail = 'admin@gmail.com';
        $data = ['content'=>$request->content,'username'=>'Trung admin'];
        \Mail::send('fronts.mails.contact-us',$data,function($message) use ($toEmail,$fromEmail){
            $message->to($toEmail,'Admin');
            $message->from($fromEmail,'Customer');
            $message->subject('Contact Mail');
        });
        return 'success';
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
