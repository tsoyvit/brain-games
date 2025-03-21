<?php

namespace BrainGames\Games\BrainProgression;

function createProgression(): array
{
    $start = mt_rand(0, 50);
    $step = mt_rand(1, 9);
    $length = mt_rand(5, 10);
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}

function generateQuestion(): array
{
    $data = createProgression();
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
