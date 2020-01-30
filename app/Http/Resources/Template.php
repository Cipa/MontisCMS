<?php

namespace App\Http\Resources;

use App\Http\Resources\Tv as TvResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Template extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            [
                'tvs' => new TvResource($this->tvs),
            ]
        );
    }
}
