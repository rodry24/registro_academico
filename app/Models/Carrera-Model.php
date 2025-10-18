<?php

namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table            = 'carreras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Campos permitidos para inserción/actualización
    protected $allowedFields    = [
        'nombre',
        'codigo',
        'categoria_id',
        'duracion',
        'profesor_id',
        'descripcion',
        'estado',
        'created_at'
    ];

    // Manejo de fechas
    protected $useTimestamps = false; // si luego agregás updated_at lo ponemos en true
}
