<?php

namespace Noblesse\Character\Misc;

require_once __DIR__.'../../../../vendor/autoload.php';

use Game\Noblesse\CharacterSetting\MainCharacterSetting as MainSet;
use Game\Noblesse\CharacterSetting\EnemyCharacterSetting as EnemySet;
use Noblesse\Character\MainCharacter;
use Noblesse\Character\EnemyCharacter;

class CharacterFactory
{
    /**
     * Creation of main character
     *
     * @param string $charName
     * @return MainCharacter|null
     */
    public static function makeMainCharacter(string $charName): ?MainCharacter
    {
        if (@constant(MainSet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING")) {
            $character = constant(MainSet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING");

            $charAddSetting = new MainCharacter($character['name'], $character['charType'], $character['weaponType']);
            $charAddSetting->damage = $character['damage'];

            return $charAddSetting;
        }
        
        echo "\nInvalid character\n";
        return NULL;
    }

    /**
     * Creation of enemy character
     *
     * @param string $charName
     * @return EnemyCharacter|null
     */
    public static function makeEnemyCharacter(string $charName): ?EnemyCharacter
    {
        if (constant(EnemySet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING")) {
            $enemy = constant(EnemySet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING");

            $enemyAddSetting = new EnemyCharacter($enemy['name'], $enemy['charType'], $enemy['weaponType']);
            $enemyAddSetting->damage = $enemy['damage'];

            if ($charName === 'boss') {
                $enemyAddSetting->health = 150;
                $enemyAddSetting->baseHealth = 150;
            } else {
                $enemyAddSetting->health = rand(40, 50);
                $enemyAddSetting->baseHealth = $enemyAddSetting->health;
            }

            return $enemyAddSetting;
        }

        echo "\nInvalid character\n";
        return NULL;
    }
}