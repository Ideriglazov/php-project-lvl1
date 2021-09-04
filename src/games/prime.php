<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function prime(string $name): void
{
        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
        $num = mt_rand(0, 1000);
        echo "Question: " . $num . "\n";
        $answer = prompt('Your answer: ');
        $correctAnswer = primeNumber($num);
        global $result;
        $result = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswerString($result, $answer, $correctAnswer, $name);
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
