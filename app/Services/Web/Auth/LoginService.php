<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class LoginService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        if (auth()->attempt($request)) {
            request()->session()->regenerate();

            $user = auth()->user();

            activity('auth')
                ->causedBy($user)
                ->withProperties($request)
                ->log($user->name . ' logged in.');

            toastr()->success('You have successfully logged in.', 'Login Successful!');

            return true;
        } else {
            toastr()->error('Invalid credentials. Please try again.', 'Login Failed!');

            return false;
        }
    }
}
