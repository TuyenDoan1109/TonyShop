<?php

namespace App\Repositories\Permission;

use App\Repositories\BaseRepositoryInterface;

interface PermissionRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllWithSearch($limit, $order, $keySearch);

}
