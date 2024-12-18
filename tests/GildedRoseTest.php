<?php

use App\GildedRose\GildedRose;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    #[Test] #[DataProvider('items')]
    public function it_can_test_GildedRose($quality, $sellIn, $name, $qualityResult, $sellInResult): void
    {
        $item = GildedRose::of($name, $quality, $sellIn);

        $item->tick();

        $this->assertEquals($qualityResult, $item->quality);
        $this->assertEquals($sellInResult, $item->sellIn);
    }

    public static function items(): array
    {
        $conjured = 'Conjured Mana Cake';
        $backstage = 'Backstage passes to a TAFKAL80ETC concert';
        $normal = 'normal';
        $brie = 'Aged Brie';

        $brieItems = [
            [10, 5, $brie, 11, 4],
            [50, 5, $brie, 50, 4],
            [10, 0, $brie, 12, -1],
            [49, 0, $brie, 50, -1],
            [50, 0, $brie, 50, -1],
            [10, -10, $brie, 12, -11],
            [50, -10, $brie, 50, -11]
        ];
        $normalItems = [
            [10, 5, $normal, 9, 4],
            [10, 0, $normal, 8, -1],
            [10, -5, $normal, 8, -6],
            [0, 5, $normal, 0, 4]
        ];
        $backstageItems = [
            [10, -1, $backstage, 0, -2],
            [10, 0, $backstage, 0, -1],
            [50, 1, $backstage, 50, 0],
            [10, 1, $backstage, 13, 0],
            [50, 5, $backstage, 50, 4],
            [10, 5, $backstage, 13, 4],
            [50, 10, $backstage, 50, 9],
            [10, 10, $backstage, 12, 9]
        ];
        $manaCakeItems = [
            [0, -10, $conjured, 0, -11],
            [10, -10, $conjured, 6, -11],
            [0, 0, $conjured, 0, -1],
            [10, 0, $conjured, 6, -1],
            [0, 10, $conjured, 0, 9],
            [10, 10, $conjured, 8, 9]
        ];

        return array_merge(
            $backstageItems,
            $normalItems,
            $manaCakeItems,
            $brieItems
        );
    }
}