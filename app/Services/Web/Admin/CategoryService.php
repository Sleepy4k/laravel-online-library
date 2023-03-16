<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class CategoryService extends WebService
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
            $this->bookCategoryInterface->create($request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create category. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Category created successfully.', 'Success');

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'category' => $this->bookCategoryInterface->findById($id),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [
            'category' => $this->bookCategoryInterface->findById($id),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        try {
            $this->bookCategoryInterface->update($id, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to update category. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Category updated successfully.', 'Success');

        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->bookCategoryInterface->deleteById($id);
        } catch (\Throwable $th) {
            toastr()->error('Failed to delete category. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Category deleted successfully.', 'Success');

        return true;
    }
}
