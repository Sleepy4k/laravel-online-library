<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\BookResource;

class BookService extends ApiService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->bookInterface->all(['*'], ['author', 'publisher', 'category']);

        if (count($books) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => BookResource::collection($books)
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
        $this->bookInterface->create($request);
        $book = $this->bookInterface->all(['*'], ['author', 'publisher', 'category']);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new BookResource($book)
        ], 206);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category']);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new BookResource($book)
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

        $this->bookInterface->update($id, $request);
        $book = $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category']);

        return $this->createResponse('Data berhasil diubah', [
            'data' => new BookResource($book)
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookInterface->deleteById($id);

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => []
        ], 202);
    }
}
