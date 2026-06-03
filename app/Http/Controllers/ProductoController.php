<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('marca', 'categoria')->get();
        return response()->json($productos);
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->validated());
        $producto->load('marca', 'categoria');
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::with('marca', 'categoria')->find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado', 'code' => 404], 404);
        }

        return response()->json($producto);
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado', 'code' => 404], 404);
        }

        $producto->update($request->validated());
        $producto->load('marca', 'categoria');
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado', 'code' => 404], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }
}
