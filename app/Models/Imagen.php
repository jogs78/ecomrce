<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','producto_id','tipo', 'ruta'];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}

