<?php
require_once "config.php";
include 'Game.php';
include 'Stock.php';
include 'Table.php';
include 'Tile.php';
include 'Player.php';
global $db;
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    die();
}
header("refresh:5");

$username = $_SESSION['username'];
$game = $_SESSION['game'];
$stock = $game->getStock();
$usernames = $game->getUsernames();
$players = $game->getPlayers();

if (!isset($_SESSION['initialSetup'])) {
    foreach ($usernames as $username) {
        for ($i = 0; $i < 7; $i++) {
            $players[$username]->addTile($stock->getTile());
        }
    }
    $_SESSION['initialSetup'] = true;
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Domino</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method='post'>
    <h1>Blas's Domino</h1>

    <div class="players">
        <table>
            <tr>
                <?php
                foreach ($usernames as $username) {
                    echo "<td>" . $username . "</td>";
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($usernames as $username) {
                    echo "<td>";
                    $tiles = $players[$username]->getTiles();
                    foreach ($tiles as $tile) {
                        if ($_SESSION['username'] != $username) {
                            echo '<img src="../resources/tiles/hide@0.5x.png" alt="hide">';
                        } else {
                            echo '<img src="../resources/tiles/' . $tile->getLeftPips() . '_' . $tile->getRightPips() . '@0.5x.png">';
                        }
                    }
                    echo "</td>";
                }
                ?>
            </tr>
        </table>
    </div>
</form>
</body>
</html>
