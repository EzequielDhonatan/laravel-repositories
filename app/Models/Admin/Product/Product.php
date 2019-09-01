<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Admin\Category\Category;

class Product extends Model
{
    protected $fillable = [

        /* DADOS DO PRODUTO
        ================================================== */
        'category_id', 'name', 'url', 'price', 'description'

    ];

    ## ESCOPO ANÔNIMO
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByPrice', function (Builder $builder) {
            $builder->orderBy('price', 'DESC');
        });
    }

    ## RELACIONAMENTO
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
