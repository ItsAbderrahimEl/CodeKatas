<?php

namespace App;

class PrimeFactors
{
	public function getPrimeFactor($number): array
	{
		$factors = [];

		for ($divisor = 2; $number > 1; $divisor++)
		{
			for (; $number % $divisor === 0; $number /= $divisor)
			{				$factors[] = $divisor;
			}
		}
		return $factors;
	}

}