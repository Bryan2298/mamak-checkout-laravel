<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    public function product() {
        return $this->hasOne(Product::class, "code", "product_code");
    }

    public function scan($item) {

        $item->validate([
            "product_code" => "required|exists:products,code"
        ]);

        $product = Product::where("code", $item->product_code)->first(); // Get the current product selected from the products table by product code.
        $selectedPrice = 0;

        if($product->type == "drink") {   
            $selectedItem = Checkout::where('product_code', $product->code)->count() + 1; // We add 1 here as the initial count will be 0 (as there is no products in our checkout yet)
            $selectedPrice = $selectedItem % 2 == 0 ? 0 : $product->price; // Pricing Rule for drinks (Buy 1 Free 1)
        } else {
            if($product->code == 'F001') {
                $selectedItem = Checkout::where('product_code', "F001")->count() + 1; // We add 1 here as the initial count will be 0 (as there is no products in our checkout yet)
                $selectedPrice = $selectedItem >= 2 ? 1.2 : $product->price; // Pricing Rule for roti canai (Buy more than 1, then all roti canai will be RM1.20)
            } else {
                $selectedPrice = $product->price;
            }
        }

        $checkout = new self;
        $checkout->product_code = $item->product_code;
        $checkout->product_price = $selectedPrice;
        $checkout->save();

        // Update existing roti canais in the checkout db if the price is not updated if there are more than 1 roti canais.
        $allRotiCanai = self::where('product_code', "F001")->get();
        if (count($allRotiCanai) >= 2) {
            foreach ($allRotiCanai as $roti_cana) {
                self::where('product_price', 1.5)->where('id', $roti_cana->id)->update(['product_price' => 1.2]);
            }
        }
    }
}
