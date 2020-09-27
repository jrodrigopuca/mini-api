<?php
function traerProductos(){
    $listado = ["Computadora", "Celular", "Calculadora"];
    return enviarRespuesta(1,$listado);
}

function traerProducto($id){
    $listado = ["Computadora", "Celular", "Calculadora"];
    return enviarRespuesta(1,$listado[$id]);
}

function agregarProducto($array){
    #var_dump($array);
    return enviarRespuesta(1,"Agregado correctamente");
}

function enviarRespuesta($resultado, $data){
    $respuesta=array(
        "resultado"=>$resultado==1?"Ok":"Error", 
        "data"=>$data);
    return json_encode($respuesta);
}

?>