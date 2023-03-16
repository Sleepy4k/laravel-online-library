<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class PublisherService extends WebService
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
            $this->publisherInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create publisher. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Publisher created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'publisher' => $this->publisherInterface->findById($id),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'publisher' => $this->publisherInterface->findById($id),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->publisherInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update publisher. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Publisher updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->publisherInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete publisher. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Publisher deleted successfully.', 'Success');

        return true;
    }
}
