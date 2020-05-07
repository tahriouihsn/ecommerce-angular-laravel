<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function IsExist($productId)
    {
        if (count(Review::get()->where("product_id", $productId)->where("user_id", Auth::user())) == 0) {
            return false;
        }
        return true;
    }
}
