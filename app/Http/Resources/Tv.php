<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tv extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        if ($this->value === null) {
            //missing value? init with default tv value
            return array_merge(

                parent::toArray($request),
                [
                    'value' => [
                        'tv_id' => $this->id,
                        'resource_id' => (int) $request->segments()[2], //TODO: find a better solution
                        'value' =>  $this->default_value
                    ],
                ]
            );
        } else {

            return array_merge(
                parent::toArray($request),
                [
                    'value' => new TvValue($this->value),
                ]
            );
        }
    }
}
