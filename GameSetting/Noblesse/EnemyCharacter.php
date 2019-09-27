<?php

namespace GameSetting\Noblesse;

interface EnemyCharacter
{
    const CHAR_NAMESPACE = __CLASS__ . "::";

    const VAMPIRE_SETTING = [
        'name'          => 'Nameless',
        'charType'      => 'Vampire',
        'weaponType'    => 'Sharp Claws',
        'damage'        => [1, 10]
    ];

    const BOSS_SETTING = [
        'name'          => 'Raizel',
        'charType'      => 'Vampire Noble',
        'weaponType'    => 'Blood Magic',
        'damage'        => [30, 50],
    ];
}