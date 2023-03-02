<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\RegisterService;
use App\Http\Requests\Api\Auth\RegisterRequest;

class RegisterController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request, RegisterService $service)
    {
        try {
            return $service->invoke($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
