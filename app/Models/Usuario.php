<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['ine_ife','nombre','apellido_paterno','apellido_materno',
                            'fecha_nacimiento','no_telefono','correo_electronico',
                            'sexo','direccion','rol','contra'];
}
