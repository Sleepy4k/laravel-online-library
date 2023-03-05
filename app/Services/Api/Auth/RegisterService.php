<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use App\Http\Resources\Main\ProfileResource;

class RegisterService extends ApiService
{
    /**
     * Handle the incoming request.
     */
    public function invoke(array $request)
    {
        $user = $this->userInterface->create($request);

        return $this->createResponse(trans('api.register.success', ['username' => $user->name]), [
            'data' => new ProfileResource($user)
        ], 202);
    }
}
