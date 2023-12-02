<?php

namespace App\Repositories\Tag;

use App\Repositories\BaseRepository;
use App\Models\Tag;

/**
 * Class Tag.
 */
class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Tag::class;
    }

    public function firstOrCreate($data)
    {
        return $this->model->firstOrCreate($data);
    }

}


