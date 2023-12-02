<?php

namespace App\Repositories\Brand;

use App\Repositories\BaseRepository;
use App\Models\Brand;

/**
 * Class Brand.
 */
class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Brand::class;
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
                    ->orWhere('content', 'like', '%' . $keySearch . '%');
            });
            $data->orderBy($orderBy, 'asc');

        } else {
            $data = $this->model->orderBy($orderBy, $orderType);
        }

        return $data->paginate($limit);
    }
}


