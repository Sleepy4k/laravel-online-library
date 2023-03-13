<?php

namespace App\Services\Web\User;

use App\Services\WebService;

class ProfileService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'user' => auth()->user(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return [
            'user' => auth()->user(),
            'genders' => config('gender.list'),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        $update = $this->userInterface->update(auth()->user()->id, $request);

        if (!$update) {
            toastr()->error('Failed to update your profile.', 'Failed');

            return false;
        }

        $user = auth()->user();

        activity('user')
            ->causedBy($user)
            ->withProperties($user)
            ->log($user->name . ' updated profile.');

        toastr()->success('You have successfully updated your profile.', 'Updated');

        return true;
    }
}
