<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function resources(): HasMany
    {
        return $this->hasMany('App\Resource');
    }
}
