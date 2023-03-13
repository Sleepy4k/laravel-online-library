<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\WebController;
use App\Services\Web\User\BorrowService;

class BorrowController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BorrowService $service, string $id)
    {
        try {
            return $service->invoke($id) ? to_route('loans.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
