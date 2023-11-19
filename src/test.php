<?php

require_once '../vendor/autoload.php';

try {

    // Class tile
        $tile = new tile(3, 5);
        var_dump($tile);

    // Class Stock
        $stock = new stock();
        var_dump($stock);
        var_dump($stock->getTile());
        /* Empty the stock
        for ($i = 0; $i < 27; $i++) {
            var_dump($stock->getTile());
        }
        */
        var_dump($stock->isEmpty());

} catch (Exception $e) {
    echo ($e);
}

