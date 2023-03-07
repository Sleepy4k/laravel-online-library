<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class LogoutService extends WebService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        $user = auth()->user();

        activity('auth')
            ->causedBy($user)
            ->withProperties($user)
            ->log($user->name . ' logged out.');

        auth()->logout();

        $session = request()->session();
        $session->invalidate();
        $session->regenerateToken();
        
        toastr()->success('You have successfully logged out.', 'Logout Successful!');

        return;
    }
}
