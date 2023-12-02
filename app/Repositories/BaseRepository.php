<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;

abstract class BaseRepository implements BaseRepositoryInterface
{
    // model muốn tương tác
    protected $model;

    public function __construct() {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel() {
        $this->model = app()->make($this->getModel());
    }

    public function getAll() {
        return $this->model->get();
    }

    public function getAllWithPaginate($limit, $with = [])
    {
//        $this->model->orderBy('id', 'desc')->paginate($limit);
        return $this->model::query()
            ->when(!empty($with), function($q) use ($with){
                $q->with($with);
            })
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getAllWithDeleted() {
        return $this->model->withTrashed()->get();
    }

    public function getOnlyDeleted() {
        return $this->model->where('deleted_at', '!=', null);
    }

    public function getById($id, $with = []) {
        return $this->model
            ->when(!empty($with), function($q) use ($with){
                $q->with($with);
            })
            ->find($id);
    }

    public function create($attributes) {
        return $this->model->create($attributes);    // return an instance
    }

    public function createMany($arrData) {
        return $this->model->insert($arrData);   // return boolean
    }

    public function update($instance, $attributes) {
        try {
            $instance->fill($attributes);
            $instance->save();
            return $instance;
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' - Line: ' . $exception->getLine());
            return false;
        }

    }

    public function delete($id) {
        $result = $this->getById($id);
        if($result) {
            return $result->delete();
        }
        return false;
    }

    public function deleteMany($ids)
    {
        try {
            return $this->model::destroy($ids);  // return how many records have been deleted
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' - Line: ' . $exception->getLine());
            return false;
        }
    }

    public function deleteForever($id)
    {
        $result = $this->model->withTrashed()->find($id);
        if($result) {
            return $result->forceDelete();
        }
        return false;
    }

    public function restoreDeleted($id)
    {
        $result = $this->model->withTrashed()->find($id);
        if($result) {
            return $result->restore();
        }
    }

}
