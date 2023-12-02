<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Models\Post;

/**
 * Class Post.
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Post::class;
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

//        return $data->get();

        return $data->paginate($limit);
    }


}


