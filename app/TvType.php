<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TvType extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function tvs(): HasMany
    {
        return $this->hasMany('App\Tv');
    }
}
