<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    protected $table        = 'estudiantes';
    protected $primaryKey   = 'id';
    protected $returnType   = 'array';
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'telefono', 'fecha_nacimiento', 'direccion', 'carrera_id', 'fecha_ingreso'];

    // ✅ SOLO validaciones básicas - SIN problemas de fecha
    protected $validationRules = [
        'nombre'     => 'required',
        'apellido'   => 'required',
        'dni'        => 'required|is_unique[estudiantes.dni,id,{id}]',
        'telefono'   => 'required',
        'direccion'  => 'required',
        'carrera_id' => 'required',
        'fecha_nacimiento' => 'required',
        'fecha_ingreso'    => 'required',
    ];

    protected $validationMessages = [
        'nombre'     => ['required' => 'El campo Nombre es obligatorio.'],
        'apellido'   => ['required' => 'El campo Apellido es obligatorio.'],
        'dni'        => [
            'required'  => 'El campo DNI es obligatorio.',
            'is_unique' => 'El DNI ingresado ya se encuentra registrado.',
        ],
        'telefono'   => ['required' => 'El campo Teléfono es obligatorio.'],
        'direccion'  => ['required' => 'El campo Dirección es obligatorio.'],
        'carrera_id' => ['required' => 'Debe seleccionar una Carrera.'],
        'fecha_nacimiento' => ['required' => 'El campo Fecha de Nacimiento es obligatorio.'],
        'fecha_ingreso'    => ['required' => 'El campo Fecha de Ingreso es obligatorio.'],
    ];
    
    public function obtenerEstudiantesConCarrera()
    {
        return $this->select('estudiantes.*, carreras.nombre as nombre_carrera')
                    ->join('carreras', 'carreras.id = estudiantes.carrera_id')
                    ->findAll();
    }
}