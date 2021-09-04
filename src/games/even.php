<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function parity(string $name): void
{
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
        $num = mt_rand();
        echo "Question: " . $num . "\n";
        $answer = prompt('Your answer: ');
        global $result;
        $result = checkParityBool($num, $answer);
        $correctAnswer = checkParityString($num);
        \engine\checkAnswerString($result, $answer, $correctAnswer, $name);
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
