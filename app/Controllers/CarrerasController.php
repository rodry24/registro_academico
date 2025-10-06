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
            // Usa el método con JOINs que definimos en el modelo
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

    // GUARDAR (C)
    public function guardar()
    {
        $data = $this->request->getPost();
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

    // ACTUALIZAR (U)
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

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
        
        // Debe considerar la restricción de clave foránea:
        // Si hay estudiantes enlazados a esta carrera, la eliminación fallará.
        if ($this->carreraModel->delete($id)) {
            return redirect()->to(base_url('carreras'))->with('mensaje', 'Carrera eliminada exitosamente.');
        } else {
            // Un error común aquí es por restricción de clave foránea (FK constraint)
            return redirect()->to(base_url('carreras'))->with('error', 'Error al eliminar. Verifique que no haya estudiantes o datos asociados.');
        }
    }
}