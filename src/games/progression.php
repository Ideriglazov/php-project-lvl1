<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression(string $name): void
{
        line("What number is missing in the progression?\n");
        $progLength = mt_rand(5, 15);
        $increment = mt_rand(0, 100);
        $element = mt_rand(0, 100);
        $progression = [];
    for ($x = 0; $x < $progLength; $x++) {
        $element += $increment;
        $progression[] = $element;
    }
        $hiddenElementKey = array_rand($progression);
        $hiddenElementValue = $progression[$hiddenElementKey];
        $progression[$hiddenElementKey] = '..';
        echo "Question: ";
    foreach ($progression as $item) {
        echo $item . ' ';
    }
        echo "\n";
        $progression[$hiddenElementKey] = $hiddenElementValue;
        $answer = prompt('Your answer: ');
        $correctAnswer = $hiddenElementValue;
        global $result;
        $result = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswerInt($result, $answer, $correctAnswer, $name);
}

function checkCalculation(int $expressionResult, string $answer): bool
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}
