<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consiga extends Model
{
    protected $fillable = ['idProducto', 'idEncargado','estado','mensaje'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'idEncargado');
    }
}
