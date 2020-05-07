<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function getActiveCartIfExist($userId)
    {
        if (Cart::get()->where("user_id", $userId)->first() != null) {
            return Cart::get()->where("user_id", $userId)->first();
        }

        $c = new Cart();
        $c->user_id = $userId;
        $c->save();

        return $c;
    }
}
