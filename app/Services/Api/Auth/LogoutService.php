<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use App\Http\Resources\ProfileResource;

class LogoutService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        $user = auth('sanctum')->user();
        $user->tokens()->delete();

        return $this->createResponse(trans('api.logout.success'), [
            'data' => new ProfileResource($user)
        ], 202);
    }
}