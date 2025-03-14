<?php

namespace Hexlet\Code\Games\BrainProgression;

function randomArray(): array
{
    $start = mt_rand(0, 50);
    $step = mt_rand(1, 9);
    $a = [];
    for ($i = $start; count($a) < 10; $i += $step) {
        $a[] = $i;
    }
    return $a;
}

function generateQuestion(): array
{
    $data = randomArray();
    $key = mt_rand(0, 9);
    $replacements = array($key => "..");
    $newData = array_replace($data, $replacements);
    $str = implode(' ', $newData);
    $question = $str;
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
        'checkAnswer' => function ($result, $answer): bool {
            return $result == $answer;
        },
    ];
}
