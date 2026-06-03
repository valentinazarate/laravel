<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Marca extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'logo',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    protected static function booted()
    {
        static::creating(function ($marca) {
            $marca->slug = Str::slug($marca->nombre);
        });

        static::updating(function ($marca) {
            $marca->slug = Str::slug($marca->nombre);
        });
    }
}
