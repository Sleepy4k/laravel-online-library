<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LoginService;
use App\Http\Requests\Api\Auth\LoginRequest;

class LoginController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request, LoginService $service)
    {
        try {
            return $service->invoke($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
