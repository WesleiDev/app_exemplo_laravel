<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class BoloRequest extends FormRequest
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
            'nome' => 'required|max:80|min:3',
            'peso' => 'required',
            'valor' => 'required'
        ];
    }

    public function messages()
    {
        return [
           'nome.required'  => 'O nome é obrigatório',
           'nome.max'       => 'O tamanho máximo para o nome é de 80 caracteres',
           'nome.min'       => 'O tamanho mínimo para o nome é de 3 caracteres',
           'peso.required'  => 'O peso é obrigatório',
           'valor.required' => 'O valor é obrigatório',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['error' => true, 'data' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
