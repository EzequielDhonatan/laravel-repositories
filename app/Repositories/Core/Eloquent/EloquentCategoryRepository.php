<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Admin\Category\Category;

class EloquentCategoryRepository extends BaseEloquentRepository implements CategoryRepositoryInterface
{
    public function entity()
    {
        return Category::class;
    }
}