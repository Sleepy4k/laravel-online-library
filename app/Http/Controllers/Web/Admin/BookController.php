<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Services\Web\Admin\BookService;
use App\DataTables\Admin\BookDataTable;
use App\Http\Controllers\WebController;

class BookController extends WebController
{
    /**
     * @var BookService
     */
    private $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BookDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.book', $this->service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.form.admin.book.create', $this->service->create());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
