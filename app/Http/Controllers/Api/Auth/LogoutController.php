<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LogoutService;

class LogoutController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
