<?php
function traerProductos(){
    $listado = ["Computadora", "Celular", "Calculadora"];
    return enviarRespuesta(1,$listado);
}

function traerProducto($id){
    $listado = ["Computadora", "Celular", "Calculadora"];
    return enviarRespuesta(1,$listado[$id]);
}

function enviarRespuesta($resultado, $data){
    $respuesta=array(
        "resultado"=>$resultado==1?"Ok":"Error", 
        "data"=>$data);
    return json_encode($respuesta);
}


?>