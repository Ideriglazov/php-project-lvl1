<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function play(): void
{
    $brainPrime = function (): array {
        $num = mt_rand(0, 1000);
        $gameData = [];
        $gameData['task'] = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";
        $gameData['question'] = $num . "\n";
        $v = 1;
        for ($i = 2; $i <= $num / 2; $i++) {
            $v = $num % $i;
            if ($v == 0) {
                break;
            }
        }
        if ($v == 0 || $num == 1) {
            $gameData['correctAnswer'] = 'no';
        } else {
            $gameData['correctAnswer'] = 'yes';
        }
        return $gameData;
    };
    \engine\greet($brainPrime);
}
