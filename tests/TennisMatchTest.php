<?php

use App\Tennis\TennisMatch;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase

{
    public function setUp(): void
    {
        $this->match = new TennisMatch('Innas', 'Iman');
    }

    #[test] #[DataProvider('scores')]
    public function it_can_score_a_tennis_match($playerOnePoints, $playerTwoPoints, $result)
    {
        for ($i = 0; $i < $playerOnePoints; $i++) {
            $this->match->player1->score();
        }
        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $this->match->player2->score();
        }

        $this->assertEquals($result, $this->match->matchState());
    }

    public static function scores(): array
    {
        return [
            [3, 6, 'Iman'],
            [6, 3, 'Innas'],
            [3, 3, 'Deuced'],
            [3, 4, 'Advantage'],
            [2, 2, 'love'],
            [3, 2, 'fifteen'],
            [0, 2, 'thirty'],
            [0, 3, 'forty'],
        ];
    }
}
