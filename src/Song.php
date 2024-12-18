<?php

namespace App;

class Song
{
    public function get(): array
    {
        $song = [];

        for ($i = 99; $i > 0; $i--) {
            $currentBottle = $this->formatBottleCount($i);
            $nextBottle = $this->formatBottleCount($i - 1);

            $song[] = "{$currentBottle} of beer on the wall, {$currentBottle} of beer.";
            $song[] = "Take one down and pass it around, {$nextBottle} of beer on the wall.";
        }

        $song[] = "No more bottles of beer on the wall, no more bottles of beer.";
        $song[] = "Go to the store and buy some more, 99 bottles of beer on the wall.";

        return $song;
    }

    private function formatBottleCount(int $count): string
    {
        if ($count > 1)
            return "{$count} bottles";

        if ($count === 1)
            return "1 bottle";

        return "no more bottles";
    }
}
