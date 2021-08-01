<?php
namespace engine;
//use function Brain\Games\Cli\checkParity;
use function cli\line;
use function cli\prompt;

function greet() {
    line('Welcome to the Brain Games!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
}
function checkAnswer($parameter,$answer,$correctAnswer) {
        if (!$parameter) {
            echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
            die();
        }
        else {
            echo "Correct!\n";
        }

}
function checkParity($num,$ans) {
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

/*
for ($i = 0;$i < 3;$i++) {
    $num = mt_rand();
    echo "Question: ".$num."\n";
    $answer = prompt('Your answer: ');
    if (checkParity($num,$answer)==false) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
        break;
    }
    else {
        echo "Correct!\n";
    }
}
if ($i == 3) {
    echo "Congratulations, ".$name."!\n";
}
*/