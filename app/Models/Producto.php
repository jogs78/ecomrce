<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'idCategoria', // Nota: ajusta el nombre según tu convención de nomenclatura
        'stock',
        'descripcion',
        'idUser',
        'precio' // Nuevo campo agregado
    ];

    public function consignas()
    {
        return $this->hasMany(Consiga::class,'idProducto');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function respuestas()
{
    return $this->hasMany(Respuesta::class, 'idPregunta');
}

public function preguntas()
{
    return $this->hasMany(Pregunta::class, 'idProducto');
}

public function transacciones()
{
    return $this->hasMany(Transaccion::class, 'idProducto');
}

public function fotos()
    {
        return $this->hasMany(Foto::class, 'idProducto');
    }
}
