<?php

class Table
{
    private array $tiles;

    public function __construct()
    {
        $this->tiles = [];
    }

    public function getTiles(): array
    {
        return $this->tiles;
    }

    /**
     * @throws Exception
     */
    public function addTileLeft(Tile $t): void
    {
        if ($this->canConnectToTheLeft($t)) {
            array_unshift($this->tiles,$t);
        } else {
            Throw new Exception("The tile can't connect to the left side of the tile on the left of the table");
        }
    }

    /**
     * @throws Exception
     */
    public function addTileRight(Tile $t): void
    {
        if ($this->canConnectToTheRight($t)) {
            $this->tiles[] = $t;
        } else {
            Throw new Exception("The tile can't connect to the right side of the tile on the right of the table");
        }
    }

    public function canConnectToTheLeft(Tile $t): bool
    {
        if (empty($this->tiles)) {
            return true;
        }

        if ($this->tiles[0]->connectsTo($t)) {
            if ($this->tiles[0]->getLeftPips() == $t->getLeftPips()){
                $t->flipTile();
            }
            if ($this->tiles[0]->getLeftPips() == $t->getRightPips()) {
                return true;
            }
        }
        return false;
    }

    public function canConnectToTheRight(Tile $t): bool
    {
        if (empty($this->tiles)) {
            return true;
        }

        if (end($this->tiles)->connectsTo($t)) {
            if ($this->tiles[0]->getRightPips() == $t->getRightPips()){
                $t->flipTile();
            }
            if (end($this->tiles)->getRightPips() == $t->getLeftPips()) {
                return true;
            }
        }
        return false;
    }

}