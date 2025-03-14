<?php

namespace Hexlet\Code;

use function cli\line;
use function cli\prompt;

function runGame($rules, $generateQuestion, $checkAnswer): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);
    $correctAnswers = 0;
    $rounds = 3;

    for ($i = 0; $i < $rounds; $i++) {
        $data = $generateQuestion();
        $question = $data['question'];
        $result = $data['result'];
        $answer = prompt("Question: $question");
        line("Your answer: {$answer}");
        if ($checkAnswer($result, $answer)) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '$result'.");
            line("Let's try again, {$name}!");
            break;
        }
    }

    if ($correctAnswers === $rounds) {
        line("Congratulations, {$name}!");
    }
}
