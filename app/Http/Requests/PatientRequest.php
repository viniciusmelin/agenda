<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.riquired'=>'Campo é Obrigatório!',
            'name.max'=> 'Tamanho maxímo é de 50 caracteres!',
            'name.min'=> 'Tamanho minímo é de 1 caracteres!',
            'age.riquired' => 'Campo é Obrigatório!',
            'age.numeric' => 'Campo pode ser somente numérico!',
            'date_birth.riquired' => 'Campo é Obrigatório!',
            'date_birth.date' => 'Campo não é uma data valída!'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd($this);
        return [
            'name' => 'required|max:50|min:1',
            'age'=> 'required|numeric',
            'date_birth' => 'required|date'
        ];
    }


}
