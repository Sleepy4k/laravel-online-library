<?php

namespace App\Repositories\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\AuthorInterface;

class AuthorRepository extends EloquentRepository implements AuthorInterface
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
    public function __construct(Author $model)
    {
        $this->model = $model;
    }
}