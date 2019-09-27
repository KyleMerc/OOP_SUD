<?php

namespace SUD\GameList;

require_once __DIR__.'/../vendor/autoload.php';

class GameManager
{
    public static function chooseGame(): void
    {
        echo <<<MENU
        Choose a game
        -------------
        1. Noblesse
        -------------\n
MENU;
        $opt = \readline("\tChoose a number: ");

        $gameOpt = __NAMESPACE__ . '\\' . self::returnWordGame($opt);

        var_dump(new $gameOpt());
    }

    private static function returnWordGame(string $opt): string
    {
        switch ($opt) {
            case 1: return 'Noblesse';
        }
    }
}