<?php
namespace engine;
//use function Brain\Games\Cli\checkParity;
use function cli\line;
use function cli\prompt;

function greet() { //greeting function called at the start of every game
    line('Welcome to the Brain Games!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
function checkAnswer($parameter,$answer,$correctAnswer) { //function called in every game to check the given answer for correctness
        if (!$parameter) {
            echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
            die();
        }
        else {
            echo "Correct!\n";
        }

}
function checkParity($num,$ans) { //function called in brain-even game to check if the given number is even or odd
    if ($num%2 > 0) { //if the number is odd
        if ($ans == 'no') {
            return true;
        }
        else {
            global $correctAnswer;
            $correctAnswer = 'no';
            return false;
        }
    }
    else { // if the number is even
        if ($ans == 'yes') {
            return true;
        }
        else {
            global $correctAnswer;
            $correctAnswer = 'yes';
            return false;
        }
    }
}


function checkCalculation($expressionResult,$answer) { //function called in brain-calc game to check if the expression result matches the given answer
    if ($expressionResult == $answer) {
        return true;
    }
    else {
        return false;
    }
}
function mathExpression() { //function used in brain-calc game to generate a random mathematical expression
    $rand1 = rand(0, 9);
    $rand2 = rand(0, 9);
    $operator = array('*', '+', '-');
    $randoperator = $operator[rand(0, 2)];
    switch ($randoperator) {
        case "+":
            $finalvalue = $rand1 + $rand2;
            break;
        case "-":
            $finalvalue = $rand1 - $rand2;
            break;
        case "*":
            $finalvalue = $rand1 * $rand2;
            break;
    }
    $string = $rand1 . $randoperator . $rand2 . '=' . $finalvalue;

    return array($rand1,$rand2,$randoperator,$finalvalue);
}