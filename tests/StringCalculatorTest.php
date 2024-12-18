<?php

use App\StringCalculator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Exception as Exception;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    #[test] public function it_evaluates_an_empty_string_to_0()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(0, $calculator->add(''));
    }

    #[test] public function it_evaluates_a_string_with_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(12, $calculator->add('3,3,3,3'));
    }

    #[test] public function it_can_handle_nextLine_between_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(7, $calculator->add("1,3\n3"));
    }

    #[test] public function it_can_throw_Exceptions_in_negative_numbers()
    {
        $calculator = new StringCalculator();

        $this->expectException(Exception::class);

        $calculator->add("1,-3\n3");
    }

    #[test] public function it_ignores_numbers_bigger_than_1000()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(4, $calculator->add("1,3,1000"));
    }

    #[test] public function it_use_a_special_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(4, $calculator->add("//?\n1?3"));
    }
}
