<?php
header("Content-Type: application/json");

// Incluir archivos necesarios
include("../datatable/conexion.php");
include("../datatable/funciones.php");

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el parámetro "operacion"
    if (isset($_POST["operacion"])) {
        // Verificar la operación a realizar
        if ($_POST["operacion"] == "Crear") {
            // Verificar si se recibieron los datos necesarios
            if (isset($_POST["nombre"], $_POST["primerape"], $_POST["segundoape"], $_POST["correo"])) {
                // Preparar la sentencia SQL para insertar un nuevo usuario
                $stmt = $conexion->prepare("INSERT INTO usuario (Nom_Usuario, Primer_Apellido, Segundo_Apellido, Correo_Usuario) VALUES (:Nom_Usuario, :Primer_Apellido, :Segundo_Apellido, :Correo_Usuario)");
                // Ejecutar la sentencia SQL con los datos proporcionados
                $resultado = $stmt->execute(
                    array(
                        ':Nom_Usuario' => $_POST["nombre"],
                        ':Primer_Apellido' => $_POST["primerape"],
                        ':Segundo_Apellido' => $_POST["segundoape"],
                        ':Correo_Usuario' => $_POST["correo"]
                    )
                );
                // Verificar si la inserción fue exitosa
                if (!empty($resultado)) {
                    echo json_encode(array("message" => "Registro creado correctamente"));
                } else {
                    http_response_code(500);
                    echo json_encode(array("message" => "Error al crear el registro"));
                }
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Faltan datos requeridos para crear el registro"));
            }
        } elseif ($_POST["operacion"] == "Editar") {
            // Verificar si se recibieron los datos necesarios
            if (isset($_POST["nombre"], $_POST["primerape"], $_POST["segundoape"], $_POST["correo"], $_POST["Id_Usuario"])) {
                // Preparar la sentencia SQL para actualizar un usuario existente
                $stmt = $conexion->prepare("UPDATE usuario SET Nom_Usuario=:Nom_Usuario, Primer_Apellido=:Primer_Apellido, Segundo_Apellido=:Segundo_Apellido, Correo_Usuario=:Correo_Usuario WHERE Id_Usuario=:Id_Usuario");
                // Ejecutar la sentencia SQL con los datos proporcionados
                $resultado = $stmt->execute(
                    array(
                        ':Nom_Usuario' => $_POST["nombre"],
                        ':Primer_Apellido' => $_POST["primerape"],
                        ':Segundo_Apellido' => $_POST["segundoape"],
                        ':Correo_Usuario' => $_POST["correo"],
                        ':Id_Usuario' => $_POST["Id_Usuario"]
                    )
                );
                // Verificar si la actualización fue exitosa
                if (!empty($resultado)) {
                    echo json_encode(array("message" => "Registro actualizado correctamente"));
                } else {
                    http_response_code(500);
                    echo json_encode(array("message" => "Error al actualizar el registro"));
                }
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Faltan datos requeridos para actualizar el registro"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Operación no válida"));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "La operación no ha sido proporcionada"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido"));
}
?>
