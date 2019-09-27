<?php

namespace Noblesse\Room\Misc;

require_once __DIR__.'../../../../vendor/autoload.php';

use Game\Noblesse\RoomSetting as Setting;
use Noblesse\Room\Room;
use Noblesse\Room\FourthRoom;

class RoomFactory
{

    /**
     * Returns the corresponding of the main character
     *
     * @param string $charName
     * @return Room|null
     */
    public static function setUpCharRoom(string $charName): ?Room
    {
        $charRoom = Setting::ROOM_NAMESPACE . strtoupper($charName) . "_ROOM_SETTING";

        if (@constant($charRoom)) {
            $roomSetUp = constant($charRoom);

            //Creation of Room 1 - 4
            for ($i = 1; $i <= 4; $i++) {
                $room = 'room' . $i;

                if ($i === 4) {
                    $$room = new FourthRoom($roomSetUp[$room]['name'], $roomSetUp[$room]['isLocked']);
                    continue;
                }

                $$room = new Room($roomSetUp[$room]['name'], $roomSetUp[$room]['isLocked']);

                $$room->hint     = $roomSetUp[$room]['hint'];
                $$room->items    = $roomSetUp[$room]['items'];
                $$room->dialogue = $roomSetUp[$room]['dialogue'];
            }

            //Thinking of another solution for this
            switch ($charName) {
                case 'frank':
                    $room1->attachRoom('east', $room2);
                    $room1->attachRoom('south', $room3);
                    $room1->attachRoom('west', $room4);
                    break;
                case 'muzaka':
                    $room1->attachRoom('east', $room3);
                    $room1->attachRoom('west', $room2);
            
                    $room4->attachRoom('north', $room3);
                    break;
                case 'han':
                    $room1->attachRoom('east', $room2);
                    $room1->attachRoom('south', $room4);
            
                    $room3->attachRoom('west', $room2);
                    break;
                case 'm21':
                    $room2->attachRoom('north', $room4);
                    $room2->attachRoom('west', $room1);
                    $room2->attachRoom('south', $room3);
                    break;
            }

            return $room1;
        }

        echo "Invalid option";
        return NULL;
    }
}