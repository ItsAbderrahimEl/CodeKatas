<?php

namespace App\GildedRose;

class BackstageItem extends Item
{
    public function tick(): void
    {
        $this->quality += ($this->sellIn <= 5)
            ? 3
            : (($this->sellIn <= 10) ? 2 : 1);

        $this->quality = ($this->sellIn <= 0)
            ? 0
            : min(50, $this->quality);

        $this->sellIn -= 1;
    }
}