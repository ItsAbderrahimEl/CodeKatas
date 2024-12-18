<?php

namespace App\Tennis;

class Player
{
    protected string $name;
    protected int $score = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score(int $score = 1): void
    {
        $this->score += abs($score);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function points(): int
    {
        return $this->score;
    }
}