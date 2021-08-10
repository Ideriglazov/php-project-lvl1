<?php
namespace Brain\Games\Prime;

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
function prime($name)
{
    for ($i = 0; $i < 3; $i++) {
        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
        $num = mt_rand(0, 1000);
        echo "Question: " . $num . "\n";
        $answer = prompt('Your answer: ');
        $correctAnswer = primeNumber($num);
        $booleanNumber = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswer($booleanNumber, $answer, $correctAnswer, $name);
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
    }
}
function checkCalculation($expressionResult, $answer)
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
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