<?php

namespace Hexlet\Code\Games\BrainGcd;

function gcd($a, $b): int
{
    while ($b != 0) {
        list($a, $b) = array($b, $a % $b);
    }
    return $a;
}

function generateQuestion(): array
{
    $num1 = mt_rand(1, 99);
    $num2 = mt_rand(1, 99);
    $question = "$num1 $num2";
    $result = gcd($num1, $num2);
    return [
        'question' => $question,
        'result' => $result,
    ];
}

function getData(): array
{
    return [
        'rules' => 'Find the greatest common divisor of given numbers.',
        'generateQuestion' => function () {
            return generateQuestion();
        },
        'checkAnswer' => function ($result, $answer): bool {
            return $result == $answer;
        },
    ];
}
