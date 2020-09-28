<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'global.php';
use Steampixel\Route;

Route::add('/', function() {
    echo json_encode(["nombre"=>'Bienvenido a index']);
});

Route::add('/api', function() {
    echo json_encode(["nombre"=>'Bienvenido al API']);
});

Route::add('/api/productos', function() {
    echo traerProductos();
}, 'get');

Route::add('/api/productos/([0-9]*)', function($id) {
    echo traerProducto($id);
}, 'get');

Route::add('/api/productos', function() {
    echo agregarProducto(json_decode(file_get_contents('php://input')));
}, 'post');

Route::add('/api/productos/multiple', function() {
    echo agregarMultiplesProductos(
            json_decode(file_get_contents('php://input'))
        );

}, 'post');

Route::run('/');
?>