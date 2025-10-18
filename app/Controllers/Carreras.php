<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarreraModel;

class Carreras extends ResourceController
{
    protected $modelName = CarreraModel::class;
    protected $format    = 'json';

    // GET /carreras
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /carreras/{id}
    public function show($id = null)
    {
        $carrera = $this->model->find($id);

        if (!$carrera) {
            return $this->failNotFound("Carrera no encontrada con ID: $id");
        }

        return $this->respond($carrera);
    }

    // POST /carreras
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated($data);
    }

    // PUT /carreras/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond($data);
    }


    
    // DELETE /carreras/{id}
    public function delete($id = null)
    {
        $carrera = $this->model->find($id);

        if (!$carrera) {
            return $this->failNotFound("Carrera no encontrada con ID: $id");
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'message' => "Carrera con ID $id eliminada correctamente"
        ]);
    }
}
