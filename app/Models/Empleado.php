<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [ 'fechaContratacion', 'cargo', 'idUsuario', 'idHorario'];

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idHorario');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
