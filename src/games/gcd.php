<?php

namespace Brain\Games\gcd;

use function cli\line;
use function cli\prompt;

function gcd(string $name): void
{
    $autoloadPath1 = __DIR__ . '/../../../autoload.php';
    $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
    $autoloadPath3 = __DIR__ . '/../../vendor/autoload.php';
    if (file_exists($autoloadPath1)) {
        require_once $autoloadPath1;
    } elseif (file_exists($autoloadPath2)) {
        require_once $autoloadPath2;
    } else {
        require_once $autoloadPath3;
    }
    require_once dirname(__FILE__) . '/../../src/Engine.php';
    $i = 0;
    while ($i < 3) {
        line("Find the greatest common divisor of given numbers.\n");
        $num1 = mt_rand(0, 1000);
        $num2 = mt_rand(0, 1000);
        echo "Question: " . $num1 . ' ' . $num2 . "\n";
        $answer = prompt('Your answer: ');
        $correctAnswer = commonDivisor($num1, $num2);
        $booleanDivisor = checkCalculation($correctAnswer, $answer);
        @\engine\checkAnswer($booleanDivisor, $answer, $correctAnswer, $name);
        if ($booleanDivisor) {
            $i++;
        } else {
            die();
        }
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
    }
}

function commonDivisor(int $num1, int $num2): int
{
    $autoloadPath1 = __DIR__ . '/../../../autoload.php';
    $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
    $autoloadPath3 = __DIR__ . '/../../vendor/autoload.php';
    if (file_exists($autoloadPath1)) {
        require_once $autoloadPath1;
    } elseif (file_exists($autoloadPath2)) {
        require_once $autoloadPath2;
    } else {
        require_once $autoloadPath3;
    }
    require_once dirname(__FILE__) . '/../../src/Engine.php';
    $num3 = $num2;
    while ($num3 > 0) {
        $num3 = ($num1 % $num2);
        if ($num3 == 0) {
            return $num2;
        }
        $num1 = $num2;
        $num2 = $num3;
    }
    return $num2;
}

function checkCalculation(int $expressionResult, string $answer): bool
{
    $autoloadPath1 = __DIR__ . '/../../../autoload.php';
    $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
    $autoloadPath3 = __DIR__ . '/../../vendor/autoload.php';
    if (file_exists($autoloadPath1)) {
        require_once $autoloadPath1;
    } elseif (file_exists($autoloadPath2)) {
        require_once $autoloadPath2;
    } else {
        require_once $autoloadPath3;
    }
    require_once dirname(__FILE__) . '/../../src/Engine.php';
    if ($expressionResult == $answer) {
        return true;
    } else {
        return false;
    }
}
