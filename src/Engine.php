<?php

namespace engine;

use function cli\line;
use function cli\prompt;

function greet()
{
    line('Welcome to the Brain Games!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
function checkAnswer($parameter, $answer, $correctAnswer, $name)
{
    if (!$parameter) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
            die();
    } else {
            echo "Correct!\n";
    }
}
