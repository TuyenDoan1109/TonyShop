<?php

namespace App\Repositories\Brand;

use App\Repositories\BaseRepositoryInterface;

interface BrandRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllWithSearch($limit, $order, $keySearch);
}
