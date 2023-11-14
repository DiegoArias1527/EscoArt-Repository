<?php
include("../datatable/conexion.php");
include("../datatable/funciones.php");

if (isset($_POST["Id_Usuario"])) {
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE Id_Usuario=:Id_Usuario");
    $resultado = $stmt->execute(
        array(
            ':Id_Usuario'  => $_POST["Id_Usuario"]
        )
    );
    
    if (!empty($resultado)) {
        echo 'Registro Eliminado Correctamente';
    }
}
