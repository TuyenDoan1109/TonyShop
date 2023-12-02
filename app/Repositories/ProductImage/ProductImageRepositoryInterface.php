<?php

namespace App\Repositories\ProductImage;

use App\Repositories\BaseRepositoryInterface;

interface ProductImageRepositoryInterface extends BaseRepositoryInterface
{
    public function deleteByProduct($product_id);
}
