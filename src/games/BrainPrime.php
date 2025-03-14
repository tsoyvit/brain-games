<?php

function isPrime($num): bool
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
    $res = isPrime($question);
    if ($res) {
        $result = 'yes';
    } else {
        $result = 'no';
    }

    return [
        'question' => $question,
        'result' => $result,
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        'generateQuestion' => function () {
            return generateQuestion();
        },
        'checkAnswer' => function ($result, $answer): bool {
            return $result == $answer;
        },
    ];
}
