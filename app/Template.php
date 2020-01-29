<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Template extends Model
{
    protected $guarded = [];

    public function resources(): HasMany
    {
        return $this->hasMany('App\Resource');
    }

    public function tvs(): BelongsToMany
    {
        return $this->belongsToMany('App\Tv');
    }
}
