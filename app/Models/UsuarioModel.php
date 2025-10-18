<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';       // Nombre de la tabla en tu BD
    protected $primaryKey = 'id';     // PK
    protected $allowedFields = ['nombre', 'email', 'password', 'rol']; // Campos editables

// Activar timestamps automáticos
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

public function getUsuarioPorId(int $id)
{
    return $this->where('id_usuario', $id)->first();
}

public function getUsuarioPorEmail(string $email)
{
    return $this->where('email', $email)->first();
}

public function getUsuariosPorRol(string $rol)
{
    return $this->where('rol', $rol)->findAll();
}
