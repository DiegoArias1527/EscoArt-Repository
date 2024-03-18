<?php
header("Content-Type: application/json");

include("../datatable/conexion.php");
include("../datatable/funciones.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["Id_Usuario"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE Id_Usuario=:Id_Usuario LIMIT 1");
        $stmt->bindParam(":Id_Usuario", $_POST["Id_Usuario"]);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $salida["Nom_Usuario"] = $resultado["Nom_Usuario"];
            $salida["Primer_Apellido"] = $resultado["Primer_Apellido"];
            $salida["Segundo_Apellido"] = $resultado["Segundo_Apellido"];
            $salida["Correo_Usuario"] = $resultado["Correo_Usuario"];
            echo json_encode($salida);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Usuario no encontrado"));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Id_Usuario no proporcionado"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido"));
}
?>
