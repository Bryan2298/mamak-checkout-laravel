<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function checkout() {
        return $this->belongsTo(Checkout::class);
    }
}
