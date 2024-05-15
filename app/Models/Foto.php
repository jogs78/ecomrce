<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [ 'ruta' ,'idProducto'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
