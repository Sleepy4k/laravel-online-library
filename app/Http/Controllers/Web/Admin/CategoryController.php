<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\CategoryService;
use App\DataTables\Admin\CategoryDataTable;
use App\Http\Requests\Web\Admin\Category\StoreRequest;
use App\Http\Requests\Web\Admin\Category\UpdateRequest;

class CategoryController extends WebController
{
    /**
     * @var CategoryService
     */
    private $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.category', $this->service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.form.admin.category.create', $this->service->create());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            return $this->service->store($request->validated()) ? to_route('admin.categories.index') : back()->withInput();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return view('partials.form.admin.category.show', $this->service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            return view('partials.form.admin.category.edit', $this->service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            return $this->service->update($request->validated(), $id) ? to_route('admin.categories.index') : back()->withInput();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return $this->service->destroy($id) ? to_route('admin.categories.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
