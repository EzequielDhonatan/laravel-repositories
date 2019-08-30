<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category\Category;

class Product extends Model
{
    protected $fillable = [

        /* DADOS DO PRODUTO
        ================================================== */
        'category_id', 'name', 'url', 'price', 'description'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
