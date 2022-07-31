<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Checkout;

class CheckoutController extends Controller
{
    public function checkout(Request $item) {
        
        $checkout = new Checkout();
        $checkout->scan($item); // Get the request and call the scan function in our Checkout class
        
        return redirect()->route("root");
    }

    public function clearItems() {
        Checkout::truncate();
        return redirect()->route("root");
    }
}
