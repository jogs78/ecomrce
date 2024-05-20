<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'idPago',
        'idTransaccion',
        'estado',
        'idUsuario',
    ];
    
    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class, 'idTransaccion');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    
}
