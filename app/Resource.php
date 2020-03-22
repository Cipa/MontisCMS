<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function template(): BelongsTo
    {
        return $this->belongsTo('App\Template');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo('App\Type');
    }

    public function tvValues(): HasMany
    {
        return $this->hasMany('App\TvValue');
    }
}
