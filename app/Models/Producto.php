<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'productos';

    // Clave primaria de la tabla (opcional si es 'id')
    protected $primaryKey = 'id';

    // Indica si el modelo debe usar marcas de tiempo.
    // Como estás usando 'fecha_creacion' en lugar de 'created_at',
    // y no tienes 'updated_at', debemos deshabilitar las marcas por defecto de Laravel.
    public $timestamps = false;

    // Si quieres usar el campo 'fecha_creacion' en lugar de 'created_at',
    // puedes definirlo así, pero es más simple desactivar 'timestamps'.
    // Si quisieras que lo llenara Eloquent:
    // const CREATED_AT = 'fecha_creacion';

    // Campos que se pueden asignar masivamente (Mass assignment)
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
    ];

    // Casts para convertir los tipos de datos
    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'fecha_creacion' => 'datetime',
    ];
}