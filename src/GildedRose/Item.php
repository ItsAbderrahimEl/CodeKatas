<?php

namespace App\GildedRose;

class Item
{
    public function __construct(
        public string $name,
        public string $quality,
        public string $sellIn
    ) {}

    public function tick(): void {
        $this->sellIn <= 0 ? $this->quality -= 2 : $this->quality -= 1;

        $this->quality = max(0, $this->quality);

        $this->sellIn -= 1;
    }
}