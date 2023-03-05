<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use App\Http\Resources\ProfileResource;

class RegisterService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke($request)
    {
        $user = $this->userInterface->create($request);

        return $this->createResponse(trans('api.register.success'), [
            'data' => new ProfileResource($user)
        ], 202);
    }
}