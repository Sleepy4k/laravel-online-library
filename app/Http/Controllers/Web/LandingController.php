<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;

class LandingController extends ApiController
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('pages.user.main');
    }
}
