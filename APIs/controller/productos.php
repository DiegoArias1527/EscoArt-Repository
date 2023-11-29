<?php
    header('Content-Type: application/json');
    require_once("../config/conexion.php");
    require_once("../models/Productos.php");
    $producto = new Producto();
    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case "GetAll":
            $datos=$producto->get_producto();
            echo json_encode($datos);
        break;

        case "GetId":
        $datos=$producto->get_producto_x_id($body["id_Producto"]);
        echo json_encode($datos);
        break;


        case "Insert":
            $datos=$producto->insert_producto(
                $body["Id_Producto"],
                $body["Nom_Producto"],
                $body["Precio_Producto"],
                $body["Desc_Producto"],
                $body["Id_Categoria"],
                $body["Id_Proveedor"]
            );
            echo "Insert Correcto";
        break;

        case "Update":
            $datos=$producto->update_producto(
                $body["Id_Producto"],
                $body["Nom_Producto"],
                $body["Precio_Producto"],
                $body["Desc_Producto"],
                $body["Id_Categoria"],
                $body["Id_Proveedor"]
            );
            echo "Upadate Correcto";
        break;




        case "Delete":
            $datos=$producto->delete_producto($body["Id_Producto"]);
            echo "Delete Correcto";
        break;







    }
    ?>