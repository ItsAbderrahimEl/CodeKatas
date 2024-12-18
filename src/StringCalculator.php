<?php

namespace App;

use PHPUnit\Framework\Exception;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    const MAX_NUMBER = 1000;
    protected string $REGEX = '/ ?[,\n] ?/';
    const MIN_NUMBER = 0;
    const GET_DELIMITER = '/\/\/(.)(?=\n)/';

    public function add($string)
    {
        $somme = 0;
        $this->addSpecialDelimiter($string);
        $numbers = $this->getNumbers($string);

        foreach ($numbers as $number) {
            $this->manageNegativeNumber($number);
            $this->manageBigNumber($number);

            $somme += $number;
        }

        return $somme;
    }

    protected function getNumbers($string): array
    {
        return array_map(fn($str) => (int)trim($str), preg_split($this->REGEX, $string));
    }

    protected function manageBigNumber(&$number): void
    {
        if ($number >= self::MAX_NUMBER)
            $number = 0;
    }

    protected function manageNegativeNumber(&$number): void
    {
        if ($number < self::MIN_NUMBER)
            throw new Exception('Negative numbers not allowed');
    }

    protected function addSpecialDelimiter(string &$string): void
    {
        $delimiter = '';
        if (preg_match(self::GET_DELIMITER, $string, $delimiter)) {
            $this->REGEX = '/ ?[,|' . $delimiter[1] . '\n] ?/';
            $string = str_replace('//' . $delimiter[1] . "\n", '', $string);
        }
    }
}