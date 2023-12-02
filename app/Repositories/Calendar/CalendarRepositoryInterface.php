<?php

namespace App\Repositories\Calendar;

use App\Repositories\BaseRepositoryInterface;

interface CalendarRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllWithSearch($limit, $order, $keySearch);
}
