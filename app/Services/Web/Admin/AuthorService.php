<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class AuthorService extends WebService
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
        return [];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->authorInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create author. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Author created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'author' => $this->authorInterface->findById($id),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'author' => $this->authorInterface->findById($id),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->authorInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update author. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Author updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->authorInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete author. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Author deleted successfully.', 'Success');

        return true;
    }
}
