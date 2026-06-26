<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PdfRequest extends FormRequest
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
            'titulo' => 'required|string',
            'cpf' => 'required|digits:11',
            'pdf' => 'required|file|mimes:pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'Email é obrigatório',

            'cpf.required' => 'Senha é obrigatória',
            'cpf.digits' => 'CPF precisa estar no formato xxxxxxxxxxx',

            'pdf.required' => 'CPF é obrigatório',
            'pdf.file' => 'Precisa ser um arquivo',
            'pdf.mimes' => 'Precisa ser um PDF',

        ];
    }
}
