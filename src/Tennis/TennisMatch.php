<?php

namespace App\Tennis;

class TennisMatch
{
    public Player $player1;
    public Player $player2;

    public function __construct(string $player1, string $player2)
    {
        $this->player1 = new Player($player1);
        $this->player2 = new Player($player2);
    }

    public function matchState(): string
    {
        if ($this->isAdvantage()) {
            return 'Advantage';
        } elseif ($this->isDeuced()) {
            return 'Deuced';
        } else {
            return $this->getWinner();
        }
    }

    protected function differences(): int
    {
        return $this->player1->points() - $this->player2->points();
    }

    protected function isAdvantage(): bool
    {
        return $this->hasOnePointOfDifference() && $this->bothScoredAtLeastThree();
    }

    protected function isDeuced(): bool
    {
        return $this->theyHaveSameScore() && $this->bothScoredAtLeastThree();
    }

    protected function bothScoredAtLeastThree(): bool
    {
        return ($this->player1->points() >= 3 && $this->player2->points() >= 3);
    }

    protected function hasOnePointOfDifference(): bool
    {
        $difference = $this->differences();
        return (($difference === 1) || ($difference === -1));
    }

    protected function getWinner(): string
    {
        if ($name = $this->isAWinner($this->player1)) {
            return $name;
        }
        if ($name = $this->isAWinner($this->player2)) {
            return $name;
        }

        return $this->pointsToTerminate(abs($this->differences()));
    }

    protected function theyHaveSameScore(): bool
    {
        return $this->player1->points() === $this->player2->points();
    }

    protected function pointsToTerminate($points): string|null
    {
        return match ($points) {
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty',
            default => null,
        };
    }

    protected function isAWinner($player): string|null
    {
        $difference = $this->differences();

        if (($difference >= 2 || $difference <= -2) && $player->points() >= 4) {
            return $player->name();
        }

        return null;
    }
}