<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Checkout;

class HomeController extends Controller
{
    
    public function home() {
        $products = Product::all();
        $checkout_list = Checkout::all();
        $total_price = $checkout_list->sum("product_price");
        return view('welcome', ["products" => $products, "checkout_list" => $checkout_list, "total_price" => $total_price]);
    }
}
