<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Autorizacion extends Controller
{
    public function login()
    {
        // Muestra la vista del formulario
        return view('login/login');
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
            // Verifica la contraseña (ajustá si no usás hash)
            //if (password_verify($password, $usuario['password'])) {
            if ($password == $usuario['password']) {
                // Guarda datos de sesión
                $session->set([
                    'id_usuario' => $usuario['id'],
                    'nombre'     => isset($usuario['nombre']) ? $usuario['nombre'] : "",
                    'rol'        => $usuario['rol'],
                    'isLoggedIn' => true
                ]);
               
                return redirect()->to('Home'); // redirige al Home
            } else {
                return redirect()->back()->with('error', 'Credenciales inválidas'); 
            }
        } else {
            return redirect()->back()->with('error', 'Credenciales inválidas'); 
        }
    
        // Redirige según el rol
        // switch ($usuario['rol']) {
        //     case 'admin':
        //         return redirect()->to('/admin');
        //     case 'profesor':
        //         return redirect()->to('/profesor');
        //     case 'alumno':
        //         return redirect()->to('/alumno');
        //     default:
        //         return redirect()->to('/');
        
        // }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

