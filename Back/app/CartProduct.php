<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    public $table = "cart_product";
    //


    public static function GetIfProductExist($productId)
    {
        if (CartProduct::get()->where("product_id", $productId)->first() != null) {
            return CartProduct::get()->where("product_id", $productId)->first();
        }
        return new CartProduct();
    }
}
