<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }
}
