<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzasFormRequest extends FormRequest
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
        return [
            'pizza_name' => 'required|min:2',
            'pizza_price' => 'required|min:2',
            'pizza_description' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'pizza_name.required' => 'O campo nome é obrigatório!',
            'pizza_price.required' => 'O campo preço é obrigatório!',
            'pizza_description.required' => 'O campo descrição é obrigatório!',

            'pizza_name.min' => 'O campo nome deve conter no mínimo 02 caracteres!',
            'pizza_price.min' => 'O campo preço deve conter no mínimo 02 caracteres!',
            'pizza_description.min' => 'O campo descrição deve conter no mínimo 02 caracteres!'
            
        ];
    }
}
