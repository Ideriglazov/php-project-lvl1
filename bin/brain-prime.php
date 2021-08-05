#!/usr/bin/env php
<?php
namespace Brain\Games\Cli;
use function cli\line;
use function cli\prompt;
use function engine\checkCalculation;
use function engine\primeNumber;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once 'src/Engine.php';
\engine\greet();
line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
for ($i=0;$i<3;$i++) {
    $num = mt_rand(0,1000);
    echo "Question: ".$num."\n";
    $answer = prompt('Your answer: ');
    $correctAnswer = primeNumber($num);
    $booleanNumber = checkCalculation($correctAnswer,$answer);
    @\engine\checkAnswer($booleanNumber,$answer,$correctAnswer,$name);
}
if ($i == 3) {
    echo "Congratulations, ".$name."!\n";
}
?>