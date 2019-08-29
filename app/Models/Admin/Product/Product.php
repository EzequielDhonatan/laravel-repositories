<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        /* DADOS DO PRODUTO
        ================================================== */
        'category_id', 'name', 'url', 'price', 'description'

    ];
}
