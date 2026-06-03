<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoriaId = $this->route('categoria');

        return [
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoriaId,
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'padre_id' => 'nullable|exists:categorias,id',
            'activo' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe otra categoría con ese nombre.',
            'padre_id.exists' => 'La categoría padre seleccionada no existe.',
        ];
    }
}
