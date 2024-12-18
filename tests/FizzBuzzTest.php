<?php

use App\FizzBuzz;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    #[test] #[DataProvider('numbers')]
    public function it_can_FizzBuzz($number, $result)
    {
        $multiple = new FizzBuzz();

        $this->assertEquals($result, $multiple->for($number));
    }

    public static function numbers(): array
    {
        return [
            [3, 'Fizz'],
            [9, 'Fizz'],
            [5, 'Buzz'],
            [10, 'Buzz'],
            [15, 'FizzBuzz']
        ];
    }
}
