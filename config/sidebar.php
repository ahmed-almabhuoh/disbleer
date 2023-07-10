<?php


return [
    'dashboard' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'backend.dashboard',
    ],

    'managers' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Managers', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'managers.index'],
            ['title' => 'Add Manager', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'managers.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

    'supervisors' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Supervisors', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.index'],
            ['title' => 'Add Supervisor', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

    'disables' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Disables', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'disables.index'],
            ['title' => 'Add Disable', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'disables.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],


];
