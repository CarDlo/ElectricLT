<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogempleadoRequest extends FormRequest
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
			'detalle' => 'required|string',
			'estado' => 'required|string',
			'condicion' => 'required|string',
			'empleado_id' => 'required',
			'user_id' => 'required',
        ];
    }
}
