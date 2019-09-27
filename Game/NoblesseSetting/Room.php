<?php

namespace Game\NoblesseSetting;

interface Room
{
    const ROOM_NAMESPACE = __CLASS__ . "::";

    const FRANK_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Upper Main Floor',
            'isLocked'  => false,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThe lower room is sealed I need to find another way around here.\n",
            'hint'      => "There is a golden chopstick hanged on
             on the wall with a frame. You can grab
             that item. Type [grab] command."
        ],
        'room2' => [
            'name'      => 'Kitchen',
            'isLocked'  => false,
            'items'     => ['coffeemug', 'ramen'],
            'dialogue'  => "\tHmmm, weird why is this place so clean and almost like someone prepared some food.\n",
            'hint'      => "You really need a hotwater for obvious
             reasons. There is a packed of ramen 
             noodle inside the drawer. You can 
             grab the 2 items. Type [grab] command."
        ],
        'room3' => [
            'name'      => 'Bedroom',
            'isLocked'  => false,
            'items'     => ['bowl'],
            'dialogue'  => "\tGot to find a clue around here somewhere.\n",
            'hint'      => "A dusty bowl is on the table. 
             It needs to be washed. Get the item.           
             Type [grab] command."
        ],
        'room4' => [
            'name'      => 'Balcony',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tWhy he is so familiar to me...\n",
            'hint'      => "Give him a nice warm 
             ramen noodles. If something 
             is missing. Goodluck"
        ]
    ];

    const MUZAKA_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Basement',
            'isLocked'  => false,
            'items'     => ['chopsticks', 'ramen'],
            'dialogue'  => "\tGot to find that guy. Wait why is there so many ramen packs here?\n",
            'hint'      => "There is a box full of ramen 
             pack noodles. Comes with a handy 
             plastic chopsticks. Now its 
             obvious. Type [grab] command."
        ],
        'room2' => [
            'name'      => 'Kitchen',
            'isLocked'  => false,
            'items'     => ['teapot', 'bowl'],
            'dialogue'  => "\tWhy did he leave this place unattended. Better clean this for a while.\n",
            'hint'      => "Store the hot water in the 
             teapot and take it. Take also 
             the bowl. Type [grab] command."
        ],
        'room3' => [
            'name'      => 'Great Hall',
            'isLocked'  => true,
            'items'     => ['picture'],
            'dialogue'  => "\tOhh he really does have a bad taste when it comes to art haha!\n",
            'hint'      => "Just enjoy the beautiful 
             scenery of this place. 
             Isn't it nice?"
        ],
        'room4' => [
            'name'      => 'Vault',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tWhat happened to you, Raizel!?\n",
            'hint'      => "As of you remember him.
             Give him your cooked ramen."
        ]
    ];

    const HAN_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Lower Main Hall',
            'isLocked'  => false,
            'items'     => ['teapot'],
            'dialogue'  => "\tAhh I need to compose myself first. I need to escape here.\n",
            'hint'      => " As you noticed there is a 
             teapot that has been recently 
             used. Worth to take it.                                   
             Type [grab] command."
        ],
        'room2' => [
            'name'      => 'Dining Room',
            'isLocked'  => false,
            'items'     => ['bowl', 'ramen'],
            'dialogue'  => "\tWhat the..? This place is dazzling. Hello? anybody there?\n",
            'hint'      => "A pack of ramen noodle was 
             left unused. Also a bowl was aside 
             to it. Take them both. 
             Type [grab] command."
        ],
        'room3' => [
            'name'      => 'Secret Room',
            'isLocked'  => true,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThere must be a way out in here.\n",
            'hint'      => "There is a chopstick in 
             the drawer. Take it. 
             Type [grab] command."
        ],
        'room4' => [
            'name'      => 'Drawing Room',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tSo this is the guy in my dream. He's so pale\n",
            'hint'      => "As obvious as it is, 
             just give the ramen to him.
             To end your misery."
        ]
    ];

    const M21_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Entrance Hall',
            'isLocked'  => false,
            'items'     => ['bowl'],
            'dialogue'  => "\tWhen did fell asleep in here?\n",
            'hint'      => "A bowl appeared on the 
             small table. Take it for 
             you might it need later.
             Type [grab] command."
        ],
        'room2' => [
            'name'      => 'Gallery',
            'isLocked'  => false,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThis is the guy in my dreams. Maybe he has something for me.\n",
            'hint'      => "There are chopsticks on that 
             cup I think you know what 
             this is. Type [grab] command."
        ],
        'room3' => [
            'name'      => 'Rest Room',
            'isLocked'  => false,
            'items'     => ['ramen', 'coffeemug'],
            'dialogue'  => "\tThis place don't really seemed abondened, everthing here is tidy.\n",
            'hint'      => " There is a hot boiled water 
             in the coffe mug. Inside in that 
             bag there's a pack of ramen 
             noodles. Type [grab] command."
        ],
        'room4' => [
            'name'      => 'Drawing Room',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tMaybe I need something to wake him up\n",
            'hint'      => " It's better to give him 
             the best ramen noodle or else..."
        ]
    ];
}