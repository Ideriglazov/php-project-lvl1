#!/usr/bin/env php
<?php
namespace Brain\Games\Cli;
use function engine\checkCalculation;
use function engine\mathExpression;
use function cli\line;
use function cli\prompt;
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once 'src/Engine.php';
\engine\greet();
for ($i=0;$i<3;$i++) {
    line("What is the result of the expression?\n");
    $arrExpression = \engine\mathExpression();
    $arrExpression[] = ';';
    //array_unshift($arrExpression,'return ');
    echo "Question: ".$arrExpression[0].' '.$arrExpression[2].' '.$arrExpression[1].' = '."\n";
    $temp = $arrExpression[1];
    $arrExpression[1] = $arrExpression[2];
    $arrExpression[2] = $temp;
    $correctAnswer = $arrExpression[3];
    unset($arrExpression[3]);
    $expression = implode($arrExpression);
    $expressionResult = eval("return $expression;");
    $answer = prompt('Your answer: ');
    $result = checkCalculation($expressionResult,$answer);
    @\engine\checkAnswer($result,$answer,$correctAnswer);
}
if ($i == 3) {
    echo "Congratulations, ".$name."!\n";
}
?>