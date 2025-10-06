<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
    protected $returnType = 'array'; 
    protected $allowedFields = ['nombre', 'descripcion'];

    // --- REGLAS DE VALIDACIÓN ---
    protected $validationRules = [
        'nombre'      => 'required|alpha_space|min_length[3]|max_length[50]|is_unique[categorias.nombre,id,{id}]',
        'descripcion' => 'required|max_length[255]',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        'nombre' => [
            'required'  => 'El campo Nombre es obligatorio.',
            'is_unique' => 'Ya existe una categoría con este nombre.',
        ],
        'descripcion' => ['required' => 'El campo Descripción es obligatorio.'],
    ];
}