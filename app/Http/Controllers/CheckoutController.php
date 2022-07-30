<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Checkout;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {
        $request->validate([
            "product_code" => "required|exists:products,code"
        ]);

        $product = Product::where("code", $request->product_code)->first();
        $selectedPrice = 0;

        if($product->type == "drink") {   
            $selectedItem = Checkout::where('product_code', $product->code)->count();
            $selectedPrice = $selectedItem % 2 != 0 ? 0 : $product->price;
        } else {
            if($product->code == 'F001') {
                $selectedItem = Checkout::where('product_code', "F001")->count();
                $selectedPrice = $selectedItem >= 1 ? 1.2 : $product->price;
            } else {
                $selectedPrice = $product->price;
            }
        }

        $checkout = new Checkout();
        $checkout->product_code = $request->product_code;
        $checkout->product_price = $selectedPrice;
        $checkout->save();

        // Update existing roti canais if the price is not updated if there are more than 1 roti canais.
        $rotiCanaiAllId = Checkout::where('product_code', "F001")->get();
        if (count($rotiCanaiAllId) >= 2) {
            foreach ($rotiCanaiAllId as $item) {
                Checkout::where('product_price', 1.5)->where('id', $item->id)->update(['product_price' => 1.2]);
            }
        }
        
        return redirect()->route("root");
    }

    public function clearItems() {
        Checkout::truncate();
        return redirect()->route("root");
    }
}
