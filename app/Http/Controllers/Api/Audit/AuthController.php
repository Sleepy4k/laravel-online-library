<?php

namespace App\Http\Controllers\Api\Audit;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Services\Api\Audit\AuthService;

class AuthController extends ApiController
{
    /**
     * @var AuthService
     */
    public $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
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
            return $this->service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
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
