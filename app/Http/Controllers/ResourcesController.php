<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource as ResourceResource;
use App\Resource;
use App\TvValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourceResource::collection(Resource::with('template.tvs')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {

        // dd(TvValue::where('tv_id', 1)->with('tv')->get()->toArray());

        return new ResourceResource($resource);

        // return new ResourceResource(
        //     Resource::with(['tvValues.tv'])->first()
        // );


        // return new ResourceResource(
        //     Resource::with(['template.tvs', 'template.tvs.value' => function ($q) use ($resource) {
        //         $q->where('resource_id', $resource->id); //only one value per tv/resource
        //     }])->first()
        // );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    // public function edit(Resource $Resource)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {

        //remove TVs
        $validatedData = $this->validateData($request);
        $tvValues = $validatedData['tv_values'];

        unset($validatedData['tv_values']);
        $resource->update($validatedData); //update resource

        foreach ($tvValues as $key => $value) {
            $resource->tvValues()->where('tv_id', $key)->update($value); //update tvs
        }

        return (new ResourceResource($resource))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }


    private function validateData($request)
    {
        //make sure alias is regenerated from title, if empty
        request()->merge(['alias' => request()->alias ? Str::slug(request()->alias, '-') : Str::slug(request()->title, '-')]);

        $validateWith = [
            'title' => 'required|max:255',
            'menu_title' => 'max:255',
            'alias' => 'alpha_dash|max:255',
            'description' => 'max:255',
            'content' => 'present', //TODO: purify
            'type_id' => 'integer',
            'template_id' => 'integer',
        ];

        foreach (request()->tv_values as $key => $tv_value) {
            $validateWith['tv_values.' . $key . '.value'] = 'present';
        }

        return request()->validate($validateWith);
    }
}
