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

    public function search(array $data)
    {
        return $this->entity
                        ->where(function ($query) use ($data) {

                            // PESQUISA TÍTULO
                            if (isset($data['title'])) {
                                $title = $data['title'];
                                $query->where('title', 'LIKE', "%{$title}%");
                            }

                            // PESQUISA URL
                            if (isset($data['url'])) {
                                $url = $data['url'];
                                $query->where('url', 'LIKE', "%{$url}%");
                            }

                            // PESQUISA DESCRIÇÃO
                            if (isset($data['description'])) {
                                $description =  $data['description'];
                                $query->where('description', 'LIKE', "%{$description}%");
                            }
                        })
                        ->orderBy('id', 'DESC')
                        ->paginate();
    }
}