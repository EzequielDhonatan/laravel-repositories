<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        return [
            
            /* DADOS DO PRODUTO
            ================================================== */
            'category_id'           => 'required|exists:categories,id',
            'name'                  => "required|min:3|max:60|unique:products,name,{$id},id",
            'url'                   => "required|min:3|max:60|unique:products,price,{$id},id",
            'price'                 => 'required',
            'description'           => 'max:9000',
            
        ];
    }
}
