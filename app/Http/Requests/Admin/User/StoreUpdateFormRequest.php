<?php

namespace App\Http\Requests\Admin\User;

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

        $rules = [
            
            /* DADOS DO USUÁRIO
            ================================================== */
            'name'                  => 'required|min:03|max:60',
            'email'                 => "required|email|min:3|max:60|unique:users,email,{$id},id",
            // 'password'              => 'required|min:3|max:15',

        ];

        if ($this->isMethod('PUT')) {
            $rules['password'] = 'max:15';
        }

        return $rules;
    }
}
