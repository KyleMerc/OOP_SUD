<?php

use PHPUnit\Framework\TestCase;
use Noblesse\Character\Misc\CharacterFactory as Char;

class CharacterTest extends TestCase
{
    /** @test */
    public function can_create_character(): void
    {
        $character = Char::makeMainCharacter('frank');
        $enemy     = Char::makeEnemyCharacter('boss');
        
        $this->assertInstanceOf(\Noblesse\Character\Character::class, $enemy);
        $this->assertInstanceOf(\Noblesse\Character\MainCharacter::class, $character);
    }

    /** @test */
    public function character_health_decreased(): void
    {
        $character = Char::makeMainCharacter('han');
        $enemy     = Char::makeEnemyCharacter('boss');

        $character->attack($enemy);
        $enemy->attack($character);

        \Noblesse\Utility\CharUtil::getStatus($character);
        \Noblesse\Utility\CharUtil::getStatus($enemy);

        $this->assertLessThan(100, $character->health);
        $this->assertLessThan(200, $enemy->health);
    }

    /**
     *  @test
     *  @doesNotPerformAssertions
    */
    public function main_character_can_grab_and_show_items(): void
    {
        $character = Char::makeMainCharacter('m21');
        $items = ['bowl', 'ramen'];

        $character->grab($items);
        $character->showInventory();
        $character->grab(['chopsticks']);
        $character->grab(['chopsticks']);
        $character->showInventory();
    }

    /** 
     * @test 
     * @doesNotPerformAssertions
     */
    public function usage_of_character_utility(): void
    {
        $opt = \Noblesse\Utility\showPickChar();
        $char = Char::makeMainCharacter($opt);
        // var_dump($char);
    }
}