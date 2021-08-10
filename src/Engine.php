<?php

namespace engine;

use function cli\line;
use function cli\prompt;

function greet() //greeting function called at the start of every game
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


function primeNumber($num)
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
