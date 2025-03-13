<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line('Answer "yes" if the number is even, otherwise answer "no".');
$correctAnswers = 0;
$rounds = 3;
for ($i = 0; $i < $rounds; $i++) {
    $num = mt_rand(1, 99);
    $answer = prompt('Question: ', $num);
    if ($num % 2 === 0) {
        if ($answer === 'yes') {
            line("Your answer: {$answer}");
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'");
            line("Let's try again, {$name}!");
            break;
        }
    } elseif ($num % 2 != 0) {
        if ($answer === 'no') {
            line("Your answer: {$answer}");
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'");
            line("Let's try again, {$name}!");
            break;
        }
    }
}

if ($correctAnswers === $rounds) {
    line("Congratulations, {$name}!");
}
