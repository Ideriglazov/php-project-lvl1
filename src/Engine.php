<?php

namespace engine;

use function Brain\Games\Calc\checkCalculation;
use function cli\line;
use function cli\prompt;

function greet(string $gamePath): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $i = 0;
    while ($i < 3) {
        $booleanResult = true;
        if (is_callable($gamePath)) {
            $gameData = [];
            $gameData = $gamePath($name);
            line($gameData['task']);
            line('Question: ' . $gameData['question']);
            $answer = prompt('Your answer: ');
            if ($answer == $gameData['correctAnswer']) {
                $booleanResult = true;
            } else {
                $booleanResult = false;
            }
            checkAnswerString($booleanResult, $answer, $gameData['correctAnswer'], $name);
        }
        if ($booleanResult == true) {
            $i++;
        } else {
            return;
        }
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
    }
}
function checkAnswerInt(bool $parameter, string $answer, int $correctAnswer, string $name): void
{
    if (!$parameter) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
    } else {
            echo "Correct!\n";
    }
}
function checkAnswerString(bool $booleanResult, string $answer, string $correctAnswer, string $name): void
{
    if (!$booleanResult) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
    } else {
        echo "Correct!\n";
    }
}
