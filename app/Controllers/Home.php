<?php 
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // DEBUG: Verificar qué está pasando
        error_log("Home::index() - Usuario logueado: " . (session()->get('isLoggedIn') ? 'SI' : 'NO'));
        
        if (session()->get('isLoggedIn')) {
            $rol = session()->get('rol');
            error_log("Redirigiendo según rol: " . $rol);
            
            switch ($rol) {
                case 'admin':
                    return redirect()->to('/admin');
                case 'profesor':
                    return redirect()->to('/profesor');
                case 'estudiante':
                    return redirect()->to('/alumno');
                default:
                    // Mostrar home público
                    break;
            }
        }
        
        // Mostrar home público
        error_log("Mostrando home_view.php");
        return view('home_view');
    }

    public function admin()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') != 'admin') {
            return redirect()->to('/');
        }
        
        $data = [
            'titulo' => 'Panel de Administrador',
            'usuario' => session()->get('nombre') ? session()->get('nombre') : 'Administrador'
        ];
        return view('roles/admin', $data);
    }

    public function profesor()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') != 'profesor') {
            return redirect()->to('/');
        }
        
        $data = [
            'titulo' => 'Panel de Profesor', 
            'usuario' => session()->get('nombre') ? session()->get('nombre') : 'Profesor'
        ];
        return view('roles/profesor', $data);
    }

    public function alumno()
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') != 'estudiante') {
            return redirect()->to('/');
        }
        
        $data = [
            'titulo' => 'Panel de Alumno',
            'usuario' => session()->get('nombre') ? session()->get('nombre') : 'Estudiante'
        ];
        return view('roles/alumno', $data);
    }
}