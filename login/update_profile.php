<?php
include("con_db.php");
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conex, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conex, $_POST['update_email']);


    // Actualizar solo nombre y correo
    mysqli_query($conex, "UPDATE `usuario` SET Nom_Usuario = '$update_name', Correo_Usuario = '$update_email' WHERE Id_Usuario = '$user_id'") or die('query failed');


    $old_pass = mysqli_real_escape_string($conex, $_POST['old_pass']);
    $new_pass = mysqli_real_escape_string($conex, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conex, $_POST['confirm_pass']);

    // Obtener la contraseña anterior de la base de datos
    $old_pass_query = mysqli_query($conex, "SELECT Contraseña FROM `usuario` WHERE Id_Usuario = '$user_id'");
    $row = mysqli_fetch_assoc($old_pass_query);
    $old_pass_db = $row['Contraseña'];
   

    if (!empty($new_pass) && !empty($confirm_pass)) {
        $hashed_new_pass = password_hash($confirm_pass, PASSWORD_DEFAULT);
        $update_query = mysqli_query($conex, "UPDATE `usuario` SET Contraseña = '$hashed_new_pass' WHERE Id_Usuario = '$user_id'");
        
        if (!$update_query) {
            die('Error al actualizar la contraseña: ' . mysqli_error($conex));
        }
    
        echo '
        <script>
            alert("Contraseña Actualizada Correctamente");
        </script>
        ';
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styleup.css">

</head>

<body>

    <div class="update-profile">

        <?php
        $select = mysqli_query($conex, "SELECT * FROM `usuario` WHERE Id_Usuario = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="flex">
                <div class="inputBox">
                    <span>nombre :</span>
                    <input type="text" name="update_name" value="<?php echo isset($fetch['Nom_Usuario']) ? $fetch['Nom_Usuario'] : ''; ?>" class="box">
                    <span>correo :</span>
                    <input type="text" name="update_email" value="<?php echo isset($fetch['Correo_Usuario']) ? $fetch['Correo_Usuario'] : ''; ?>" class="box">
                    <span>actualiza tu foto</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['Contraseña']; ?>">
                    <span>contraseña antigua:</span>
                    <input type="password" name="update_pass" placeholder="ingrese la contraseña actual" class="box">
                    <span>nueva contraseña:</span>
                    <input type="password" name="new_pass" placeholder="ingrese la contraseña nueva" class="box">
                    <span>confirmar contraseña :</span>
                    <input type="password" name="confirm_pass" placeholder="confirmar la contraseña" class="box">
                </div>
            </div>
            <input type="submit" value="Actualizar" name="update_profile" class="btn">
            <a href="../index2.php" class="delete-btn">volver</a>
        </form>

    </div>

</body>

</html>
