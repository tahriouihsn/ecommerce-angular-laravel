<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store($number, $userId)
    {
        $this->value = $number["value"];
        $this->user_id = $userId;
        $this->save();
    }
}
