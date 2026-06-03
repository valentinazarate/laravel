<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarcaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $marcaId = $this->route('marca');

        return [
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $marcaId,
            'descripcion' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'activo' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la marca es obligatorio.',
            'nombre.unique' => 'Ya existe otra marca con ese nombre.',
        ];
    }
}
