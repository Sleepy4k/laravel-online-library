<?php

namespace App\Services\Api\Error;

use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        return $this->createResponse(trans('api.fallback.error'), [
            'error' => trans('api.fallback.message')
        ], 404);
    }
}