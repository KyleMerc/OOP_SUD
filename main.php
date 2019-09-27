<?php

require_once __DIR__.'/vendor/autoload.php';

use SUD\GameList\GameManager;

$game = GameManager::chooseGame();

$game->startGame();