<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Página principal
        //$data['titulo'] = 'Página Principal';
        //return view('Views/home_view', $data);
    }

    public function admin()
    {
        // Vista para administrador
        $data['titulo'] = 'Panel de Administrador';
        return view('roles/admin', $data);
    }

    public function profesor()
    {
        // Vista para profesor
        $data['titulo'] = 'Panel de Profesor';
        return view('roles/profesor', $data);
    }

    public function alumno()
    {
        // Vista para alumno
        $data['titulo'] = 'Panel de Alumno';
        return view('roles/alumno', $data);
    }
}
