<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store($adress, $userId)
    {

        $this->value  = $adress["value"];
        $this->user_id  = $userId;
        $this->save();
    }
}
