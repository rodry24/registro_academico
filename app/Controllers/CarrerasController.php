<?php namespace App\Controllers;

use App\Models\CarreraModel;
use App\Models\CategoriaModel;
use App\Models\ProfesorModel;
use CodeIgniter\Controller;

class CarrerasController extends Controller
{
    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
        $this->categoriaModel = new CategoriaModel();
        $this->profesorModel = new ProfesorModel();
        helper('url');
    }

    // LISTAR (R)
    public function index()
    {
        $data = [
            'carreras' => $this->carreraModel->obtenerCarrerasDetalle(), 
            'titulo' => 'Gestión de Carreras',
        ];
        return view('carreras/listado', $data);
    }

    // CREAR (Formulario)
    public function crear()
    {
        $data = [
            'categorias' => $this->categoriaModel->findAll(),
            'profesores' => $this->profesorModel->findAll(),
            'titulo' => 'Registrar Nueva Carrera',
        ];
        return view('carreras/crear', $data);
    }

    // GUARDAR (C) - MEJORADO
    public function guardar()
    {
        $data = $this->request->getPost();
        
        // ✅ VALIDACIÓN MANUAL ADICIONAL (opcional, ya está en el modelo)
        if (!$this->carreraModel->esNombreUnico($data['nombre'])) {
            return redirect()->back()->withInput()->with('errors', ['Ya existe una carrera con este nombre.']);
        }

        if (!$this->carreraModel->esCodigoUnico($data['codigo'])) {
            return redirect()->back()->withInput()->with('errors', ['El código de carrera ya está en uso.']);
        }

        if ($this->carreraModel->insert($data)) {
            return redirect()->to(base_url('carreras'))->with('mensaje', 'Carrera creada exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->carreraModel->errors());
        }
    }

    // EDITAR (Formulario)
    public function editar($id = null)
    {
        if ($id === null || !$carrera = $this->carreraModel->find($id)) {
            return redirect()->to(base_url('carreras'))->with('error', 'Carrera no encontrada.');
        }

        $data = [
            'carrera' => $carrera,
            'categorias' => $this->categoriaModel->findAll(),
            'profesores' => $this->profesorModel->findAll(),
            'titulo' => 'Editar Carrera',
        ];
        return view('carreras/editar', $data);
    }

    // ACTUALIZAR (U) - MEJORADO
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        // ✅ VERIFICAR QUE LA CARRERA EXISTA
        if (!$carreraExistente = $this->carreraModel->find($id)) {
            return redirect()->to(base_url('carreras'))->with('error', 'Carrera no encontrada.');
        }

        // ✅ VALIDACIÓN MANUAL ADICIONAL PARA ACTUALIZACIÓN
        if ($data['nombre'] != $carreraExistente['nombre'] && !$this->carreraModel->esNombreUnico($data['nombre'], $id)) {
            return redirect()->back()->withInput()->with('errors', ['Ya existe una carrera con este nombre.']);
        }

        if ($data['codigo'] != $carreraExistente['codigo'] && !$this->carreraModel->esCodigoUnico($data['codigo'], $id)) {
            return redirect()->back()->withInput()->with('errors', ['El código de carrera ya está en uso.']);
        }

        if ($this->carreraModel->update($id, $data)) {
            return redirect()->to(base_url('carreras'))->with('mensaje', 'Carrera actualizada exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->carreraModel->errors());
        }
    }

    // ELIMINAR (D)
    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('carreras'))->with('error', 'ID de carrera no proporcionado.');
        }
        
        if ($this->carreraModel->delete($id)) {
            return redirect()->to(base_url('carreras'))->with('mensaje', 'Carrera eliminada exitosamente.');
        } else {
            return redirect()->to(base_url('carreras'))->with('error', 'Error al eliminar. Verifique que no haya estudiantes o datos asociados.');
        }
    }
}