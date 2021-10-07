<?php

namespace engine;

use function cli\line;
use function cli\prompt;

function greet(object $gameName): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $i = 0;
    while ($i < 3) {
        $booleanResult = true;
        if (is_callable($gameName)) {
            $gameData = $gameName();
            line($gameData['task']);
            line('Question: ' . $gameData['question']);
            $answer = prompt('Your answer: ');
            if ($answer == $gameData['correctAnswer']) {
                $booleanResult = true;
            } else {
                $booleanResult = false;
            }
            $correctAnswer = $gameData['correctAnswer'];
            if (!$booleanResult) {
                echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
            } else {
                echo "Correct!\n";
            }
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
