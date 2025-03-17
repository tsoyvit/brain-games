<?php

namespace Hexlet\Code\Engines;

use function cli\line;
use function cli\prompt;

function runGame(string $rules, callable $generateQuestion): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);
    $rounds = 3;

    for ($i = 0; $i < $rounds; $i++) {
        $data = $generateQuestion();
        $question = $data['question'];
        $correctAnswer = $data['result'];
        $userAnswer = prompt("Question: $question");
        line("Your answer: {$userAnswer}");

        if ($userAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
