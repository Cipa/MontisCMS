<?php

namespace App\Http\Resources;

use App\Template;
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
        $data = parent::toArray($request);
        $data['template'] = Template::where('id', $this->template)->first();
        return [
            'data' => $data,
            'links' => [
                'self' => '',
            ],
        ];
    }
}
