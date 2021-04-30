<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'pizza_price' => 'required|min:2|max:6',
            'pizza_description' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'pizza_name.required' => 'O campo NOME é obrigatório',
            'pizza_price.required' => 'O campo PREÇO é obrigatório',
            'pizza_description.required' => 'O campo DESCRIÇÃO é obrigatório',

            'pizza_name.min' => 'Deve conter no minimo 2 caracteres no campo NOME!',
            'pizza_price.min' => 'Deve conter no minimo 2 caracteres no campo PREÇO!',
            'pizza_price.max' => 'Deve conter no máximo 6 caracteres no campo PREÇO!',
            'pizza_description.min' => 'Deve conter no minimo 2 caracteres no campo DESCRIÇÃO!',

        ];
    }
}
