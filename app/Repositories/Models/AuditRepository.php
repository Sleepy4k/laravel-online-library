<?php

namespace App\Repositories\Models;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Models\AuditInterface;
use App\Repositories\EloquentRepository;

class AuditRepository extends EloquentRepository implements AuditInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param  Model  $model
     */
    public function __construct(Activity $model)
    {
        $this->model = $model;
    }
}