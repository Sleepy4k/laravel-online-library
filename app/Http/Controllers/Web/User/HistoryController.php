<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\WebController;
use App\Services\Web\User\HistoryService;
use App\DataTables\User\HistoryDataTable;

class HistoryController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(HistoryService $service, HistoryDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.user.history', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
