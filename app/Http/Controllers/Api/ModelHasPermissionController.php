<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ModelHasPermission\StoreModelHasPermissionRequest;
use App\Http\Requests\Api\ModelHasPermission\UpdateModelHasPermissionRequest;
use App\Http\Resources\Api\ModelHasPermission\ModelHasPermissionResource;
use App\Http\SearchFilters\Api\ModelHasPermission\ModelHasPermissionSearch;
use App\Models\ModelHasPermission;
use App\Services\ModelHasPermissionService;
use Illuminate\Http\Request;

class ModelHasPermissionController extends Controller
{

    protected $service;

    public function __construct(ModelHasPermissionService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', ModelHasPermission::class);
        return ModelHasPermissionResource::collection(ModelHasPermissionSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelHasPermissionRequest $request)
    {
        $this->authorize('create', ModelHasPermission::class);

        $attributes = $request->all();

        return $this->service->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', ModelHasPermission::class);
        return new ModelHasPermissionResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateModelHasPermissionRequest $request)
    {
        $this->authorize('update', ModelHasPermission::class);

        $attributes = $request->all();

        return $this->service->update($id, $attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete', ModelHasPermission::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
