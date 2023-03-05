<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\BookCategoryResource;

class BookCategoryService extends ApiService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookCategoryInterface->all();

        if (count($books) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => BookCategoryResource::collection($books)
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
        $book = $this->bookCategoryInterface->create($request);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new BookCategoryResource($book)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->bookCategoryInterface->findById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new BookCategoryResource($book)
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
            'data' => new BookCategoryResource($book)
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookCategoryInterface->deleteById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => []
        ], 202);
    }
}
