<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function parity(string $name): array
{
    $num = mt_rand();
    $gameData = [];
    $gameData['task'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
    $gameData['question'] = $num . "\n";
    $gameData['correctAnswer'] = checkParityString($num);
    return $gameData;
}

function checkParityBool(int $num, string $ans): bool
{
    if ($num % 2 > 0) {
        if ($ans == 'no') {
            return true;
        } else {
            global $correctAnswer;
            $correctAnswer = 'no';
            return false;
        }
    } else {
        if ($ans == 'yes') {
            return true;
        } else {
            global $correctAnswer;
            $correctAnswer = 'yes';
            return false;
        }
    }
}

function checkParityString(int $num): string
{
    if ($num % 2 > 0) {
            return 'no';
    } else {
        return 'yes';
    }
}
