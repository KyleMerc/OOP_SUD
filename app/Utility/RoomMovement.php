<?php

namespace Noblesse\Utility;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Character\MainCharacter;
use Noblesse\Character\Misc\CharacterFactory as CharFactory;
use Noblesse\Utility\CharUtil as Char;
use Noblesse\Room\Room;
use Noblesse\Room\FourthRoom;

use function Noblesse\Utility\returnWordDirection;

use const Noblesse\Utility\REGEX_DIRECTION;

class RoomMovement
{
    private $currentRoom;

    /**
     * Sets the room for the main character
     *
     * @param \Noblesse\Room\Room $mainChar
     */
    public function __construct(Room $newMainCharRoom)
    {
        $this->currentRoom = $newMainCharRoom;
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop))
            return $this->$prop;
        else
            echo "No property found";
    }

    /**
     * Show room menu
     *
     * @return void
     */
    public function showRoomMenu(MainCharacter $mainChar): void
    {
        $opt = '';
        $noRoomMsg = "
        -----------------
        | No Room Found |
        -----------------\n";
        $lockedRoomMsg = "
        ------------------
        | DOOR IS LOCKED |
        ------------------\n";

        while(true) {
            // Echo visual map and returns an array
            $foundRoomOpt = $this->currentRoom->foundRooms();
            $foundRoomOptDisplay = '';
            foreach ($foundRoomOpt as $key => $direction) {
                if (empty($direction)) continue;

                $oneChar = \substr($key, 0, 1);
                $foundRoomOptDisplay .= " [$oneChar]";
            }

            $opt = \readline("Where to go?{$foundRoomOptDisplay}\n or Go back [q]: ");
            //----------------------------------

            if (\preg_match(REGEX_DIRECTION, $opt) == 0) {
                echo "\nInvalid Command...\n";
                continue;
            }

            //Exit room menu
            if ($opt === 'q') return;

            //This is where the changing of room happened.
            $nextRoom = $this->currentRoom->goToNextRoom(returnWordDirection($opt));

            if ($nextRoom) {
                if ($nextRoom->isLocked) {
                    echo $lockedRoomMsg;
                    continue;
                }

                $this->currentRoom = $nextRoom;
            } else {
                echo $noRoomMsg;
                continue;
            }
            //------------------------------------

            //A chance of attack by the enemy
            if ($this->currentRoom->spawnEnemyChance() && ! ($this->currentRoom instanceof FourthRoom)) {
                echo "\n\t    An enemy is going to attack you\n";

                Char::startBattle($mainChar, CharFactory::makeEnemyCharacter('vampire'));
                return;
            }
        }
    }
}