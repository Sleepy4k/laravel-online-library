<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\ProfileService;

class ProfileController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProfileService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
