<?php

namespace App\Repositories\Models;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\PublisherInterface;

class PublisherRepository extends EloquentRepository implements PublisherInterface
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
    public function __construct(Publisher $model)
    {
        $this->model = $model;
    }
}