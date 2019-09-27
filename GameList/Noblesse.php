<?php

namespace SUD\GameList;

require_once __DIR__.'/../vendor/autoload.php';

use Noblesse\Character\Misc\CharacterFactory as CharMake;
use Noblesse\Utility\CharUtil as Char;
use Noblesse\Room\Misc\RoomFactory as Room;
use Noblesse\Utility\RoomMovement;

use function Noblesse\Utility\{showPickChar, showCommands};

class Noblesse
{
    public $mainChar;
    public $room;

    public function startGame(): void
    {
        $gameOpt = '';

        while (true) {
            $pickChar = CharMake::makeMainCharacter($opt = showPickChar());

            if ($pickChar) {
                $this->mainChar = $pickChar;
                $this->room     = new RoomMovement(Room::setUpCharRoom($opt));
                break;
            }
        }

        while ($gameOpt !== 'quit') {
            $gameOpt = $this->showGameCommands();
        }
    }

    public function showGameCommands(): ?string
    {
        echo "\nTo know which command, type [help]\n";
        $optCmd = readline("Enter a command: ");

        if ($optCmd === 'quit') {
            echo "\nGoodbye!!!\n";
            return 'quit';
        }

        switch ($optCmd) {
            case 'help':
                showCommands();
                return NULL;
            case 'status':
                Char::getStatus($this->mainChar);
                return NULL;
            case 'hint':
                echo $this->room->currentRoom;
                return NULL;
            case 'travel':
                $this->room->showRoomMenu($this->mainChar);
                return NULL;
            case 'grab':
                $this->mainChar->grab($this->room->currentRoom->items);
                return NULL;
            case 'inventory':
                $this->mainChar->showInventory();
                return NULL;
            case 'unlock':
                $this->mainChar->unlockNextRoom($this->room->currentRoom);
                return NULL;
            case 'wakeup':
                return NULL;
            default:
                echo "\nInvalid command...\n";
                return NULL;
        }
    }
}