<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'.($this->id ? ",id,$this->id":""),
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
         return [
            'name.required'=>'Nome é obrigatório!',
            'name.string'=>'Nome deve ser do tipo texto!',
            'name.max'=>'Tamanho maxímo de 255 caracteres!',
            'email.required' =>'Email é obrigatório',
            'email.string' =>'Email deve ser do tipo texto',
            'email.email' =>'Email não é valído!',
            'email.max' =>'Tamanho maxímo de 255 caracteres!',
            'password.required' =>'Senha é obrigatório!',
            'email.unique'=>'Email já cadastrado!',
            'password.string' =>'Senha deve ser do tipo texto!',
            'password.max' =>'Senha deve conter no minímo 6 caracteres!',            
            'password.confirmed' =>'Repetir Senha novamente!'  
        ];
    }
}
