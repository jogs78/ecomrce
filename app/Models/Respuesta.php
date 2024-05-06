<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido',
        'idPregunta', // Nota: ajusta el nombre según tu convención de nomenclatura
        'idUsuario', // Nuevo campo agregado si quieres asociar la respuesta a un usuario
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
