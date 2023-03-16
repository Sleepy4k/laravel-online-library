<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class BookService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return [
            'authors' => $this->authorInterface->all(['id', 'name']),
            'publishers' => $this->publisherInterface->all(['id', 'name']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name']),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->bookInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create book. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Book created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'book' => $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category']),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'authors' => $this->authorInterface->all(['id', 'name']),
            'publishers' => $this->publisherInterface->all(['id', 'name']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name']),
            'book' => $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category']),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->bookInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update book. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Book updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->bookInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete book. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Book deleted successfully.', 'Success');

        return true;
    }
}
