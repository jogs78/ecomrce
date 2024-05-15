<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $fillable = [
        'idProducto',
        'cantidad',
        'precio',
        'idUsuario',
        'voucher',
        'estado',
        'calificacion'  
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'idPago');
    }
}
