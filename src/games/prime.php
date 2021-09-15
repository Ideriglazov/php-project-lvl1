<?php

namespace Brain\Games\Prime;

use function Brain\Games\gcd\commonDivisor;
use function cli\line;
use function cli\prompt;

function prime(string $name): array
{
    $num = mt_rand(0, 1000);
    $gameData = [];
    $gameData['task'] = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";
    $gameData['question'] = $num . "\n";
    $gameData['correctAnswer'] = primeNumber($num);
    return $gameData;
}

function checkCalculation(string $expressionResult, string $answer): bool
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}

function primeNumber(int $num): string
{
    $v = 1;
    for ($i = 2; $i <= $num / 2; $i++) {
        $v = $num % $i;
        if ($v == 0) {
            break;
        }
    }
    if ($v == 0 || $num == 1) {
        return 'no';
    } else {
        return 'yes';
    }
}
