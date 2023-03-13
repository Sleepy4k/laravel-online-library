<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\WebController;
use App\Services\Web\Auth\LogoutService;

class LogoutController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutService $service)
    {
        try {
            $service->invoke();

            return to_route('landing');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
