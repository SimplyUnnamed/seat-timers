<?php

return [
    'seattimers' => [
        'name' => 'Timers',
        //'permission' => '*',
        'route_segment' => 'timers',
        'icon' => 'fa fa-clock',
        'entries' => [
            'timers' => [
                'name' => "Timers",
                'icon' => 'fa fa-stopwatch',
                'route_segment' => 'timers',
                'route' => 'timers.view',
                //'permissions' => '*'
            ],
            /*'integrations' => [
                'name' => 'Integrations',
                'icon' => 'fa fa-cogs',
                'route_segment' => 'timers',
                'route' => 'timers.integrations',
                //'permissions' => '*',
            ]*/
        ]
    ]

];