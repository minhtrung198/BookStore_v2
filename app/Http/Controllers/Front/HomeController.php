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
        $products = Product::where('status', 1)->paginate(8);//listproduct
        //list sách mơi về
        $productNew = Product::where('status',1)->get()->sortByDesc('created_at')->take(20);
        //dd($categories);
        return view('fronts.home.index',compact('products','categories','productNew'));
    }
    public function search(Request $request)
    {
        $key_word = $request->key;
        $listSearch = Product::with('category')->where('name','like','%'.$request->key.'%')
                            ->orWhere('price',$request->key)
                            ->orWhere('name',$request->key)
                            ->orWhereHas('category',function($query) use($key_word){
                            return $query->where('name','like','%'.$key_word.'%');
                            })->paginate(20);
        //dd($listSearch);
        return view('fronts.home.search',compact('listSearch'));
    }
    public function searchauto(Request $request)
    {
        $data = $request->all();
        if($data['query']){
            $products = Product::where('status',1)->where('name','LIKE','%'.$data['query'].'%')
                                ->orWhere('price','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;position:relative">';
            foreach($products as $key => $value){
                $output .=' <li class="li_search"><a href="">'.$value->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
        return view('fronts.home.search');
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
