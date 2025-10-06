<?php namespace App\Controllers;

use App\Models\EstudianteModel;
use App\Models\CarreraModel;
use CodeIgniter\Controller;

class EstudiantesController extends Controller
{
    protected $estudianteModel;
    protected $carreraModel;

    public function __construct()
    {
        $this->estudianteModel = new EstudianteModel();
        $this->carreraModel    = new CarreraModel();
        helper('url'); 
    }

    public function index()
    {
        $data = [
            'estudiantes' => $this->estudianteModel->obtenerEstudiantesConCarrera(),
            'titulo'      => 'Listado de Estudiantes',
        ];
        return view('estudiantes/listado', $data); 
    }

    public function crear()
    {
        $data = [
            'carreras' => $this->carreraModel->findAll(),
            'titulo'   => 'Registrar Nuevo Estudiante',
        ];
        return view('estudiantes/crear', $data);
    }

    public function guardar()
    {
        $data = $this->request->getPost();

        // DEBUG: Ver qué datos llegan
        // log_message('debug', 'Datos recibidos: ' . print_r($data, true));

        // CONVERSIÓN DE FECHAS MEJORADA
        if (!empty($data['fecha_nacimiento'])) {
            $data['fecha_nacimiento'] = $this->convertirFechaForm($data['fecha_nacimiento']);
        }
        
        if (!empty($data['fecha_ingreso'])) {
            $data['fecha_ingreso'] = $this->convertirFechaForm($data['fecha_ingreso']);
        }

        // DEBUG: Ver fechas convertidas
        // log_message('debug', 'Fechas convertidas - Nacimiento: ' . $data['fecha_nacimiento'] . ' - Ingreso: ' . $data['fecha_ingreso']);

        if (! $this->estudianteModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->estudianteModel->errors());
        }

        return redirect()->to(base_url('estudiantes'))->with('mensaje', 'Estudiante creado exitosamente.');
    }

    public function editar($id = null)
    {
        if ($id === null || !$estudiante = $this->estudianteModel->find($id)) {
            return redirect()->to(base_url('estudiantes'))->with('error', 'Estudiante no encontrado.');
        }

        $data = [
            'estudiante' => $estudiante,
            'carreras'   => $this->carreraModel->findAll(),
            'titulo'     => 'Editar Estudiante',
        ];

        return view('estudiantes/editar', $data);
    }

    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        if (!empty($data['fecha_nacimiento'])) {
            $data['fecha_nacimiento'] = $this->convertirFechaForm($data['fecha_nacimiento']);
        }
        
        if (!empty($data['fecha_ingreso'])) {
            $data['fecha_ingreso'] = $this->convertirFechaForm($data['fecha_ingreso']);
        }

        if (! $this->estudianteModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->estudianteModel->errors());
        }

        return redirect()->to(base_url('estudiantes'))->with('mensaje', 'Estudiante actualizado exitosamente.');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('estudiantes'))->with('error', 'ID de estudiante no proporcionado.');
        }

        if ($this->estudianteModel->delete($id)) {
            return redirect()->to(base_url('estudiantes'))->with('mensaje', 'Estudiante eliminado exitosamente.');
        } else {
            return redirect()->to(base_url('estudiantes'))->with('error', 'Error al eliminar el estudiante.');
        }
    }

    /**
     * Convierte fecha de formato DD/MM/YYYY a YYYY-MM-DD
     */
    private function convertirFechaForm($fecha)
    {
        // Si ya está en formato YYYY-MM-DD, devolver tal cual
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha)) {
            return $fecha;
        }
        
        // Convertir desde DD/MM/YYYY
        if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $fecha, $matches)) {
            $dia = str_pad($matches[1], 2, '0', STR_PAD_LEFT);
            $mes = str_pad($matches[2], 2, '0', STR_PAD_LEFT);
            $anio = $matches[3];
            
            return $anio . '-' . $mes . '-' . $dia;
        }
        
        return $fecha;
    }

    // EstudiantesController.php
    public function inicio()
    {
        $data = [
            'titulo' => 'Inicio - Sistema de Gestión Académica'
        ];
        return view('inicio', $data);
    }
    
}