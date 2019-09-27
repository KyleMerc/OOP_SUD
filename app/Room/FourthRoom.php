<?php

namespace Noblesse\Room;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Character\MainCharacter;
use Noblesse\Character\Misc\CharacterFactory;
use Noblesse\Room\Room;
use Noblesse\Utility\CharUtil;

/**
 * This is where the Noblesse resides.
 */
class FourthRoom extends Room
{
    public function __construct(string $newName, bool $isDoorLocked = false)
    {
        parent::__construct($newName, $isDoorLocked);
    }

    public function wakeUpNoblesse(MainCharacter $mainChar): void
    {
        $importantItems = ['ramen', 'teapot', 'coffeemug', 'chopsticks', 'bowl'];
        $itemCheck     = 0;

        if (! empty($mainChar->inventory)) {
            foreach ($mainChar->inventory as $item) {
                if (in_array($item, $importantItems)) $itemCheck += 25;
            }
        } else echo "\nYour inventory is empty\n";

        if ($itemCheck != 100) {
            echo "\nYou have given him the missing piece for the ramen\n";
            echo "Now you face to him!\n\n";
            sleep(1);
            $fightStatus = CharUtil::startBattle($mainChar, CharacterFactory::makeEnemyCharacter('boss'));
            
            if ($fightStatus === 'game over') {
                echo "\n........GAME OVER........\n\n";
                die;
            }

            return;
        }
        
        echo "You have given him the best ramen :D\n You have completed the game.\n\n";
        die;
    }
}