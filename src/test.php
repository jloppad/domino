<?php

require_once '../vendor/autoload.php';

try {

    // Class tile

    /*
    $tile = new Tile(3, 5);
    var_dump($tile);
    */

    // Class Stock

    /*
        $stock = new Stock();
        var_dump($stock);
        var_dump($stock->getTile());
    */
        /* Empty the stock
        for ($i = 0; $i < 27; $i++) {
            var_dump($stock->getTile());
        }
        var_dump($stock->isEmpty());
        */




    // Class Table

    /*
        $table = new Table();

        $centerTile = new Tile(6,6);
        var_dump($table->canConnectToTheLeft($centerTile));
        var_dump($table->canConnectToTheRight($centerTile));
        $table->addTileLeft($centerTile);
        var_dump($table->getTiles());

        $badTile = new Tile(1,1);
        var_dump($table->canConnectToTheLeft($badTile));
        var_dump($table->canConnectToTheRight($badTile));

        $rightTile = new Tile(6,1);
        var_dump($table->canConnectToTheLeft($rightTile));
        var_dump($table->canConnectToTheRight($rightTile));
        $table->addTileLeft($rightTile);
        var_dump($table->getTiles());

        $leftTile = new Tile(6,1);
        var_dump($table->canConnectToTheLeft($leftTile));
        var_dump($table->canConnectToTheRight($leftTile));
        $table->addTileRight($leftTile); // Se pone al reves
        var_dump($table->getTiles());
    */

    // Class Player

    /*
        $player = new Player();
        $tile = new Tile(3, 5);
        $player->addTile($tile);
        $player->downTile($tile);
        $tile1 = new Tile(6, 6);
        $player->addTile($tile);
        $player->addTile($tile1);
        var_dump($player->countPips());
    */

    // Class Game

    /*
        $game = new Game(["Javier","Antonio"],["Javier" => new Player(), "Antonio" => new Player()], new Stock(),new Table(), "Javier","Javier",new Tile(2,1));
        var_dump($game);
    */

} catch (Exception $e) {
    echo($e);
}

