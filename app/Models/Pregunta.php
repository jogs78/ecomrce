<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido',
        'idProducto',
        'idUser' // Nota: ajusta el nombre según tu convención de nomenclatura
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'idPregunta');
    }
}
