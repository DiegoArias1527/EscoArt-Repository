<?php
include("../datatable/conexion.php");
include("../datatable/funciones.php");

if (isset($_POST["id"])) {
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE id=:id");
    $resultado = $stmt->execute(
        array(
            ':id'  => $_POST["id"]
        )
    );
    
    if (!empty($resultado)) {
        echo 'Registro Eliminado Correctamente';
    }
}
