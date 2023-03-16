<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class ApplicationService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'application' => $this->applicationInterface->findById(1),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return [
            'application' => $this->applicationInterface->findById(1),
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $request)
    {
        try {
            $this->applicationInterface->update(1, $request);
        } catch (\Throwable $th) {
            toastr()->error('Failed to create permission. Please try again later.', 'Error');

            return false;
        }

        toastr()->success('Permission created successfully.', 'Success');

        return true;
    }
}
