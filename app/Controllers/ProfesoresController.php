<?php namespace App\Controllers;

use App\Models\ProfesorModel;
use CodeIgniter\Controller;

class ProfesoresController extends Controller
{
    public function __construct()
    {
        $this->profesorModel = new ProfesorModel();
        helper('url');
    }

    // LISTAR (R)
    public function index()
    {
        $data = [
            'profesores' => $this->profesorModel->findAll(),
            'titulo' => 'Gestión de Profesores',
        ];
        return view('profesores/listado', $data);
    }

    // CREAR (Formulario)
    public function crear()
    {
        return view('profesores/crear', ['titulo' => 'Registrar Nuevo Profesor']);
    }

    // GUARDAR (C)
    public function guardar()
    {
        $data = $this->request->getPost();

        // ✅ VALIDACIÓN MANUAL DE DNI ÚNICO PARA CREACIÓN
        if (!$this->profesorModel->esDniUnico($data['dni'])) {
            return redirect()->back()->withInput()->with('errors', ['El DNI ingresado ya se encuentra registrado.']);
        }

        if ($this->profesorModel->insert($data)) {
            return redirect()->to(base_url('profesores'))->with('mensaje', 'Profesor creado exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->profesorModel->errors());
        }
    }

    // EDITAR (Formulario)
    public function editar($id = null)
    {
        if ($id === null || !$profesor = $this->profesorModel->find($id)) {
            return redirect()->to(base_url('profesores'))->with('error', 'Profesor no encontrado.');
        }
        $data = ['profesor' => $profesor, 'titulo' => 'Editar Profesor'];
        return view('profesores/editar', $data);
    }

    // ACTUALIZAR (U) - CORREGIDO
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        // ✅ VERIFICAR QUE EL PROFESOR EXISTA
        if (!$profesorExistente = $this->profesorModel->find($id)) {
            return redirect()->to(base_url('profesores'))->with('error', 'Profesor no encontrado.');
        }

        // ✅ SOLO VALIDAR DNI ÚNICO SI EL DNI CAMBIÓ
        if ($data['dni'] != $profesorExistente['dni']) {
            if (!$this->profesorModel->esDniUnico($data['dni'], $id)) {
                return redirect()->back()->withInput()->with('errors', ['El DNI ingresado ya se encuentra registrado.']);
            }
        }

        // ✅ USAR save() EN LUGAR DE update() PARA QUE FUNCIONEN LAS VALIDACIONES
        if ($this->profesorModel->save($data)) {
            return redirect()->to(base_url('profesores'))->with('mensaje', 'Profesor actualizado exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->profesorModel->errors());
        }
    }

    // ELIMINAR (D)
    public function eliminar($id = null)
    {
        if ($this->profesorModel->delete($id)) {
            return redirect()->to(base_url('profesores'))->with('mensaje', 'Profesor eliminado exitosamente.');
        } else {
            return redirect()->to(base_url('profesores'))->with('error', 'Error al eliminar. Verifique que no esté asignado a una carrera.');
        }
    }
}