<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
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
            'id' => 'required|string|unique:tenants,id',
            'admin_email' => 'required|email',
            'admin_password' => 'required|string|min:8',
            'name' => 'required|string',
            'contact_email' => 'required|email|unique:tenants,contact_email',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'El ID del tenant es obligatorio.',
            'id.string' => 'El ID del tenant debe ser una cadena de texto.',
            'id.unique' => 'El ID del tenant ya existe.',
            'admin_email.required' => 'El correo electrónico del administrador es obligatorio.',
            'admin_email.email' => 'El correo electrónico del administrador debe ser una dirección de correo válida.',
            'admin_password.required' => 'La contraseña del administrador es obligatoria.',
            'admin_password.string' => 'La contraseña del administrador debe ser una cadena de texto.',
            'admin_password.min' => 'La contraseña del administrador debe tener al menos 8 caracteres.',
            'name.required' => 'El nombre del tenant es obligatorio.',
            'name.string' => 'El nombre del tenant debe ser una cadena de texto.',
            'contact_email.required' => 'El correo electrónico de contacto es obligatorio.',
            'contact_email.email' => 'El correo electrónico de contacto debe ser una dirección de correo válida.',
            'contact_email.unique' => 'El correo electrónico de contacto ya existe.',
        ];
    }
}
