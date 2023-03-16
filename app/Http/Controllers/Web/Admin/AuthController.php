<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\AuthService;
use App\DataTables\Admin\AuthDataTable;

class AuthController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthService $service, AuthDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.auth', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
