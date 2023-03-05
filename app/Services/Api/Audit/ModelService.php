<?php

namespace App\Services\Api\Audit;

use App\Services\ApiService;
use App\Http\Resources\Audit\ModelResource;

class ModelService extends ApiService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = $this->auditInterface->all(['*'], [], [['log_name', 'model']]);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => ModelResource::collection($model)
        ], 202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = $this->auditInterface->findById($id, ['*'], [], [['log_name', 'model']]);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new ModelResource($model)
        ], 206);
    }
}
