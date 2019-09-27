<?php

use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    /** @test */
    public function can_create_room(): void
    {
        $room1 = new \Noblesse\Room\Room('Upper Main Hall', false);
        $room2 = new \Noblesse\Room\Room('Balcony', false);
        $room3 = new \Noblesse\Room\Room('Kitchen', false);
        $room4 = new \Noblesse\Room\Room('Bedroom', false);

        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room1);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room2);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room3);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room4);

        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room1);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room2);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room3);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room4);
    }

    /** @test */
    public function is_room_door_locked(): void
    {
        $room1 = new \Noblesse\Room\Room('Upper Main Hall', false);
        $room2 = new \Noblesse\Room\Room('Balcony', false);
        $room3 = new \Noblesse\Room\Room('Kitchen', true);
        $room4 = new \Noblesse\Room\Room('Bedroom', true);

        $this->assertFalse($room1->isLocked);
        $this->assertFalse($room2->isLocked);
        $this->assertTrue($room3->isLocked);
        $this->assertTrue($room4->isLocked);
    }

    /** @test */
    public function room_is_connected_to_another_room(): void
    {
        $room1 = new \Noblesse\Room\Room('Upper Main Hall', false);
        $room2 = new \Noblesse\Room\Room('Balcony', false);
        $room3 = new \Noblesse\Room\Room('Kitchen', false);
        $room4 = new \Noblesse\Room\Room('Bedroom', false);

        $room1->attachRoom('east', $room2);
        $room1->attachRoom('south', $room3);
        $room1->attachRoom('west', $room4);

        $this->assertNull($room1->north);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room1->east);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room1->south);
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room1->west);

        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room2->west);

        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room3->north);

        $this->assertIsString($room1->south->name);
        $this->assertIsString($room2->west->name);
        $this->assertIsString($room3->north->name);
    }

    /** 
     * @test 
     * @doesNotPerformAssertions
    */
    public function get_enemy_spawn_chance(): void
    {
        $room1 = new \Noblesse\Room\Room('Upper Main Hall', false);
    
        var_dump($room1->spawnEnemyChance());
    }

    /** @test */
    public function set_the_rooms_for_main_character(): void
    {
        $room = new \Noblesse\Utility\RoomMovement(\Noblesse\Room\Misc\RoomFactory::setUpCharRoom('frank'));
        
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room->currentRoom->goToNextRoom('east'));
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room->currentRoom->goToNextRoom('south'));
        $this->assertInstanceOf(\Noblesse\Room\Room::class, $room->currentRoom->goToNextRoom('west'));
    }

    /** @test */
    public function found_locked_rooms(): void
    {
        $room = new \Noblesse\Utility\RoomMovement(\Noblesse\Room\Misc\RoomFactory::setUpCharRoom('frank'));
        
        $result = $room->currentRoom->foundLockedRooms();

        $this->assertIsString($result);
    }

    /** 
     * @test 
     * @doesNotPerformAssertions
    */
    public function available_rooms_from_the_current_room(): void
    {
        $room = new \Noblesse\Utility\RoomMovement(\Noblesse\Room\Misc\RoomFactory::setUpCharRoom('m21'));

        $room->currentRoom->foundRooms();
    }

    /** 
     * @test
     * @doesNotPerformAssertions
    */
    public function show_room_menu_options_and_enemy_chance_ambush_on_next_room(): void
    {
        $room = new \Noblesse\Utility\RoomMovement(\Noblesse\Room\Misc\RoomFactory::setUpCharRoom('han'));
        
        $room->showRoomMenu(\Noblesse\Character\Misc\CharacterFactory::makeMainCharacter('han'));
    }
}