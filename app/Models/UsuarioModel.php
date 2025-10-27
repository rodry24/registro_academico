<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'rol', 'created_at', 'updated_at']; // Removido 'nombre'

    // Activar timestamps automáticos
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsuarioPorId(int $id)
    {
        return $this->where('id', $id)->first();
    }

    public function getUsuarioPorEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUsuariosPorRol(string $rol)
    {
        return $this->where('rol', $rol)->findAll();
    }
}