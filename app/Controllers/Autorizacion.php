<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Autorizacion extends Controller
{
    public function login()
    {
        // Si ya está logueado, redirige según su rol
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        // Muestra la vista del formulario
        return view('login/login');
    }

    public function register()
    {
        // Si ya está logueado, redirige según su rol
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        // Muestra la vista del formulario de registro
        return view('login/register');
    }

    public function doRegister()
    {
        $model = new UsuarioModel();
        $session = session();

        // Validar datos (sin campo nombre)
        $rules = [
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]',
            'confirmar' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Preparar datos (sin campo nombre)
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol' => 'estudiante' // Por defecto, nuevo usuario es estudiante
        ];

        // Guardar usuario
        if ($model->insert($data)) {
            return redirect()->to('/')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al registrar usuario.');
        }
    }

    public function doLogin()
    {
        $session = session();
        $model = new UsuarioModel();

        // Recibe los datos del formulario
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Busca el usuario por email
        $usuario = $model->where('email', $email)->first();

        if ($usuario) {
            // Verifica la contraseña HASHEADADA
            if (password_verify($password, $usuario['password'])) {
                // Guarda datos de sesión (usa email como nombre)
                $session->set([
                    'id_usuario' => $usuario['id'],
                    'nombre'     => $usuario['email'], // Usa el email como nombre
                    'rol'        => $usuario['rol'],
                    'isLoggedIn' => true
                ]);
               
                // Redirige según el rol
                switch ($usuario['rol']) {
                    case 'admin':
                        return redirect()->to('/admin');
                    case 'profesor':
                        return redirect()->to('/profesor');
                    case 'estudiante':
                        return redirect()->to('/alumno');
                    default:
                        return redirect()->to('/');
                }
            } else {
                return redirect()->back()->with('error', 'Credenciales inválidas'); 
            }
        } else {
            return redirect()->back()->with('error', 'Credenciales inválidas'); 
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}