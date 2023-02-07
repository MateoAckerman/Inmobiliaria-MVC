<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\InmuebleController;
use Controllers\LoginController;
use Controllers\VendedorController;
use Controllers\WebController;

$router = new Router();


//Public
$router->get('/', [WebController::class, 'index']);
$router->get('/nosotros', [WebController::class, 'nosotros']);
$router->get('/anuncios', [WebController::class, 'anuncios']);
$router->get('/inmueble', [WebController::class, 'inmueble']);
$router->get('/blog', [WebController::class, 'blog']);
$router->get('/entrada', [WebController::class, 'entrada']);
$router->get('/entrada2', [WebController::class, 'entrada2']);
$router->get('/contacto', [WebController::class, 'contacto']);
$router->post('/contacto', [WebController::class, 'contacto']);
// $router->get('/', [WebController::class, 'index']);

//Autenticar
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Restriccion
$router->get('/admin', [InmuebleController::class, 'index']);

//Routing para los inmuebles
$router->get('/inmuebles/create', [InmuebleController::class, 'create']);
$router->post('/inmuebles/create', [InmuebleController::class, 'create']);
$router->get('/inmuebles/actualizar', [InmuebleController::class, 'actualizar']);
$router->post('/inmuebles/actualizar', [InmuebleController::class, 'actualizar']);
$router->post('/inmuebles/eliminar', [InmuebleController::class, 'eliminar']);

//Routing para los vendedores
$router->get('/vendedores/create', [VendedorController::class, 'create']);
$router->post('/vendedores/create', [VendedorController::class, 'create']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);



$router->checkRutas();
