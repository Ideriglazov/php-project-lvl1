<?php

namespace engine;

use function cli\line;
use function cli\prompt;

function greet(): void
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
    line('Welcome to the Brain Games!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}


function checkAnswer(bool $parameter, string $answer, int $correctAnswer, string $name): void
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
    if (!$parameter) {
        echo "'$answer' is wrong answer ;(. Correct answer was $correctAnswer. Let's try again, $name!\n";
    } else {
        echo "Correct!\n";
    }
}
