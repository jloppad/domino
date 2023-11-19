<?php

class Game
{
    private array $usernames;
    private array $players;
    private Stock $stock;
    private Table $table;
    private string $actualUsername;
    private string $handUsername;
    private Tile $selectedTile;

    /**
     * @param array $usernames
     * @param array $players
     * @param Stock $stock
     * @param Table $table
     * @param string $actualUsername
     * @param string $handUsername
     * @param Tile $selectedTile
     */
    public function __construct(array $usernames, array $players, Stock $stock, Table $table, string $actualUsername, string $handUsername, Tile $selectedTile)
    {
        $this->usernames = $usernames;
        $this->players = $players;
        $this->stock = $stock;
        $this->table = $table;
        $this->actualUsername = $actualUsername;
        $this->handUsername = $handUsername;
        $this->selectedTile = $selectedTile;
    }


}