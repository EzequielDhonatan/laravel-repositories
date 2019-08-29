<?php

namespace App\Models\Admin\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

        /* DADOS DA CATEGORIA
        ================================================== */
        'title', 'url', 'description'

    ];
}
