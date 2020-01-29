<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
