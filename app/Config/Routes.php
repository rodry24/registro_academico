<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// RUTA PRINCIPAL
$routes->get('/', 'Home::index');

// LOGIN
$routes->get('login', 'Autorizacion::login');        // GET: mostrar formulario
$routes->post('login', 'Autorizacion::doLogin');     // POST: procesar login
$routes->get('logout', 'Autorizacion::logout');

// REGISTRO
$routes->get('register', 'Autorizacion::register');      // GET: mostrar formulario
$routes->post('register', 'Autorizacion::doRegister');   // POST: procesar registro

// PANELES
$routes->get('admin', 'Home::admin');
$routes->get('profesor', 'Home::profesor');
$routes->get('alumno', 'Home::alumno');

// --- RUTAS PARA ESTUDIANTES ---
$routes->get('estudiantes', 'EstudiantesController::index'); 
$routes->get('estudiantes/crear', 'EstudiantesController::crear'); 
$routes->post('estudiantes/guardar', 'EstudiantesController::guardar'); 
$routes->get('estudiantes/editar/(:num)', 'EstudiantesController::editar/$1'); 
$routes->post('estudiantes/actualizar', 'EstudiantesController::actualizar'); 
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