<?php

namespace Hexlet\Code\Games\BrainCalc;

function randomSign(): string
{
    $sign = ['+', '-', '*'];
    return $sign[array_rand($sign)];
}

function randomExample($num1, $num2, $sign): int
{
    return match ($sign) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        default => $num1 * $num2,
    };
}

function generateQuestion(): array
{
    $num1 = mt_rand(1, 99);
    $num2 = mt_rand(1, 99);
    $sign = randomSign();
    $question = "$num1 $sign $num2";
    $result = randomExample($num1, $num2, $sign);
    return [
        'question' => $question,
        'result' => $result,
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'What is the result of the expression?',
        'generateQuestion' => function () {
            return generateQuestion();
        },
        'checkAnswer' => function ($result, $answer): bool {
            return $result == $answer;
        },
    ];
}
