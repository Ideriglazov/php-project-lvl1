<?php
namespace Brain\Games\gcd;

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
function gcd($name)
{
    for ($i = 0; $i < 3; $i++) {
        line("Find the greatest common divisor of given numbers.\n");
        $num1 = mt_rand(0, 1000);
        $num2 = mt_rand(0, 1000);
        echo "Question: " . $num1 . ' ' . $num2 . "\n";
        $answer = prompt('Your answer: ');
        $correctAnswer = commonDivisor($num1, $num2);
        $booleanDivisor = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswer($booleanDivisor, $answer, $correctAnswer, $name);
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
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
function checkCalculation($expressionResult, $answer)
{
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}