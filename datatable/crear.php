<?php
include("../datatable/conexion.php");
include("../datatable/funciones.php");


if ($_POST["operacion"] == "Crear") {
    $stmt = $conexion->prepare("INSERT INTO usuario (Nom_Usuario, Primer_Apellido, Segundo_Apellido, Correo_Usuario) VALUES (:Nom_Usuario, :Primer_Apellido, :Segundo_Apellido, :Correo_Usuario)");
    $resultado = $stmt->execute(
        array(
            ':Nom_Usuario'  => $_POST["nombre"],
            ':Primer_Apellido'  => $_POST["primerape"],
            ':Segundo_Apellido'  => $_POST["segundoape"],
            ':Correo_Usuario'  => $_POST["correo"],
        )
    );
    
    if (!empty($resultado)) {
        echo 'Registro Creado Correctamente';
    }
}



if ($_POST["operacion"] == "Editar") {
    $stmt = $conexion->prepare("UPDATE usuario SET Nom_Usuario=:Nom_Usuario, Primer_Apellido=:Primer_Apellido, Segundo_Apellido=:Segundo_Apellido, Correo_Usuario=:Correo_Usuario WHERE Id_Usuario=:Id_Usuario");
    $resultado = $stmt->execute(
        array(
            ':Nom_Usuario'  => $_POST["nombre"],
            ':Primer_Apellido'  => $_POST["primerape"],
            ':Segundo_Apellido'  => $_POST["segundoape"],
            ':Correo_Usuario'  => $_POST["correo"],
            ':Id_Usuario'  => $_POST["Id_Usuario"]
        )
    );
    
    if (!empty($resultado)) {
        echo 'Registro Actualizado Correctamente';
    }else {
        echo 'Error al actualizar el registro: ' . $stmt->errorInfo()[2];
    }
}

