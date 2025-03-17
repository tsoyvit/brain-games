<?php

namespace Hexlet\Code\Games\BrainProgression;

function createRandomArray(): array
{
    $start = mt_rand(0, 50);
    $step = mt_rand(1, 9);
    $length = mt_rand(5, 10);
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = $start + $i * $step;
    }

    return $array;
}

function generateQuestion(): array
{
    $data = createRandomArray();
    $key = mt_rand(0, count($data) - 1);
    $replacements = [$key => ".."];
    $newData = array_replace($data, $replacements);
    $question = implode(' ', $newData);
    $result = $data[$key];

    return [
        'question' => $question,
        'result' => $result,
    ];
}

function getGameData(): array
{
    return [
        'rules' => 'What number is missing in the progression?',
        'generateQuestion' => function () {
            return generateQuestion();
        },
    ];
}
