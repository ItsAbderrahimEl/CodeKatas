<?php


use App\RomanNumerical;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RomanNumericalTest extends TestCase
{
	#[DataProvider('checks')] #[test] public function test_that_it_returns_the_correct_numeral($arabic, $numeral)
	{
		$this->assertEquals($numeral, RomanNumerical::getNumerical($arabic));
	}

	#[test] public function it_cannot_generate_for_less_than_one(): void
	{
		$this->assertFalse(RomanNumerical::getNumerical(0));
	}

	#[test] public function it_cannot_generate_for_grater_than_3999(): void
	{
		$this->assertFalse(RomanNumerical::getNumerical(4000));
	}




	public static function checks(): array
	{
		return [
			[1 , 'I'],
			[2 , 'II'],
			[3 , 'III'],
			[4 , 'IV'],
			[5 , 'V'],
			[6 , 'VI'],
			[7 , 'VII'],
			[8 , 'VIII'],
			[9 , 'IX'],
			[10 , 'X'],
			[40 , 'XL'],
			[50 , 'L'],
			[90 , 'XC'],
			[100 , 'C'],
			[400 , 'CD'],
			[500 , 'D'],
			[900, 'CM'],
			[1000 , 'M'],
			[3999 , 'MMMCMXCIX'],
		];
	}
}
