<?php

namespace App\Repositories\Models;

use App\Models\Book;
use App\Contracts\Models\BookInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository implements BookInterface
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
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
}