<?php
header("Content-Type: application/json");

// Incluir archivos necesarios
include("../datatable/conexion.php");
include("../datatable/funciones.php");

// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el parámetro Id_Usuario
    if (isset($_POST["Id_Usuario"])) {
        // Preparar la sentencia SQL para eliminar el usuario
        $stmt = $conexion->prepare("DELETE FROM usuario WHERE Id_Usuario=:Id_Usuario");
        // Ejecutar la sentencia SQL con el parámetro proporcionado
        $resultado = $stmt->execute(array(':Id_Usuario'  => $_POST["Id_Usuario"]));
        
        // Verificar si la eliminación fue exitosa
        if (!empty($resultado)) {
            // La eliminación fue exitosa, enviar una respuesta JSON
            echo json_encode(array("message" => "Registro eliminado correctamente"));
        } else {
            // La eliminación falló, enviar una respuesta de error JSON
            http_response_code(500);
            echo json_encode(array("message" => "Error al eliminar el registro"));
        }
    } else {
        // No se proporcionó el parámetro Id_Usuario, enviar una respuesta de error JSON
        http_response_code(400);
        echo json_encode(array("message" => "Parámetro Id_Usuario no proporcionado"));
    }
} else {
    // Método HTTP no permitido, enviar una respuesta de error JSON
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido"));
}
?>