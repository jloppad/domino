<?php
require_once "config.php";
global $db;
session_start();

$error = $_SESSION['username'];



?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Blas's Domino</h1>
<h2>Lobby</h2>
<h2>Hello <?php echo $error ?></h2>
<div id="contenedor">
    <?php
        echo "<h3> Games </h3>";

    ?>

</div>
</body>
</html>