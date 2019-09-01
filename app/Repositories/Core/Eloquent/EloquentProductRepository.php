<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Admin\Product\Product;

class EloquentProductRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{
    public function entity()
    {
        return Product::class;
    }
}