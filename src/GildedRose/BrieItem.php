<?php

namespace App\GildedRose;

class BrieItem extends Item
{
    public function tick(): void
    {
        $this->sellIn <= 0 ? $this->quality += 2 : $this->quality += 1;

        $this->sellIn -= 1;

        $this->quality = min(50, $this->quality);
    }
}