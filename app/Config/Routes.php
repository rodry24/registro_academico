<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// app/Config/Routes.php

$routes->get('/', 'EstudiantesController::inicio');

// --- RUTAS PARA ESTUDIANTES ---

// R: Listado (GET /estudiantes)
$routes->get('estudiantes', 'EstudiantesController::index'); 

// C: Mostrar formulario (GET /estudiantes/crear)
$routes->get('estudiantes/crear', 'EstudiantesController::crear'); 

// C: Guardar datos (POST /estudiantes/guardar)
$routes->post('estudiantes/guardar', 'EstudiantesController::guardar'); 

// U: Mostrar formulario de edición (GET /estudiantes/editar/1)
$routes->get('estudiantes/editar/(:num)', 'EstudiantesController::editar/$1'); 

// U: Procesar actualización (POST /estudiantes/actualizar)
$routes->post('estudiantes/actualizar', 'EstudiantesController::actualizar'); 

// D: Eliminar registro (GET /estudiantes/eliminar/1)
$routes->get('estudiantes/eliminar/(:num)', 'EstudiantesController::eliminar/$1');

// --- RUTAS PARA CARRERAS ---
$routes->get('carreras', 'CarrerasController::index'); 
$routes->get('carreras/crear', 'CarrerasController::crear'); 
$routes->post('carreras/guardar', 'CarrerasController::guardar'); 
$routes->get('carreras/editar/(:num)', 'CarrerasController::editar/$1'); 
$routes->post('carreras/actualizar', 'CarrerasController::actualizar'); 
$routes->get('carreras/eliminar/(:num)', 'CarrerasController::eliminar/$1');

// --- RUTAS PARA PROFESORES ---
$routes->get('profesores', 'ProfesoresController::index'); 
$routes->get('profesores/crear', 'ProfesoresController::crear'); 
$routes->post('profesores/guardar', 'ProfesoresController::guardar'); 
$routes->get('profesores/editar/(:num)', 'ProfesoresController::editar/$1'); 
$routes->post('profesores/actualizar', 'ProfesoresController::actualizar'); 
$routes->get('profesores/eliminar/(:num)', 'ProfesoresController::eliminar/$1');

// --- RUTAS PARA CATEGORÍAS ---
$routes->get('categorias', 'CategoriasController::index'); 
$routes->get('categorias/crear', 'CategoriasController::crear'); 
$routes->post('categorias/guardar', 'CategoriasController::guardar'); 
$routes->get('categorias/editar/(:num)', 'CategoriasController::editar/$1'); 
$routes->post('categorias/actualizar', 'CategoriasController::actualizar'); 
$routes->get('categorias/eliminar/(:num)', 'CategoriasController::eliminar/$1');