<?php

class Player
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

    public function addTile(Tile $t): void
    {
        $this->tiles[] = $t;
    }

    /**
     * @throws Exception
     */
    public function downTile(Tile $t): void
    {
        $pos = array_search($t, $this->tiles);
        if (is_numeric($pos)) {
            unset($this->tiles[$pos]);
        } else {
            throw new Exception("The player don't have the tile");
        }
    }

    public function countPips(): int
    {
        $pips = 0;
        foreach ($this->tiles as $tile) {
           $pips += $tile->getLeftPips() + $tile->getRightPips();
        }
        return $pips;
    }

}