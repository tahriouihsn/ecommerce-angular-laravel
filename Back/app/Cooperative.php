<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    //
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function store($coop)
    {
        $this->name = $coop["name"];
        $this->matricule = $coop["matricule"];
        $this->save();
    }
}
