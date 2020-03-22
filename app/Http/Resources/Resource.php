<?php

namespace App\Http\Resources;

use App\Http\Resources\Template as TemplateResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\DB;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parsedContent = \View::make(['template' => Blade::compileString($this->content)], ['token' => 'I am the child template'])->render();

        return array_merge(
            parent::toArray($request),
            [
                'template' => new TemplateResource($this->template),
                'tv_values' => TvValue::collection($this->tvValues)->keyBy('tv_id'),
                'type' => $this->type,
                'parsedContent' => $parsedContent
            ]
        );
    }
}
