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
        $marca = Marca::create($request->validated());
        return response()->json($marca, 201);
    }

    public function show($id)
    {
        $marca = Marca::with('productos')->find($id);

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada', 'code' => 404], 404);
        }

        return response()->json($marca);
    }

    public function update(UpdateMarcaRequest $request, $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada', 'code' => 404], 404);
        }

        $marca->update($request->validated());
        return response()->json($marca);
    }

    public function destroy($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada', 'code' => 404], 404);
        }

        $marca->delete();
        return response()->json(null, 204);
    }
}
