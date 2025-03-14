<?php


namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function randomSign(): string
{
    $sign = ['+', '-', '*'];
    return $sign[array_rand($sign)];
}

function randomExample($num1, $num2, $sign): int
{
    return match ($sign) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
    };
}

line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line('What is the result of the expression?');
$correctAnswers = 0;
$rounds = 3;

for ($i = 0; $i < $rounds; $i++) {
    $num1 = mt_rand(1, 99);
    $num2 = mt_rand(1, 99);
    $sign = randomSign();
    $result = randomExample($num1, $num2, $sign);
    $example = "$num1 $sign $num2";
    $answer = prompt("Question: , $example");
    line("Your answer: {$answer}");
    if ($answer == $result) {
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
