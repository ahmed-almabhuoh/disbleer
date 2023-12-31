<?php


return [
    'dashboard' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'clientv1.dashboard',
        'permissions' => [],
        'isSoon' => false,
    ],

    'profile' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-person"></i>',
        'route' => 'managers.account',
        'permissions' => [],
        'isSoon' => false,
    ],

    'proposals' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-envelope-paper"></i>',
        'route' => 'clientv1.proposals',
        'permissions' => [],
        'isSoon' => false,
    ],

    'courses' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-journal-album"></i>',
        'route' => 'clientv1.courses',
        'permissions' => [],
        'isSoon' => false,
    ],

    'credits' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-credit-card"></i>',
        'route' => 'clientv1.credits',
        'permissions' => [],
        'isSoon' => false,
    ],

    'chat' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-chat-right-text"></i>',
        'route' => 'chats.conversations',
        'permissions' => [],
        'isSoon' => false,
    ],

    'logout' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-box-arrow-right"></i>',
        'route' => 'logout',
        'permissions' => [],
        'isSoon' => false,
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
