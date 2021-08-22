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
        global $result;
        $result = checkCalculation($expressionResult, $answer);
        @\engine\checkAnswerString($result, $answer, $correctAnswer, $name);
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
