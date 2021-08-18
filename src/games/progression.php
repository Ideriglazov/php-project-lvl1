<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression(string $name): void
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
        line("What number is missing in the progression?\n");
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
        @\engine\checkAnswerString($booleanDivisor, $answer, $correctAnswer, $name);
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
