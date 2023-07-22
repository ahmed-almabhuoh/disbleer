<?php


return [
    'dashboard' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'clientv1.dashboard',
        'permissions' => [],
    ],


    // 'supervisors' => [
    //     'hasSub' => true,
    //     'subs' => [
    //         ['title' => 'Supervisors', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.index'],
    //         ['title' => 'Add Supervisor', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.create'],
    //     ],
    //     'icon' => '<i class="bi bi-grid"></i>',
    //     'route' => '#',
    //     'permissions' => [
    //         'add-supervisor' => 'form',
    //         'update-supervisor' => 'index',
    //         'delete-supervisor' => 'index',
    //         'show-supervisors' => 'index',
    //     ]
    // ],

];
