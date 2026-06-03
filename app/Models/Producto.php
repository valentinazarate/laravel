<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion_corta',
        'descripcion_larga',
        'precio_compra',
        'precio_venta',
        'stock',
        'stock_minimo',
        'unidad_medida',
        'marca_id',
        'categoria_id',
        'destacado',
        'activo',
        'peso_gramos',
        'ingredientes',
    ];

    protected $casts = [
        'precio_compra' => 'decimal:2',
        'precio_venta' => 'decimal:2',
        'stock' => 'integer',
        'stock_minimo' => 'integer',
        'destacado' => 'boolean',
        'activo' => 'boolean',
        'peso_gramos' => 'decimal:2',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    protected static function booted()
    {
        static::creating(function ($producto) {
            $producto->slug = Str::slug($producto->nombre);
        });

        static::updating(function ($producto) {
            $producto->slug = Str::slug($producto->nombre);
        });
    }
}
