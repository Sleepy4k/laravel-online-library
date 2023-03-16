<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;
use App\Services\Web\Admin\SystemService;
use App\DataTables\Admin\SystemDataTable;
use App\DataTables\Admin\SystemShowDataTable;

class SystemController extends WebController
{
    /**
     * @var SystemService
     */
    private $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(SystemService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SystemDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.system', $this->service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(SystemShowDataTable $dataTable, string $id)
    {
        try {
            return $dataTable->render('partials.form.admin.system.show', $this->service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
