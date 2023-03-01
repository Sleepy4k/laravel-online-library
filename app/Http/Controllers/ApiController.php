<?php

namespace App\Http\Controllers;

use App\Traits\ApiRespons;

class ApiController extends Controller
{
    use ApiRespons;
    
    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    protected function catchError($error)
    {
        $this->sendReportLog('error', $error->getMessage());

        return $this->createResponse('Server Error', [
            'error' => 'Internal server error'
        ], 500);
    }
}