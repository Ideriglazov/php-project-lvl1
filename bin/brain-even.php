#!/usr/bin/env php
<?php
namespace Brain\Games\Cli;
use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
line('Welcome to the Brain Games!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
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
?>
