<?php

function obtener_registros(){
    include("../datatable/conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM usuario");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return count($resultado);
}

?>