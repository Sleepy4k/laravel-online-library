<?php

namespace App\Repositories\Models;

use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\BookCategoryInterface;

class BookCategoryRepository extends EloquentRepository implements BookCategoryInterface
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
    public function __construct(BookCategory $model)
    {
        $this->model = $model;
    }
}