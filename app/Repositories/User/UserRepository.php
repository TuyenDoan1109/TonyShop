<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return User::class;
    }

    public function getAllWithSearch($limit, $order, $keySearch)
    {
        $orderTypes = ['asc', 'desc'];
        $columns = app($this->getModel())->getFillable();
        $limit = $limit ?? config('app.paginate.per_page');

        $orderBy = in_array($order[0], $columns) ? $order[0] : 'id';
        $orderType = in_array($order[1], $orderTypes) ? $order[1] : 'desc';

        if(!empty($keySearch)) {
            $data = $this->model::where(function ($q1) use ($keySearch)
            {
                $q1->where('name', 'like', '%' . $keySearch . '%')
                    ->orWhere('email', 'like', '%' . $keySearch . '%');
            });
            $data->orderBy($orderBy, 'asc');

        } else {
            $data = $this->model->orderBy($orderBy, $orderType);
        }

        return $data->paginate($limit);
    }

}


