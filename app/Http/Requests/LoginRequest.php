<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email precisa ser válido',
            'senha.required' => 'Senha é obrigatória',
            'senha.min' => 'Senha precisa ter no minimo 6 digitos',

        ];
    }
}
