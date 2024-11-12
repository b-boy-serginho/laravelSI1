<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    use HasFactory;

    protected $table = 'comentarios'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'comentario']; // Asegúrate de que estos son los campos en tu tabla

}
