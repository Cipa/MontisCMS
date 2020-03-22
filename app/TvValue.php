<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TvValue extends Model
{
    public $timestamps = false;

    public function tv(): HasOne
    {
        return $this->hasOne('App\Tv', 'id', 'tv_id');
    }
}
