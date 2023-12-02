<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

/**
 * Class Category.
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Category::class;
    }

    // Hàm viết lại
    // Example chỉ lấy các items có id = 1, 2 , 3
    // public function getAll() {
    //     return $this->model->whereIn('id', [1,2,3])->get();
    // }

    public function getFirstFiveCategory() {
        return $this->model->whereIn('id', [1,2,3,4,5])->get();
    }

    public function getAllExcept($id)
    {
        return $this->model->where('id', '!=', $id)->get();
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

    public function getAllWithPaginate($limit, $with = [])
    {
        return $this->model->orderBy('id', 'desc')->with('ParentCategory')->paginate($limit);
    }
}


