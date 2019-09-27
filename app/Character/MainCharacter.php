<?php

namespace Noblesse\Character;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use Noblesse\Character\Character;
use Noblesse\Room\Room;

use function Noblesse\Utility\returnWordDirection;

use const Noblesse\Utility\REGEX_DIRECTION;
class MainCharacter extends Character
{
    private $inventory;

    /**
     * Setting for main character
     *
     * @param string $defaultName
     * @param string $newCharType
     * @param string $newWeaponType
     */
    public function __construct(string $defaultName, string $newCharType, string $newWeaponType)
    {
        parent::__construct($defaultName, $newCharType, $newWeaponType);
    }

    /**
     * Grab action of Main character
     *
     * @param array $newItem
     * @return void
     */
    public function grab(array $newItem): void
    {
        $items = $this->inventory;

        if (empty($newItem)) {
            echo "\nThere is no item here\n";
            return;
        }

        if ($items == NULL) {
            foreach ($newItem as $item) {
                echo "\nItem acquired: '$item'";
            }
            echo "\n";

            $this->inventory = $newItem;
            return;
        }
 
        foreach ($newItem as $item) {
            if (in_array($item, $items)) {
                echo "\nYou already have this item\n";
                return;
            }

            echo "\nItem acquired: '$item' \n";
            array_push($this->inventory, $item);
        }
    }

    /**
     * Show inventory of Main character
     *
     * @return void
     */
    public function showInventory(): void
    {
        echo "\nAvailable items:\n";

        if ($this->inventory == NULL) {
            echo "No items found...\n";
            return;
        }
            
        
        foreach ($this->inventory as $item) {
            echo "* " . $item . "\n";
        }
    }

    /**
     * Get the current room to which adjacent room to be unlocked.
     *
     * @param Room $room
     * @return void
     */
    public function unlockNextRoom(Room $room): void
    {
        $isFoundLocked = $room->foundLockedRooms();

        if ($isFoundLocked !== NULL) {
            $opt = \readline("Choose room: ");

            if (\preg_match(REGEX_DIRECTION, $opt) == 0) {
                echo "\nInvalid Command...\n";
                return;
            }
            
            $foundRoom  = $room->goToNextRoom(returnWordDirection($opt));
            $lockedRoom = $room->goToNextRoom(returnWordDirection($opt))->isLocked;

            if (empty($this->inventory)) {
                echo "\nInventory is empty\n";
                return;
            }

            if (in_array('key', $this->inventory) == null && !empty($this->inventory)) {
                echo "\nYou have no key!\n";
                return;
            }

            if ($foundRoom && $lockedRoom) {
                $foundRoom->isLocked = false;
                echo "\nDoor is now open!\n";
                return;
            } elseif (! $foundRoom) {
                echo "\nRoom not found\n";
                return;
            } else {
                echo "\nDoor is not lock\n";
                return;
            }
            
        } else echo "\nNo found locked rooms..\n";
    }
}