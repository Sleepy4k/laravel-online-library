<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\BorrowService;
use App\DataTables\Admin\BorrowDataTable;

class BorrowController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BorrowService $service, BorrowDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.borrow', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
