<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class RegisterService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'genders' => config('gender.list'),
            'grades' => $this->gradeInterface->all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        $user = $this->userInterface->create($request);

        activity('auth')
            ->causedBy($user)
            ->withProperties($user)
            ->log($user->name . ' registered.');

        return true;
    }
}
