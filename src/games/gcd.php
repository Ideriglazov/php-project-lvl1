<?php

namespace Brain\Games\gcd;

use function Brain\Games\Even\checkParityString;
use function cli\line;
use function cli\prompt;

function gcd(string $name): array
{
    $num1 = mt_rand(0, 1000);
    $num2 = mt_rand(0, 1000);
    $gameData = [];
    $gameData['task'] = "Find the greatest common divisor of given numbers.\n";
    $gameData['question'] = $num1 . ' ' . $num2 . "\n";
    $gameData['correctAnswer'] = commonDivisor($num1, $num2);
    return $gameData;
}

function commonDivisor(int $num1, int $num2): int
{
    $num3 = $num2;
    while ($num3 > 0) {
        $num3 = ($num1 % $num2);
        if ($num3 == 0) {
            return $num2;
        }
        $num1 = $num2;
        $num2 = $num3;
    }
    return $num2;
}

function checkCalculation(int $expressionResult, string $answer): bool
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}
