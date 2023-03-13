<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\LandingService;
use App\Http\Controllers\WebController;

class LandingController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LandingService $service)
    {
        try {
            return view('pages.user.main', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
