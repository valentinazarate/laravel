<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen',
        'padre_id',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function padre()
    {
        return $this->belongsTo(Categoria::class, 'padre_id');
    }

    public function hijos()
    {
        return $this->hasMany(Categoria::class, 'padre_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    protected static function booted()
    {
        static::creating(function ($categoria) {
            $categoria->slug = Str::slug($categoria->nombre);
        });

        static::updating(function ($categoria) {
            $categoria->slug = Str::slug($categoria->nombre);
        });
    }
}
