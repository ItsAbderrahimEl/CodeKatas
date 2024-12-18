<?php

namespace App\GildedRose;

use PHPUnit\Event\InvalidArgumentException;

class GildedRose
{
    private static array $items = [
        'normal' => Item::class,
        'Aged Brie' => BrieItem::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstageItem::class,
        'Conjured Mana Cake' => ManaCakeItem::class
    ];

    public static function of(string $name, int $quality, int $sellIn): Item
    {
        if (!array_key_exists($name, self::$items))
            throw new InvalidArgumentException("Item $name does not exist");

        $class = self::$items[$name];

        return new $class($name, $quality, $sellIn);
    }
}