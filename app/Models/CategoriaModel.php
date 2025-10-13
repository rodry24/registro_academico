<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
    protected $returnType = 'array'; 
    protected $allowedFields = ['nombre', 'descripcion'];

    // --- REGLAS DE VALIDACIÓN CORREGIDAS ---
    protected $validationRules = [
        // 'id' => 'required', // ← ELIMINADO - El ID es auto-incremental
        'nombre'      => 'required|alpha_space|min_length[3]|max_length[50]',
        'descripcion' => 'required|max_length[255]',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        // 'id' => ['required' => 'El campo Id es obligatorio.'], // ← ELIMINADO
        'nombre' => [
            'required'     => 'El campo Nombre es obligatorio.',
            'alpha_space'  => 'El nombre solo puede contener letras y espacios.',
            'min_length'   => 'El nombre debe tener al menos 3 caracteres.',
            'max_length'   => 'El nombre no puede exceder los 50 caracteres.'
        ],
        'descripcion' => [
            'required'   => 'El campo Descripción es obligatorio.',
            'max_length' => 'La descripción no puede exceder los 255 caracteres.'
        ],
    ];

    // ✅ MÉTODO PARA VALIDACIÓN MANUAL DE NOMBRE ÚNICO
    public function esNombreUnico($nombre, $id = 0)
    {
        $builder = $this->where('nombre', $nombre);
        
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
            $this->errors['nombre'] = 'Ya existe una categoría con este nombre.';
            return false;
        }

        return parent::insert($data, $returnID);
    }

    // ✅ MÉTODO SOBREESCRITO PARA UPDATE CON VALIDACIÓN MANUAL
    public function update($id = null, $data = null): bool
    {
        // Si el nombre cambió, validar que sea único
        if (isset($data['nombre']) && $id) {
            $categoriaExistente = $this->find($id);
            if ($categoriaExistente && $data['nombre'] != $categoriaExistente['nombre']) {
                if (!$this->esNombreUnico($data['nombre'], $id)) {
                    $this->errors['nombre'] = 'Ya existe una categoría con este nombre.';
                    return false;
                }
            }
        }

        return parent::update($id, $data);
    }
}