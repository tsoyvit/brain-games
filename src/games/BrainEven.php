<?php

namespace Hexlet\Code\Games\BrainEven;

function generateQuestion(): array
{
    $num = mt_rand(1, 99);
    $question = $num;
    if ($num % 2 === 0) {
        return [
            "question" => $question,
            "result" => 'yes'
        ];
    } else {
        return [
            "question" => $question,
            "result" => 'no'
        ];
    }
}

function getData(): array
{
    return [
        'rules' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'generateQuestion' => function () {
            return generateQuestion();
        },
        'checkAnswer' => function ($result, $answer): bool {
            return $result == $answer;
        },
    ];
}
