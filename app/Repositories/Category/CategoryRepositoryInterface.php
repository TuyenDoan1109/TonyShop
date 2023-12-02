<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    // Example Only
    public function getFirstFiveCategory();
    public function getAllWithSearch($limit, $order, $keySearch);

    public function getAllExcept($id);

}
