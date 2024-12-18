<?php


use App\PrimeFactors;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PrimeFactorTest extends TestCase
{
	#[DataProvider('factors')] #[Test] function it_generates_prime_factor_for_1($number, $expected)
	{
		$factors = new PrimeFactors;
		$this->assertEquals($expected, $factors->getPrimeFactor($number));
	}

	public static function factors()
	{
		return [
			[1, []],
			[2, [2]],
			[3, [3]],
			[4, [2, 2]],
			[5, [5]],
			[6, [2, 3]],
			[8, [2, 2, 2]],
			[100, [2, 2, 5, 5]],
		];
	}
}
