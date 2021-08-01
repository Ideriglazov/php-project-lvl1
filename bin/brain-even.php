#!/usr/bin/env php
<?php
namespace Brain\Games\Cli;
use function engine\checkParity;
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
    $num = mt_rand();
    echo "Question: ".$num."\n";
    $answer = prompt('Your answer: ');
    $parity = checkParity($num,$answer);
    @\engine\checkAnswer($parity,$answer,$correctAnswer);
}
if ($i == 3) {
    echo "Congratulations, ".$name."!\n";
}
?>