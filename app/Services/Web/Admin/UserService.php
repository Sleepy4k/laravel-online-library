<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class UserService extends WebService
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
            'genders' => config('gender.list'),
            'grades' => $this->gradeInterface->all(),
            'roles' => config()->get('role.seeder.list')
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->userInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create user. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('User created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'user' => $this->userInterface->findById($id, ['*'], ['grade'])
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'genders' => config('gender.list'),
            'grades' => $this->gradeInterface->all(),
            'roles' => config()->get('role.seeder.list'),
            'user' => $this->userInterface->findById($id)
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->userInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update user. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('User updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->userInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete user. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('User deleted successfully.', 'Success');

        return true;
    }
}
