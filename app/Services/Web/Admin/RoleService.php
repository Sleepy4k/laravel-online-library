<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;
use Illuminate\Support\Facades\DB;

class RoleService extends WebService
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
            'guards' => config('guard.name'),
            'permissions' => $this->permissionInterface->all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->roleInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create role. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Role created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'role' => $this->roleInterface->findById($id, ['*'], ['permissions'])
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'guards' => config('guard.name'),
            'permissions' => $this->permissionInterface->all(),
            'role' => $this->roleInterface->findById($id),
            'role_permissions' => DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all()
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->roleInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update role. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Role updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->roleInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete role. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Role deleted successfully.', 'Success');

        return true;
    }
}
