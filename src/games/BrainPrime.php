<?php

namespace Hexlet\Code\Games\BrainPrime;

function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function generateQuestion(): array
{
    $question = rand(1, 200);
    return [
        'question' => $question,
        'result' => isPrime($question) ? 'yes' : 'no',
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        'generateQuestion' => function () {
            return generateQuestion();
        },
    ];
}
