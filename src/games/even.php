<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function play(): void
{
    $brainEven = function (): array {
        $num = mt_rand();
        $gameData = [];
        $gameData['task'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
        $gameData['question'] = $num . "\n";
        if ($num % 2 > 0) {
            $gameData['correctAnswer'] = 'no';
        } else {
            $gameData['correctAnswer'] = 'yes';
        }
        return $gameData;
    };
    \engine\greet($brainEven);
}
