<?php

namespace App\Services\Web\User;

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'book' => $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category']),
        ];
    }
}
