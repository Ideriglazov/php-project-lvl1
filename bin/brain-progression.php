#!/usr/bin/env php
<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;
use function engine\checkCalculation;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once 'src/Engine.php';
\engine\greet();
line("What number is missing in the progression?\n");
for ($i = 0; $i < 3; $i++) {
    $progLength = mt_rand(5, 15);
    $increment = mt_rand(0, 100);
    $element = mt_rand(0, 100);
    $progression = [];
    for ($x = 0; $x < $progLength; $x++) {
        $element += $increment;
        $progression[] = $element;
    }
    $hiddenElementKey = array_rand($progression);
    $hiddenElementValue = $progression[$hiddenElementKey];
    $progression[$hiddenElementKey] = '..';
    echo "Question: ";
    foreach ($progression as $item) {
        echo $item . ' ';
    }
    echo "\n";
    $progression[$hiddenElementKey] = $hiddenElementValue;
    $answer = prompt('Your answer: ');
    $correctAnswer = $hiddenElementValue;
    $booleanDivisor = checkCalculation($correctAnswer, $answer);
    @\engine\checkAnswer($booleanDivisor, $answer, $correctAnswer, $name);
}
if ($i == 3) {
    echo "Congratulations, " . $name . "!\n";
}
?>

