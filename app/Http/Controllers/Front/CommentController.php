<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function comment($id,Request $request)
    {
        $product_id = $id;
        $products = Comment::with('user')->find($id);
        $comments = new Comment;
        $comments->product_id = $product_id;
        $comments->user_id = Auth::user()->id;
        $comments->comment = $request->comment;
        $comments->save();
        //dd($comments);  
        return redirect()->route('product.detail',compact('products'));
    }
}
