<?php namespace App\Controllers;

use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
        helper('url');
    }

    // LISTAR (R)
    public function index()
    {
        $data = [
            'categorias' => $this->categoriaModel->findAll(),
            'titulo' => 'Gestión de Categorías',
        ];
        return view('categorias/listado', $data);
    }

    // CREAR (Formulario)
    public function crear()
    {
        return view('categorias/crear', ['titulo' => 'Registrar Nueva Categoría']);
    }

    // GUARDAR (C)
    public function guardar()
    {
        $data = $this->request->getPost();
        if ($this->categoriaModel->insert($data)) {
            return redirect()->to(base_url('categorias'))->with('mensaje', 'Categoría creada exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->categoriaModel->errors());
        }
    }

    // EDITAR (Formulario)
    public function editar($id = null)
    {
        if ($id === null || !$categoria = $this->categoriaModel->find($id)) {
            return redirect()->to(base_url('categorias'))->with('error', 'Categoría no encontrada.');
        }
        $data = ['categoria' => $categoria, 'titulo' => 'Editar Categoría'];
        return view('categorias/editar', $data);
    }

    // ACTUALIZAR (U)
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        if ($this->categoriaModel->update($id, $data)) {
            return redirect()->to(base_url('categorias'))->with('mensaje', 'Categoría actualizada exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->categoriaModel->errors());
        }
    }

    // ELIMINAR (D)
    public function eliminar($id = null)
    {
        if ($this->categoriaModel->delete($id)) {
            return redirect()->to(base_url('categorias'))->with('mensaje', 'Categoría eliminada exitosamente.');
        } else {
            return redirect()->to(base_url('categorias'))->with('error', 'Error al eliminar. Verifique que no haya carreras asignadas a esta categoría.');
        }
    }
}