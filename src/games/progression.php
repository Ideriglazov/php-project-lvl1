<?php

namespace Brain\Games\Progression;

use function Brain\Games\Prime\primeNumber;
use function cli\line;
use function cli\prompt;

function progression(string $name): array
{
    $gameData = [];
    $gameData['task'] = "What number is missing in the progression?\n";
    $progLength = mt_rand(5, 15);
    $increment = mt_rand(0, 100);
    $element = mt_rand(0, 100);
    $progression = [];
    for (
        $x = 0; $x < $progLength;
        $x++
    ) {
        $element += $increment;
        $progression[] = $element;
    }
    $hiddenElementKey = array_rand($progression);
    $hiddenElementValue = $progression[$hiddenElementKey];
    $progression[$hiddenElementKey] = '..';
    $gameData['question'] = implode(' ', $progression);
    $progression[$hiddenElementKey] = $hiddenElementValue;
    $gameData['correctAnswer'] = $hiddenElementValue;
    return $gameData;
}

function checkCalculation(int $expressionResult, string $answer): bool
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}
