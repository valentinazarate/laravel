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
         try {
            $producto = Producto::create($request->validated());
            $producto->load('marca', 'categoria');

            return response()->json([
                'message' => 'Producto creado correctamente',
                'data' => $producto
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el producto',
                'error' => $e->getMessage()
            ], 500);
        }
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
            return response()->json(['error' => 'Producto no encontrado'], 404);
            
        }

        try {
            $producto->update($request->validated());
            $producto->load('marca', 'categoria');
            return response()->json($producto);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Error al actualizar el producto', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

         try {
             $producto->delete();
             return response()->json(null, 204);

        } catch (\Exception $e) {
         return response ()-> json(['error' => 'Error al eliminar el producto'], 500);
        }

     
    }
}
