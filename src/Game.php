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

        $this->usernames[] = $username;
        $this->players[$username] = new Player();

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