<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\HistoryService;
use App\DataTables\Admin\HistoryDataTable;

class HistoryController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(HistoryService $service, HistoryDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.history', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
