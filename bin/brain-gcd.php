#!/usr/bin/env php
<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;
use function engine\checkCalculation;
use function engine\commonDivisor;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once 'src/Engine.php';
\engine\greet();
line("Find the greatest common divisor of given numbers.\n");
for ($i = 0; $i < 3; $i++) {
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
?>
