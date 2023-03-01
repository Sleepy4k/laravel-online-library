<?php

namespace App\Http\Controllers;

use App\Traits\SystemLog;

class WebController extends Controller
{
    use SystemLog;

    /**
     * Default route name
     *
     * @var string
     */
    protected $routeName = '';

    /**
     * Default path for index function
     *
     * @var string
     */
    protected $indexView = '';

    /**
     * Default path for create function
     *
     * @var string
     */
    protected $createView = '';

    /**
     * Default path for show function
     *
     * @var string
     */
    protected $showView = '';

    /**
     * Default path for edit function
     *
     * @var string
     */
    protected $editView = '';

    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    protected function redirectError($error)
    {
        $this->sendReportLog('error', $error->getMessage());

        return back();
    }
}