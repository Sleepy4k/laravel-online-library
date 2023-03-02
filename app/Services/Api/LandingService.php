<?php

namespace App\Services\Api;

use App\Services\ApiService;

class LandingService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        return $this->createResponse(trans('api.response.accepted'), [
            'data' => []
        ], 202);
    }
}
