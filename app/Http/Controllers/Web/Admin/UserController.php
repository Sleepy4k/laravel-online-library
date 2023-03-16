<?php

namespace App\Http\Controllers\Web\Admin;

use App\Services\Web\Admin\UserService;
use App\DataTables\Admin\UserDataTable;
use App\Http\Controllers\WebController;
use App\Http\Requests\Web\Admin\User\StoreRequest;
use App\Http\Requests\Web\Admin\User\UpdateRequest;

class UserController extends WebController
{
    /**
     * @var UserService
     */
    private $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.user', $this->service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.form.admin.user.create', $this->service->create());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            return $this->service->store($request->validated()) ? to_route('admin.users.index') : back()->withInput();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            return view('partials.form.admin.user.show', $this->service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            return view('partials.form.admin.user.edit', $this->service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            return $this->service->update($request->validated(), $id) ? to_route('admin.users.index') : back()->withInput();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->service->destroy($id) ? to_route('admin.users.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
