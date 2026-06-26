<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:usuario,email|email',
            'senha' => 'required|min:6',
            'nome' => 'required',
            'cpf' => 'required|unique:usuario,cpf|digits:11',
            'cep' => 'required|digits:8',

        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email é obrigatório',
            'email.unique' => 'Este email já está registrado',
            'email.email' => 'Email precisa ser válido',
            'senha.required' => 'Senha é obrigatória',
            'senha.min' => 'Senha precisa ter no minimo 6 digitos',
            'nome.required' => 'Nome é obrigatório',
            'cpf.required' => 'CPF é obrigatório',
            'cpf.unique' => 'este CPF já está registrado',
            'cpf.digits' => 'CPF precisa estar no formato xxxxxxxxxxx',
            'cep.required' => 'CEP é obrigatório',
            'cep.digits' => 'CEP é precisa ser no formato xxxxxxxx',
        ];
    }
}
