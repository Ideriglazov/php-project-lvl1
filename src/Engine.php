<?php

namespace engine;

use function cli\line;
use function cli\prompt;

function greet(string $gamePath): void
{
    line('Welcome to the Brain Games!');
    global $name;
    global $result;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $i = 0;
    while ($i < 3) {
        if (is_callable($gamePath)) {
            $gamePath($name);
        }
        if ($result > 0) {
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
function checkAnswerString(bool $parameter, string $answer, string $correctAnswer, string $name): void
{
    if (!$parameter) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
    } else {
        echo "Correct!\n";
    }
}
