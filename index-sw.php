<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'global.php';
use Steampixel\Route;

/**
 * @OA\Info(title="Mini API", version="0.1")
 */

Route::add('/', function() {
    echo json_encode(["nombre"=>'Bienvenido a index']);
});

/**
 * @OA\Get(
 *     path="/api",
 *     @OA\Response(response="200", description="intro al api")
 * )
 */
Route::add('/api', function() {
    echo json_encode(["nombre"=>'Bienvenido al API']);
});

/**
 * @OA\Get(
 *     path="/api/productos",
 *     @OA\Response(response="200", description="traer productos")
 * )
 */
Route::add('/api/productos', function() {
    echo traerProductos();
}, 'get');

Route::add('/api/productos/([0-9]*)', function($id) {
    echo traerProducto($id);
}, 'get');

Route::add('/api/productos/editar', function() {
    echo json_encode($_POST);
}, 'post');


Route::run('/');
?>