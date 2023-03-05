<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\PublisherResource;

class PublisherService extends ApiService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->publisherInterface->all();

        if (count($students) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => PublisherResource::collection($students)
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
        $student = $this->publisherInterface->create($request);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new PublisherResource($student)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->publisherInterface->findById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new PublisherResource($student)
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

        $book = $this->bookCategoryInterface->update($id, $request);

        return $this->createResponse('Data berhasil diubah', [
            'data' => new PublisherResource($book)
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->publisherInterface->deleteById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => []
        ], 202);
    }
}
