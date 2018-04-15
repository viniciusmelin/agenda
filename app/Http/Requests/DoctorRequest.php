<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=>'required|min:1|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Campo é Obrigatório!',
            'name.min'=>'Nome deve conte no minímo 2 caracteres!',
            'name'=>'Nome deve conte no maxímo 50 caracteres!'
        ];
    }
}
