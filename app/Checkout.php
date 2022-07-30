<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function product() {
        return $this->hasOne(Product::class, "code", "product_code");
    }
}
