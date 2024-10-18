<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
			'cedula' => 'required|string',
			'nombre' => 'required|string',
			'apellidos' => 'required|string',
			'cargo' => 'required|string',
			'estado' => 'required|string',
			'condicion' => 'required|string',
			'empresa_id' => 'required',
			'subcontratista_id' => 'required',
			'user_id' => 'required',
        ];
    }
}
