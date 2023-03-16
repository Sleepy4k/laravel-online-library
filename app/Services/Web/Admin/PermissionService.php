<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class PermissionService extends WebService
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
            'guards' => config('guard.name')
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->permissionInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create permission. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Permission created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'permission' => $this->permissionInterface->findById($id),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'guards' => config('guard.name'),
            'permission' => $this->permissionInterface->findById($id)
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->permissionInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update permission. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Permission updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->permissionInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete permission. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Permission deleted successfully.', 'Success');

        return true;
    }
}
