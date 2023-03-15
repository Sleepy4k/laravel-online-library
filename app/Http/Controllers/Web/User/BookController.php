<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Services\Web\User\BookService;
use App\DataTables\User\BookDataTable;
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
            return $dataTable->render('pages.user.book', $this->service->index());
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
    public function show(string $id)
    {
        try {
            return view('partials.form.user.book.show', $this->service->show($id));
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
