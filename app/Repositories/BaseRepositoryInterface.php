<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll();
    public function getAllWithPaginate($limit, $with = []);
    public function getAllWithDeleted();
    public function getOnlyDeleted();
    public function getById($id, $with = []);
    public function create($attributes);
    public function createMany($arrData);
    public function update($id, $attributes);
    public function delete($instance);
    public function deleteMany($ids);
    public function deleteForever($id);
    public function restoreDeleted($id);
}
