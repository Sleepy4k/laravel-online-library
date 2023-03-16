<?php

namespace App\Repositories\Models;

use App\Models\Book;
use App\Traits\UploadFile;
use App\Contracts\Models\BookInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository implements BookInterface
{
    use UploadFile;

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

    /**
     * Create a model.
     *
     * @param  array  $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        try {
            $payload['image'] = $this->saveSingleFile('image', $payload['image']);
            $model = $this->model->create($payload);

            return $model->fresh();
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return false;
        }
    }

    /**
     * Update existing model.
     *
     * @param  int  $modelId
     * @param  array  $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        try {
            $payload['image'] = $this->updateSingleFile('image', $payload['image'], $payload['old_image']);
            $model = $this->findById($modelId);

            return $model->update($payload);
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return false;
        }
    }

    /**
     * Delete model by id.
     *
     * @param  int  $modelId
     * @return Model
     */
    public function deleteById(int $modelId): bool
    {
        try {
            $this->deleteFile('image', $this->findById($modelId)->image);
            return $this->findById($modelId)->delete();
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return false;
        }
    }
}
