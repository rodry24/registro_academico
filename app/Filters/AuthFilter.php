<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no está logueado, redirige al login
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('error', 'Debes iniciar sesión para acceder a esta página');
            return redirect()->to('/login');
        }

        return true;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hacemos nada después de la ejecución
    }
}