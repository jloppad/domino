<?php
require_once "config.php";
include 'Game.php';
include 'Stock.php';
include 'Table.php';
include 'Tile.php';
include 'Player.php';
global $db;
session_start();
header("refresh:5");

$username = $_SESSION['username'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $gamequery = $db->prepare('SELECT * FROM game where id = :id ');
    $gamequery->bindParam(':id',$id);
    $gamequery->execute();
    $gamedata = $gamequery->fetch(PDO::FETCH_ASSOC);
    $data = unserialize($gamedata['data']);
    $usernames = $data->getUsernames();

    if (in_array($username, $usernames)){
        $game = $_SESSION['game'];
    }else {
        $gamequery = $db->prepare('SELECT * FROM game where id = :id ');
        $gamequery->bindParam(':id',$id);
        $gamequery->execute();

        $dategame = $gamequery->fetch(PDO::FETCH_ASSOC);
        $game = unserialize($dategame['data']);
        $game->addNewPlayer($username);
        $datos = serialize($game);
        $stmt = $db->prepare('UPDATE game SET data = :datos where id = :id');
        $stmt->bindValue(':datos', $datos, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['game'] = $game;
    }

}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Waiting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method='post'>
    <h1>Blas's Domino</h1>
    <h2>Waiting</h2>
    <h2>Hello <?php echo $username ?>, you are waiting the game</h2>
    <div id="contenedor">
        <table>
            <tr>
                <td>Jugadores</td>
            </tr>
        <?php
             foreach ($usernames as $username){
                 echo "<tr><td>" . $username ."</td></tr>";
             }
        ?>
        </table>
    </div>
    <button type="submit" name="new" id="new">New Game</button>
</form>
</body>
</html>
