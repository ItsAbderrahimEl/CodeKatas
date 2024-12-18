<?php

use App\Song;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    #[test] #[DataProvider('lyricsProvider')]
    public function it_gets_the_lyrics($lyric)
    {
        $song = new Song();
        var_dump($song->get());
        $this->assertContains($lyric, $song->get());
    }

    public static function lyricsProvider(): array
    {
        return [
            ["15 bottles of beer on the wall, 15 bottles of beer."],
            ["Take one down and pass it around, 14 bottles of beer on the wall."],
            ["14 bottles of beer on the wall, 14 bottles of beer."],
            ["Take one down and pass it around, 13 bottles of beer on the wall."],
            ["13 bottles of beer on the wall, 13 bottles of beer."],
            ["Take one down and pass it around, 12 bottles of beer on the wall."],
            ["2 bottles of beer on the wall, 2 bottles of beer."],
            ["Take one down and pass it around, 1 bottle of beer on the wall."],
            ["1 bottle of beer on the wall, 1 bottle of beer."],
            ["Take one down and pass it around, no more bottles of beer on the wall."],
            ["No more bottles of beer on the wall, no more bottles of beer."],
            ["Go to the store and buy some more, 99 bottles of beer on the wall."],
        ];
    }
}

