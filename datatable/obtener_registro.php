<?php
include("../datatable/conexion.php");
include("../datatable/funciones.php");

if (isset($_POST["Id_Usuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE Id_Usuario='" . $_POST["Id_Usuario"] . "' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach ($resultado as $fila) {
        $salida["Nom_Usuario"] = $fila["Nom_Usuario"];
        $salida["Primer_Apellido"] = $fila["Primer_Apellido"];
        $salida["Segundo_Apellido"] = $fila["Segundo_Apellido"];
        $salida["Correo_Usuario"] = $fila["Correo_Usuario"];
    }

    echo json_encode($salida);
}
