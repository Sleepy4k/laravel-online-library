<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\LandingService;
use App\Http\Controllers\ApiController;

class LandingController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LandingService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
