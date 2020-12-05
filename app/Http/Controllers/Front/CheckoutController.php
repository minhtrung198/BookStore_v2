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
class CheckoutController extends Controller
{
    public function index()
    {
        return view('fronts.cart.show_checkout');
    }
}
