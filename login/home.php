<?php
// Conexión a la base de datos
include 'con_db.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:iniciarsesion.php');
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:iniciarsesion.php');
}

// Consulta para obtener el perfil del usuario
$select = mysqli_query($conex, "SELECT * FROM `usuario` WHERE Id_Usuario = '$user_id'") or die('query failed');

if (mysqli_num_rows($select) >  0) {
    $fetch = mysqli_fetch_assoc($select);
} else {
    echo '
    <script>
        alert("error");
    </script>
    ';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="styleup.css">
</head>
<body>


<div class="container">

    <div class="profile">

        <?php
        if ($fetch) {
            $imagePath = $fetch['image'] ?? 'images/default-avatar.png'; // Use default if image is null
            echo '<img src="' . $imagePath . '">';
        } else {
            echo '<img src="images/default-avatar.png">';
        }
        ?>

        <h3><?php echo $fetch['Nom_Usuario']; ?></h3>
        <a href="../index2.php" class="btn">continuar</a>
        <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
       
    </div>
</div>

</body>
</html>
