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

    'reports' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Reports', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'reports.index'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

    'courses' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Coursers', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'courses.index'],
            ['title' => 'Add Courser', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'courses.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

    'tests' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Tests', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tests.index'],
            ['title' => 'Add Test', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tests.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

    'categories' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Category', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'categories.index'],
            ['title' => 'Add Category', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'categories.create'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => '#',
    ],

];
