<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\DashboardService;

class DashboardController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DashboardService $service)
    {
        try {
            return view('pages.admin.main', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
