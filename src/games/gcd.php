<?php

namespace Brain\Games\gcd;

use function cli\line;
use function cli\prompt;

function gcd(string $name): void
{
        line("Find the greatest common divisor of given numbers.\n");
        $num1 = mt_rand(0, 1000);
        $num2 = mt_rand(0, 1000);
        echo "Question: " . $num1 . ' ' . $num2 . "\n";
        $answer = prompt('Your answer: ');
        $correctAnswer = commonDivisor($num1, $num2);
        global $result;
        $result = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswerInt($result, $answer, $correctAnswer, $name);
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
