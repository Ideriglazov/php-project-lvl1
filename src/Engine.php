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


function commonDivisor($num1, $num2)
{
    $num3 = $num2;
    while ($num3 > 0) {
        $num3 = ($num1 % $num2);
        if ($num3 == 0) {
            return $num2;
        }
        $num1 = $num2;
        $num2 = $num3;
    }
    return null;
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
