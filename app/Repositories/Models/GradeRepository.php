<?php

namespace App\Repositories\Models;

use App\Models\Grade;
use App\Contracts\Models\GradeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class GradeRepository extends EloquentRepository implements GradeInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     *
     * @param Model $model
     */
    public function __construct(Grade $model)
    {
        $this->model = $model;
    }
}
