<?php

namespace App\Repositories\ProductImage;

use App\Repositories\BaseRepository;
use App\Models\ProductImage;

/**
 * Class Brand.
 */
class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return ProductImage::class;
    }

    public function deleteByProduct($product_id)
    {
        return $this->model->where('product_id', $product_id)->delete();   // return how many records have been deleted
    }
}


