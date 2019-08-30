<?php

namespace App\Models\Admin\Category;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product\Product;

class Category extends Model
{
    protected $fillable = [

        /* DADOS DA CATEGORIA
        ================================================== */
        'title', 'url', 'description'

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
