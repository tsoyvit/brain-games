<?php

namespace Hexlet\Code;

use function Hexlet\Code\Engines\runGame;

function runGameFromData(callable $getGameData): void
{
    $gameData = $getGameData();
    runGame($gameData['rules'], $gameData['generateQuestion']);
}
