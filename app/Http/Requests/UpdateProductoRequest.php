<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productoId = $this->route('producto');

        return [
            'nombre' => 'required|string|max:255|unique:productos,nombre,' . $productoId,
            'descripcion_corta' => 'nullable|string|max:255',
            'descripcion_larga' => 'nullable|string',
            'precio_compra' => 'nullable|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'stock_minimo' => 'nullable|integer|min:0',
            'unidad_medida' => 'nullable|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'destacado' => 'boolean',
            'activo' => 'boolean',
            'peso_gramos' => 'nullable|numeric|min:0',
            'ingredientes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.unique' => 'Ya existe otro producto con ese nombre.',
            'precio_venta.required' => 'El precio de venta es obligatorio.',
            'precio_venta.numeric' => 'El precio de venta debe ser un número.',
            'marca_id.required' => 'La marca es obligatoria.',
            'marca_id.exists' => 'La marca seleccionada no existe.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
        ];
    }
}
