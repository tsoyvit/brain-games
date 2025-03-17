<?php

namespace Hexlet\Code\Games\BrainEven;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
function generateQuestion(): array
{
    $num = mt_rand(1, 99);
    return [
        'question' => $num,
        'result' => isEven($num) ? 'yes' : 'no',
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'generateQuestion' => function () {
            return generateQuestion();
        },
    ];
}
