<?php namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table      = 'carreras';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'codigo', 'categoria_id', 'duracion', 'profesor_id'];
    
    // --- REGLAS DE VALIDACIÓN ---
    protected $validationRules = [
        'nombre'       => 'required|alpha_space|min_length[5]|max_length[100]|is_unique[carreras.nombre,id,{id}]',
        'codigo'       => 'required|alpha_numeric_punct|min_length[3]|max_length[10]|is_unique[carreras.codigo,id,{id}]',
        'duracion'     => 'required|integer|greater_than[0]|less_than[8]', 
        'categoria_id' => 'required|is_natural_no_zero|is_not_unique[categorias.id]',
        'profesor_id'  => 'required|is_natural_no_zero|is_not_unique[profesores.id]',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        'nombre' => [
            'required'  => 'El campo Nombre es obligatorio.',
            'is_unique' => 'Ya existe una carrera con este nombre.',
        ],
        'codigo' => [
            'required'  => 'El campo Código es obligatorio.',
            'is_unique' => 'El código de carrera ya está en uso.',
        ],
        'duracion' => [
            'required'      => 'El campo Duración es obligatorio.',
            'integer'       => 'La duración debe ser un número entero.',
            'greater_than'  => 'La duración debe ser mayor a 0 años.',
        ],
        'categoria_id' => [
            'required'      => 'Debe seleccionar una Categoría.',
            'is_not_unique' => 'La Categoría seleccionada no es válida.',
        ],
        'profesor_id' => [
            'required'      => 'Debe seleccionar un Profesor.',
            'is_not_unique' => 'El Profesor a cargo seleccionado no es válido.',
        ],
    ];
    
    // Método para obtener carreras con su categoría y profesor
    public function obtenerCarrerasDetalle()
    {
        return $this->select('carreras.*, categorias.nombre as nombre_categoria, profesores.nombre as nombre_profesor_a_cargo')
                    ->join('categorias', 'categorias.id = carreras.categoria_id')
                    ->join('profesores', 'profesores.id = carreras.profesor_id')
                    ->findAll();
    }
}