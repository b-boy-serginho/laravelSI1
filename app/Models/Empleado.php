<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [ 'fechaContratacion', 'cargo', 'idHorario'];

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idHorario');
    }

    
}
