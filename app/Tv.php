<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tv extends Model
{
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo('App\TvType');
    }

    public function templates(): BelongsToMany
    {
        return $this->belongsToMany('App\Template');
    }

    public function values(): HasMany
    {
        return $this->hasMany('App\TvValue');
    }

    //help get only one value per tv/resource, make sure where is used in the query
    // public function value(): HasOne
    // {
    //     return $this->hasOne('App\TvValue');
    // }
}
