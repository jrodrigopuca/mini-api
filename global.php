<?php
require_once "conexion.php";

function conecta()
{
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME.";charset=utf8", DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("sin_conexion");
    }

}

function traerProductos(){
    $pdo = conecta();
    $sql = 'SELECT *
            FROM productos';
    $stmt = $pdo->query($sql);
    $productos=  $stmt->fetchAll(PDO::FETCH_OBJ);
    unset($pdo);
    unset($stmt);
    return enviarRespuesta(1,$productos);
}

function traerProducto($id){
    $pdo = conecta();
    $sql = 'SELECT *
            FROM productos
            WHERE id=:id';
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $productos=  $stmt->fetchAll(PDO::FETCH_OBJ);
    unset($pdo);
    unset($stmt);
    return enviarRespuesta(1,$productos[0]);
}

function agregarProducto($data){
    $pdo = conecta();
    $sql = 'INSERT INTO productos 
                (nombre, descripcion)
                VALUES
                (:nombre, :descripcion)';
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $data->nombre,PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $data->descripcion,PDO::PARAM_STR);
    $respuesta=$stmt->execute();
    $lastId=$pdo->lastInsertId();
    return enviarRespuesta(1,"Agregado correctamente");
}

function agregarMultiplesProductos($productos){
    return json_encode(
        array_map(
            function($p){
                return json_decode(
                    agregarProducto($p)
                );
            },$productos
        ));

}


function enviarRespuesta($resultado, $data){
    $respuesta=array(
        "resultado"=>$resultado==1?"Ok":"Error", 
        "data"=>$data);
    return json_encode($respuesta);
}

?>