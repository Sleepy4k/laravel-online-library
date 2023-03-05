<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\PublisherService;
use App\Http\Requests\Api\Main\Publisher\StoreRequest;
use App\Http\Requests\Api\Main\Publisher\UpdateRequest;

class PublisherController extends ApiController
{
    /**
     * @var PublisherService
     */
    private $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(PublisherService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            return $this->service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return $this->service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            return $this->service->update($request->validated(), $id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return $this->service->destroy($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
