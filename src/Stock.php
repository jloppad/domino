<?php

class Stock
{
    private array $tiles;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->generateTiles();
        $this->shuffleTiles();
    }

    /**
     * @throws Exception
     */
    private function generateTiles(): void
    {
        $this->tiles = [];
        for ($i = 0; $i <= 6; $i++) {
            for ($j = $i; $j <= 6; $j++) {
                $tile = new Tile($i, $j);
                $this->tiles[] = $tile;
            }
        }
    }

    private function shuffleTiles(): void
    {
        shuffle($this->tiles);
    }

    /**
     * @throws Exception
     */
    public function getTile()
    {
        if ($this->isEmpty()) {
            throw new Exception("The stock is empty");
        }

        return array_pop($this->tiles);
    }

    public function isEmpty(): bool
    {
        return empty($this->tiles);
    }

}