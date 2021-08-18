<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function brainCalc(string $name): void
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
        line("What is the result of the expression?\n");
        $arrExpression = mathExpression();
        $arrExpression[] = ';';
        echo "Question: " . $arrExpression[0] . ' ' . $arrExpression[2] . ' ' . $arrExpression[1] . ' = ' . "\n";
        $temp = $arrExpression[1];
        $arrExpression[1] = $arrExpression[2];
        $arrExpression[2] = $temp;
        $correctAnswer = $arrExpression[3];
        unset($arrExpression[3]);
        $expression = implode($arrExpression);
        $expressionResult = eval("return $expression;");
        $answer = prompt('Your answer: ');
        $result = checkCalculation($expressionResult, $answer);
        @\engine\checkAnswerInt($result, $answer, $correctAnswer, $name);
        if ($result > 0) {
            $i++;
        } else {
            die();
        }
    }
    if ($i == 3) {
        echo "Congratulations, " . $name . "!\n";
    }
}

function mathExpression(): array
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
    $rand1 = rand(0, 9);
    $rand2 = rand(0, 9);
    $operator = array('*', '+', '-');
    $randoperator = $operator[rand(0, 2)];
    $finalvalue = null;
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

function checkCalculation(int $expressionResult, int $answer): bool
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
