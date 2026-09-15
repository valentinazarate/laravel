<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('hijos')->get();
        return response()->json($categorias);
    }

    public function store(StoreCategoriaRequest $request)
    {
        try{
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias',
            'descripcion' => 'nullable|string',
            'unique:categorias,nombre',
        ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors(), 'code' => 422], 422);
        }
        $categoria = Categoria::create($request->validated());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::with('padre', 'hijos')->find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada', 'code' => 404], 404);
        }

        return response()->json($categoria);
    }

    public function update(UpdateCategoriaRequest $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada', 'code' => 404], 404);
        }

        $categoria->update($request->validated());
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada', 'code' => 404], 404);
        }
        
        try {
             $categoria->delete();
             return response()->json(null, 204);

        } catch (\Exception $e) {
         return response ()-> json(['error' => 'Error al eliminar la categoria'], 500);
        }
    }
}
