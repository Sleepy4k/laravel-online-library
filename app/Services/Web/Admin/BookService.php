<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class BookService extends WebService
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
            'authors' => $this->authorInterface->all(['id', 'name']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name']),
            'publishers' => $this->publisherInterface->all(['id', 'name']),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        return [];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $request, string $id)
    {
        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return [];
    }
}
