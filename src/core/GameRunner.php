<?php

namespace Hexlet\Code\Core\GameRunner;

use function Hexlet\Code\Core\Engine\runGame;

function runGameFromData(callable $getGameData): void
{
    $gameData = $getGameData();
    runGame($gameData['rules'], $gameData['generateQuestion']);
}
