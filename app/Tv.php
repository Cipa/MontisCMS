<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tv extends Model
{
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo('App\TvType');
    }
}
