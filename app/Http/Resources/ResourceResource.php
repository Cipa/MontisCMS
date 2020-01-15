<?php

namespace App\Http\Resources;

use App\Template;
use App\Http\Resources\TemplateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResource extends JsonResource
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
                'template' => $this->template,
                'type' => $this->type
            ]
        );
    }
}
