<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\ProfileResource;

class ProfileService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        $user = auth('sanctum')->user();

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new ProfileResource($user),
        ], 202);
    }
}
