<?php

namespace App\GildedRose;

class ManaCakeItem extends Item
{
    public function tick(): void
    {
        $this->quality -= 2;
        $this->sellIn -= 1;
        if ($this->sellIn <= 0)
            $this->quality -= 2;
        $this->quality = max(0, $this->quality);
    }
}