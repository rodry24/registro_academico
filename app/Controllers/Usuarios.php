<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController
{
    protected $modelName = UsuarioModel::class;
    protected $format    = 'json';

    // GET /usuarios
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /usuarios/{id}
    public function show($id = null)
    {
        $usuario = $this->model->find($id);
        if (!$usuario) {
            return $this->failNotFound("Usuario no encontrado con ID: $id");
        }
        return $this->respond($usuario);
    }

    // POST /usuarios
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($data, "Usuario creado correctamente");
    }

    // PUT /usuarios/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->find($id)) {
            return $this->failNotFound("Usuario no encontrado con ID: $id");
        }

        $this->model->update($id, $data);
        return $this->respond(["message" => "Usuario actualizado correctamente"]);
    }

    // DELETE /usuarios/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound("Usuario no encontrado con ID: $id");
        }

        $this->model->delete($id);
        return $this->respondDeleted(["message" => "Usuario eliminado correctamente"]);
    }
}

    public function buscarPorEmail($email = null)
    {
    $usuario = $this->model->getUsuarioPorEmail($email);

    if (!$usuario) {
        return $this->failNotFound("No se encontró un usuario con el email: $email");
    }

    return $this->respond($usuario);
}

public function porRol($rol = null)
{
    // Validar que el rol sea válido
    $rolesPermitidos = ['alumno', 'profesor', 'admin'];
    if (!in_array($rol, $rolesPermitidos)) {
        return $this->failValidationErrors("Rol inválido: $rol. Debe ser alumno, profesor o admin.");
    }

    // Buscar usuarios con ese rol
    $usuarios = $this->model->getUsuariosPorRol($rol);

    if (!$usuarios) {
        return $this->failNotFound("No se encontraron usuarios con el rol: $rol");
    }

    return $this->respond($usuarios);
}
