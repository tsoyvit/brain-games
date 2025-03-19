<?php

namespace BrainGames\Games\BrainCalc;

function createRandomSign(): string
{
    $sign = ['+', '-', '*'];
    return $sign[array_rand($sign)];
}

function createRandomExample(int $num1, int $num2, string $sign): ?int
{
    return match ($sign) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => null,
    };
}

function generateQuestion(): array
{
    $num1 = mt_rand(1, 99);
    $num2 = mt_rand(1, 99);
    $sign = createRandomSign();
    $correctAnswer = createRandomExample($num1, $num2, $sign);
    return [
        'question' => "$num1 $sign $num2",
        'result' => $correctAnswer,
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'What is the result of the expression?',
        'generateQuestion' => function () {
            return generateQuestion();
        },
    ];
}
