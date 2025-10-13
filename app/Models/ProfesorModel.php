<?php namespace App\Models;

use CodeIgniter\Model;

class ProfesorModel extends Model
{
    protected $table      = 'profesores';
    protected $primaryKey = 'id';
    protected $returnType = 'array'; 
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'telefono'];

    // --- REGLAS DE VALIDACIÓN CORREGIDAS ---
    protected $validationRules = [
        'nombre'   => 'required|alpha_space|min_length[3]|max_length[100]',
        'apellido' => 'required|alpha_space|min_length[3]|max_length[100]',
        'dni'      => 'required|numeric|min_length[7]|max_length[8]', // Quitamos is_unique aquí
        'telefono' => 'required|max_length[20]',
    ];

    // --- MENSAJES DE VALIDACIÓN PERSONALIZADOS ---
    protected $validationMessages = [
        'nombre' => [
            'required' => 'El campo Nombre es obligatorio.',
            'alpha_space' => 'El nombre solo puede contener letras y espacios.',
            'min_length' => 'El nombre debe tener al menos 3 caracteres.',
            'max_length' => 'El nombre no puede exceder los 100 caracteres.'
        ],
        'apellido' => [
            'required' => 'El campo Apellido es obligatorio.',
            'alpha_space' => 'El apellido solo puede contener letras y espacios.',
            'min_length' => 'El apellido debe tener al menos 3 caracteres.',
            'max_length' => 'El apellido no puede exceder los 100 caracteres.'
        ],
        'dni' => [
            'required'  => 'El campo DNI es obligatorio.',
            'numeric'   => 'El DNI debe contener solo números.',
            'min_length' => 'El DNI debe tener al menos 7 dígitos.',
            'max_length' => 'El DNI no puede exceder los 8 dígitos.',
        ],
        'telefono' => [
            'required' => 'El campo Teléfono es obligatorio.',
            'max_length' => 'El teléfono no puede exceder los 20 caracteres.'
        ],
    ];

    // ✅ MÉTODO MEJORADO PARA VALIDAR DNI ÚNICO
    public function esDniUnico($dni, $id = 0)
    {
        $builder = $this->where('dni', $dni);
        
        if ($id > 0) {
            $builder->where('id !=', $id);
        }
        
        return $builder->countAllResults() === 0;
    }

    // ✅ MÉTODO SOBREESCRITO PARA INSERT CON VALIDACIÓN DE DNI
    public function insert($data = null, bool $returnID = true)
    {
        // Validar DNI único antes de insertar
        if (isset($data['dni']) && !$this->esDniUnico($data['dni'])) {
            $this->errors['dni'] = 'El DNI del profesor ya está registrado.';
            return false;
        }

        return parent::insert($data, $returnID);
    }

    // ✅ MÉTODO SOBREESCRITO PARA UPDATE CON VALIDACIÓN DE DNI
    public function update($id = null, $data = null): bool
    {
        // Si el DNI cambió, validar que sea único
        if (isset($data['dni']) && $id) {
            $profesorExistente = $this->find($id);
            if ($profesorExistente && $data['dni'] != $profesorExistente['dni']) {
                if (!$this->esDniUnico($data['dni'], $id)) {
                    $this->errors['dni'] = 'El DNI del profesor ya está registrado.';
                    return false;
                }
            }
        }

        return parent::update($id, $data);
    }
}