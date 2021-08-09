<?php
namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
$autoloadPath3 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else if (file_exists($autoloadPath2)) {
    require_once $autoloadPath2;
}
else {
    require_once $autoloadPath3;
}
require_once dirname(__FILE__).'/../../src/Engine.php';
function parity($name)
{
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < 3; $i++) {
        $num = mt_rand();
        echo "Question: " . $num . "\n";
        $answer = prompt('Your answer: ');
        $parity = checkParityBool($num, $answer);
        $correctAnswer = checkParityString($num,$answer);
        @\engine\checkAnswer($parity, $answer, $correctAnswer, $name);
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
    }
}
function checkParityBool($num, $ans)
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
function checkParityString($num, $ans)
{
    if ($num % 2 > 0) {
        if ($ans == 'no') {
            return 'yes';
        } else {
            return 'no';
        }
    } else {
        if ($ans == 'yes') {
            return 'no';
        } else {
            return 'yes';
        }
    }
}