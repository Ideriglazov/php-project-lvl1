<?php

namespace Brain\Games\gcd;

use function cli\line;
use function cli\prompt;

function play(): void
{
    $brainGCD = function (): array {
        $num1 = mt_rand(0, 1000);
        $num2 = mt_rand(0, 1000);
        $gameData = [];
        $gameData['task'] = "Find the greatest common divisor of given numbers.\n";
        $gameData['question'] = $num1 . ' ' . $num2 . "\n";
        $num3 = $num2;
        while ($num3 > 0) {
            $num3 = ($num1 % $num2);
            if ($num3 == 0) {
                $gameData['correctAnswer'] = $num2;
            } else {
                $num1 = $num2;
                $num2 = $num3;
                $gameData['correctAnswer'] = $num2;
            }
        }
        return $gameData;
    };
    \engine\greet($brainGCD);
}
