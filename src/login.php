<?php
require_once "config.php";
global $db;
session_start();

$error = "Enter your username and password";

if (isset($_POST['login'])) {
    try {
        $username = $_POST['username'];

        $query = $db->prepare('SELECT * FROM player WHERE username=:username');
        $query->bindValue(':username', $username);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            if ($user['password'] === $_POST['password']) {
                $error = "Log in successful";
                $_SESSION['username'] = $user['username'];
                header("Location: lobby.php");
                die();
            } else {
                $error = "Incorrect password";
            }

        } else {
            $error = "Incorrect username";
        }

    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    }
}

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
<h2>Login</h2>
<div id="contenedor">
    <?php
    echo "<h3> $error </h3>";
    ?>
    <form method="post">
        <label id="labeluser">
            <p>Username:</p>
            <input id="user" type="text" name="username" placeholder="Enter your username"/> <br/><br/>
        </label>

        <label id="labelpass">
            <p>Password:</p>
            <input id="pass" type="password" name="password" placeholder="Enter your password"/> <br/><br/>
        </label>
        <button type="submit" name="login" value="ok" id="start">Log in</button>
    </form>
</div>
</body>
</html>
