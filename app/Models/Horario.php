<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios'; // Nombre de la tabla
    protected $fillable = [
        'horaInicio',
        'horaFinal',
        'dia',
    ];
}
