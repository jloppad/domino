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
    public function __construct(array $usernames, array $players, Stock $stock, Table $table)
    {
        $this->usernames = $usernames;
        $this->players = $players;
        $this->stock = $stock;
        $this->table = $table;
    }

    public function addNewPlayer(string $username): void
    {
        if (!in_array($username, $this->usernames)){
            $this->usernames[] = $username;
            $this->players[$username] = new Player();
        }

    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function setPlayers(array $players): void
    {
        $this->players = $players;
    }

    public function getStock(): Stock
    {
        return $this->stock;
    }

    public function setStock(Stock $stock): void
    {
        $this->stock = $stock;
    }

    public function getTable(): Table
    {
        return $this->table;
    }

    public function setTable(Table $table): void
    {
        $this->table = $table;
    }

    public function getUsernames(): array
    {
        return $this->usernames;
    }

    public function setSelectedTile(Tile $selectedTile): void
    {
        $this->selectedTile = $selectedTile;
    }

    public function setActualUsername(string $actualUsername): void
    {
        $this->actualUsername = $actualUsername;
    }

    public function setHandUsername(string $handUsername): void
    {
        $this->handUsername = $handUsername;
    }


}