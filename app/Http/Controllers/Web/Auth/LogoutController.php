<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Web\Auth\LogoutService;

class LogoutController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutService $service)
    {
        try {
            $service->invoke();

            return to_route('landing.index');
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
