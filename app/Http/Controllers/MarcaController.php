<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::with('productos')->get();
        return response()->json($marcas);
    }

    public function store(StoreMarcaRequest $request)
    {
        try {
            $marca = Marca::create($request->validated());

            return response()->json([
                'message' => 'Marca creada correctamente',
                'data' => $marca
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la marca',
            ], 500);
        }
    }

    public function show($id)
    {
        $marca = Marca::with('productos')->find($id);

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada'], 404);
        }

        return response()->json($marca);
    }

    public function update(UpdateMarcaRequest $request, $id)
    {
        try {
            $marca = Marca::find($id);

            if (!$marca) {
                return response()->json(['error' => 'Marca no encontrada'], 404);
            }

            $marca->update($request->validated());

            return response()->json([
                'message' => 'Marca modificada correctamente',
                'data' => $marca
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al modificar la marca',
                //'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada'], 404);
        }

        try {
            $marca->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la marca'], 500);
        }
    }
}