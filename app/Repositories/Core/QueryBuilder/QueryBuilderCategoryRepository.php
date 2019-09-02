<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Admin\Category\Category;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';

    public function search(array $data)
    {

    }
}