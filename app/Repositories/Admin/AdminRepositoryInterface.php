<?php

namespace App\Repositories\Admin;

use App\Repositories\BaseRepositoryInterface;

interface AdminRepositoryInterface extends BaseRepositoryInterface
{
    public function getAdminByEmail($email);
    public function getAllWithSearch($limit, $order, $keySearch);
}
