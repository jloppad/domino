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
    }
}

if (isset($_POST['start'])){
    $stmt = $db->prepare('UPDATE game SET active = 1 where id = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
}

$stmt = $db->prepare('SELECT * FROM game where id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->execute();
$datagame = $stmt->fetch(PDO::FETCH_ASSOC);

if ($datagame['active']){
    header('Location: domino.php');
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
                <th>Jugadores</th>
            </tr>
        <?php
             foreach ($usernames as $username){
                 $game->addNewPlayer($username);
                 echo "<tr><td>" . $username ."</td></tr>";
             }
            $_SESSION['game'] = $game;
        ?>
        </table>
    </div>
    <?php
        $disable = "disabled";
        if (count($usernames) >= 2){
            $disable = "";
        }
        echo '<button type="submit" name="start" id="new"' . $disable . '>Play</button>';
    ?>

</form>
</body>
</html>
