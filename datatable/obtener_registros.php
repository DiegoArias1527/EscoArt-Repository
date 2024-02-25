<?php
    include("../datatable/conexion.php");
    include("../datatable/funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM usuario ";

    if (isset($_POST["search"]["value"])) {
        $query .= 'WHERE Nom_Usuario LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR Primer_Apellido LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR Segundo_Apellido LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR Correo_Usuario LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $_POST["order"]['0']['column'] . ' '. $_POST["order"][0]['dir']. ' ';
        
    }else{
        $query .= 'ORDER BY id DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        $sub_array = array();
        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["Nom_Usuario"];
        $sub_array[] = $fila["Primer_Apellido"];
        $sub_array[] = $fila["Segundo_Apellido"];
        $sub_array[] = $fila["Correo_Usuario"];
        $sub_array[] = $fila["Contraseña"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"              =>intval($_POST["draw"]),
        "recordsTotal"      =>$filtered_rows,
        "recordsFiltered"   =>obtener_registros(),
        "data"              =>$datos
    );

    echo json_encode($salida);