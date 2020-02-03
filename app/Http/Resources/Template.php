<?php

namespace App\Http\Resources;

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
                'tvs' => new TvCollection($this->tvs),
                'tvs1' => Tv::collection($this->tvs),
                //'posts' => PostResource::collection($this->posts),
            ]
        );
    }
}
