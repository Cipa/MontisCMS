<?php

namespace App\Http\Resources;

use App\Template;
use Illuminate\Support\Facades\Blade;
use App\Http\Resources\TemplateResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Wpb\String_Blade_Compiler\Facades\StringBlade;
use Wpb\String_Blade_Compiler\Compilers\BladeCompiler;

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
        $parsedContent = \View::make(['template' => Blade::compileString($this->content)], ['token' => 'I am the child template'])->render();

        return array_merge(
            parent::toArray($request),
            [
                'template' => $this->template,
                'type' => $this->type,
                'parsedContent' => $parsedContent
            ]
        );
    }
}
