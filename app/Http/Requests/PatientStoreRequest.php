<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'nullable|string|max:50',
            'document_number' => 'nullable|string|max:100|unique:patients,document_number',
            'date_of_birth' => 'nullable|date',
            'email' => 'nullable|email|max:255|unique:patients,email',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:H,M,O',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'email.email' => 'El correo electrónico no es válido',
            'email.unique' => 'El correo electrónico ya está en uso',
            'document_number.unique' => 'El número de documento ya está en uso',
            'gender.in' => 'El género debe ser H (hombre), M (mujer) u O (otro)',
        ];
    }
}
