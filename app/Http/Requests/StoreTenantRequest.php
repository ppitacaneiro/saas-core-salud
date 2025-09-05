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
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'El ID del tenant es obligatorio.',
            'id.string' => 'El ID del tenant debe ser una cadena de texto.',
            'id.unique' => 'El ID del tenant ya existe.',
        ];
    }
}
