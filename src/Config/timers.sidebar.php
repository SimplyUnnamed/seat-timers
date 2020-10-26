<?php

return [

    'seattimers' => [
        'name' => 'Timers',
        'permission' => 'timers.view',
        'route_segment' => 'timers',
        'icon' => 'fa fa-clock',
        'entries' => [
            [   //Timers
                'name' => "Timers",
                'icon' => 'fa fa-stopwatch',
                'route_segment' => 'timers',
                'route' => 'timers.view',
                'permission' => 'timers.view'
            ],
            [    //Timer Types
                'name' => "Timer Types",
                'icon' => "fa fa-list",
                'route_segment' => "timers",
                "route" => "timertypes.view",
                'permission' => 'timertypes.view'
            ],

        ]
    ],

];