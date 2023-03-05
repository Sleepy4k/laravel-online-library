<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\AuthorResource;

class AuthorService extends ApiService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = $this->authorInterface->all();

        if (count($authors) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => AuthorResource::collection($authors)
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => 'Tidak ada data yang tersedia'
        ], 202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        $author = $this->authorInterface->create($request);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new AuthorResource($author)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = $this->authorInterface->findById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new AuthorResource($author)
        ], 206);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        if (empty($request)) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => 'Tidak ada data yang diubah'
            ], 202);
        }

        $author = $this->authorInterface->update($id, $request);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new AuthorResource($author)
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorInterface->deleteById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => []
        ], 202);
    }
}
