<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function play(): void
{
    $brainCalc = function (): array {
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
        $arrExpression = array($rand1,$rand2,$randoperator,$finalvalue);
        $gameData = [];
        $gameData['task'] = "What is the result of the expression?";
        $arrExpression[] = ';';
        $gameData['question'] = $arrExpression[0] . ' ' . $arrExpression[2] . ' ' . $arrExpression[1] . ' = ' . "\n";
        $temp = $arrExpression[1];
        $arrExpression[1] = $arrExpression[2];
        $arrExpression[2] = $temp;
        $gameData['correctAnswer'] = $arrExpression[3];
        unset($arrExpression[3]);
        return $gameData;
    };
    \engine\greet($brainCalc);
}
