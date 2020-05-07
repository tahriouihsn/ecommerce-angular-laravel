<?php

// this Zahia was Created by Hamza and Hassan

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Zahia Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }


}


