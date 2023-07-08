<?php


return [
    'dashboard' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'backend.dashboard',
    ],

    'dashboard' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Add', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'backend.dashboard'],
        ],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'backend.dashboard',
    ],



];
