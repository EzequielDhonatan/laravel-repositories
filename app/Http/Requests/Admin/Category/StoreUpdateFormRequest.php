<?php

namespace App\Http\Requests\Admin\Category;

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
            
            /* DADOS DA CATEGORIA
            ================================================== */
            'title'                 => "required|min:3|max:60|unique:categories,title,{$id},id",
            'url'                   => "required|min:3|max:60|unique:categories,url,{$id},id",
            'description'           => 'max:2000',
            
        ];
    }
}
