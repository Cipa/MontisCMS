<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    protected $guarded = [];

    public function resources(): HasMany
    {
        return $this->hasMany('App\Resource');
    }
}
