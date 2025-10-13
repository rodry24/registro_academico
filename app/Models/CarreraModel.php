<?php namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table      = 'carreras';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'codigo', 'categoria_id', 'duracion', 'profesor_id'];
    
    // --- REGLAS DE VALIDACIÓN CORREGIDAS ---
    protected $validationRules = [
        // 'id' => 'required', // ← ELIMINADO - El ID es auto-incremental
        'nombre'       => 'required|alpha_space|min_length[3]|max_length[100]', // ← Cambiado a min_length[3]
        'codigo'       => 'required|alpha_numeric|min_length[3]|max_length[10]', // ← Quitado is_unique temporalmente
        'duracion'     => 'required|integer|greater_than[0]|less_than[8]', 
        'categoria_id' => 'required|is_natural_no_zero',
        'profesor_id'  => 'required|is_natural_no_zero',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        // 'id' => ['required' => 'El campo Id es obligatorio.'], // ← ELIMINADO
        'nombre' => [
            'required'    => 'El campo Nombre es obligatorio.',
            'alpha_space' => 'El nombre solo puede contener letras y espacios.',
            'min_length'  => 'El nombre debe tener al menos 3 caracteres.',
            'max_length'  => 'El nombre no puede exceder los 100 caracteres.'
        ],
        'codigo' => [
            'required'     => 'El campo Código es obligatorio.',
            'alpha_numeric' => 'El código solo puede contener letras y números.',
            'min_length'   => 'El código debe tener al menos 3 caracteres.',
            'max_length'   => 'El código no puede exceder los 10 caracteres.'
        ],
        'duracion' => [
            'required'      => 'El campo Duración es obligatorio.',
            'integer'       => 'La duración debe ser un número entero.',
            'greater_than'  => 'La duración debe ser mayor a 0 años.',
            'less_than'     => 'La duración no puede ser mayor a 7 años.'
        ],
        'categoria_id' => [
            'required'      => 'Debe seleccionar una Categoría.',
            'is_natural_no_zero' => 'Debe seleccionar una Categoría válida.',
        ],
        'profesor_id' => [
            'required'      => 'Debe seleccionar un Profesor.',
            'is_natural_no_zero' => 'Debe seleccionar un Profesor válido.',
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

    // ✅ MÉTODOS PARA VALIDACIÓN MANUAL DE UNICIDAD
    public function esNombreUnico($nombre, $id = 0)
    {
        $builder = $this->where('nombre', $nombre);
        
        if ($id > 0) {
            $builder->where('id !=', $id);
        }
        
        return $builder->countAllResults() === 0;
    }

    public function esCodigoUnico($codigo, $id = 0)
    {
        $builder = $this->where('codigo', $codigo);
        
        if ($id > 0) {
            $builder->where('id !=', $id);
        }
        
        return $builder->countAllResults() === 0;
    }

    // ✅ MÉTODO SOBREESCRITO PARA INSERT CON VALIDACIÓN MANUAL
    public function insert($data = null, bool $returnID = true)
    {
        // Validar nombre único antes de insertar
        if (isset($data['nombre']) && !$this->esNombreUnico($data['nombre'])) {
            $this->errors['nombre'] = 'Ya existe una carrera con este nombre.';
            return false;
        }

        // Validar código único antes de insertar
        if (isset($data['codigo']) && !$this->esCodigoUnico($data['codigo'])) {
            $this->errors['codigo'] = 'El código de carrera ya está en uso.';
            return false;
        }

        return parent::insert($data, $returnID);
    }

    // ✅ MÉTODO SOBREESCRITO PARA UPDATE CON VALIDACIÓN MANUAL
    public function update($id = null, $data = null): bool
    {
        // Si el nombre cambió, validar que sea único
        if (isset($data['nombre']) && $id) {
            $carreraExistente = $this->find($id);
            if ($carreraExistente && $data['nombre'] != $carreraExistente['nombre']) {
                if (!$this->esNombreUnico($data['nombre'], $id)) {
                    $this->errors['nombre'] = 'Ya existe una carrera con este nombre.';
                    return false;
                }
            }
        }

        // Si el código cambió, validar que sea único
        if (isset($data['codigo']) && $id) {
            $carreraExistente = $this->find($id);
            if ($carreraExistente && $data['codigo'] != $carreraExistente['codigo']) {
                if (!$this->esCodigoUnico($data['codigo'], $id)) {
                    $this->errors['codigo'] = 'El código de carrera ya está en uso.';
                    return false;
                }
            }
        }

        return parent::update($id, $data);
    }
}