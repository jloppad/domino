<?php

class tile
{
    private int $right_pips;
    private int $left_pips;

    /**
     * @param int $right_pips
     * @param int $left_pips
     * @throws Exception
     */
    public function __construct(int $right_pips, int $left_pips)
    {
        if ($right_pips > 6 || $right_pips < 0 || $left_pips > 6 || $left_pips < 0) {
            throw new Exception("The pips of the tile are incorrect");
        }
        $this->right_pips = $right_pips;
        $this->left_pips = $left_pips;
    }

    public function getRightPips(): int
    {
        return $this->right_pips;
    }

    public function getLeftPips(): int
    {
        return $this->left_pips;
    }

    public function connectsTo(tile $t): bool
    {
        if ($t->getRightPips() == $this->right_pips || $t->getRightPips() == $this->left_pips || $t->getLeftPips() == $this->right_pips || $t->getLeftPips() == $this->left_pips) {
            return true;
        }
        return false;
    }

    public function countPips(): int
    {
        return $this->right_pips + $this->left_pips;
    }

}