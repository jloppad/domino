<?php
require_once "config.php";
include 'Game.php';
include 'Stock.php';
include 'Table.php';
include 'Tile.php';
include 'Player.php';
global $db;
session_start();

$user = $_SESSION['username'];

if (isset($_POST['new'])){
    $game = new Game([$user],[$user => new Player()], new Stock(),new Table());
    $_SESSION['game'] = $game;
    header('Location: waiting.php');
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
<form method='post'>
    <h1>Blas's Domino</h1>
    <h2>Lobby</h2>
    <h2>Hello <?php echo $user ?></h2>
    <div id="contenedor">
        <?php

        $activesUsername = $db->prepare('SELECT * FROM game where ended != 1 AND active != 0');
        $activesUsername->execute();

        echo "<h3> Your Games: </h3>";
        while ($game = $activesUsername->fetch(PDO::FETCH_ASSOC)) {
            $data = unserialize($game['data']);
            $usernames = $data->getUsernames();
            if (in_array($user, $usernames)){
                echo "<table><tr> <td colspan='" . count($usernames) . "'> Partida " . $game['id'] . "</td></tr><tr>";

                foreach ($usernames as $username) {
                    echo "<td>" . $username . "</td>";
                }

                echo "</tr></table>";
            }
        }

        $actives = $db->prepare('SELECT * FROM game where ended != 1 AND active != 1');
        $actives->execute();

        echo "<h3> Games actives: </h3>";
        while ($game = $actives->fetch(PDO::FETCH_ASSOC)) {
            $data = unserialize($game['data']);
            $usernames = $data->getUsernames();

            echo "<table><tr> <td colspan='" . count($usernames) . "'> Partida " . $game['id'] . "</td></tr><tr>";

            foreach ($usernames as $username) {
                echo "<td>" . $username . "</td>";
            }

            echo "</tr></table>";
        }

        ?>
    </div>
    <button type="submit" name="new" id="new">New Game</button>
</form>
</body>
</html>
