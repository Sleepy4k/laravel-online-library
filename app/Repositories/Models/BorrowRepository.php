<?php

namespace App\Repositories\Models;

use App\Models\Borrow;
use App\Contracts\Models\BorrowInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class BorrowRepository extends EloquentRepository implements BorrowInterface
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
    public function __construct(Borrow $model)
    {
        $this->model = $model;
    }
}
