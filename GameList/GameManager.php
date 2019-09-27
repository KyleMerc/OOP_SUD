<?php

namespace SUD\GameList;

require_once __DIR__.'/../vendor/autoload.php';

class GameManager
{
    /**
     * Show choose game menu
     *
     * @return \SUD\GameList\GameStart|null
     */
    public static function chooseGame(): ?\SUD\GameList\GameStart
    {
        while (true) {
    echo <<<MENU
    Choose a game
    -------------
    1. Noblesse
    -------------\n
MENU;
            $opt = \readline("Choose a number: ");        
            if(! self::returnWordGame($opt)) {
                echo "\nGame not found\n\n";
                continue;
            } 
            break;
        }
        

        $gameOpt = __NAMESPACE__ . '\\' . self::returnWordGame($opt);
        system('clear');

        $gameFound = new $gameOpt();
        return $gameFound;
    }

    /**
     * Return the word of the game
     *
     * @param string $opt
     * @return string|null
     */
    private static function returnWordGame(string $opt): ?string
    {
        switch ($opt) {
            case 1: return 'Noblesse';
            default: return NULL;
        }
    }
}

