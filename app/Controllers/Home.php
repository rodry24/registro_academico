<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Pasamos el título a la vista para que el layout lo use
        $data['titulo'] = 'Página Principal';
        
        // Carga la vista de inicio
        return view('home_view', $data); 
    }
}