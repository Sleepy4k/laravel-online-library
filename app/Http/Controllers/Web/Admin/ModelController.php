<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\ModelService;
use App\DataTables\Admin\ModelDataTable;

class ModelController extends WebController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ModelService $service, ModelDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.model', $service->invoke());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
