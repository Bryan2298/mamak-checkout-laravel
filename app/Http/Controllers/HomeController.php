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

        $checkout = new Checkout();
        $total_price = $checkout->all()->sum("product_price"); // To get the sum of products in our checkout
        
        return view('welcome', ["products" => $products, "checkout_list" => $checkout_list, "total_price" => $total_price]);
    }
}
