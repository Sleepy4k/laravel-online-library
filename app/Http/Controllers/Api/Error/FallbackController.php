<?php

namespace App\Http\Controllers\Api\Error;

use App\Http\Controllers\ApiController;
use App\Services\Api\Error\FallbackService;

class FallbackController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FallbackService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
