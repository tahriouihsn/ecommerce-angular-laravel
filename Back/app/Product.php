<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }
}
