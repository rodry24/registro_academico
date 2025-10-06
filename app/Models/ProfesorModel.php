<?php namespace App\Models;

use CodeIgniter\Model;

class ProfesorModel extends Model
{
    protected $table      = 'profesores';
    protected $primaryKey = 'id';
    protected $returnType = 'array'; 
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'telefono'];

    // --- REGLAS DE VALIDACIÓN ---
    protected $validationRules = [
        'nombre'   => 'required|alpha_space|min_length[3]|max_length[100]',
        'apellido' => 'required|alpha_space|min_length[3]|max_length[100]',
        'dni'      => 'required|numeric|min_length[7]|max_length[8]|is_unique[profesores.dni,id,{id}]',
        'telefono' => 'required|max_length[20]',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        'nombre' => ['required' => 'El campo Nombre es obligatorio.'],
        'apellido' => ['required' => 'El campo Apellido es obligatorio.'],
        'dni' => [
            'required'  => 'El campo DNI es obligatorio.',
            'numeric'   => 'El DNI debe contener solo números.',
            'is_unique' => 'El DNI del profesor ya está registrado.',
        ],
        'telefono' => ['required' => 'El campo Teléfono es obligatorio.'],
    ];
}