<?php


return [
    'dashboard' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-grid"></i>',
        'route' => 'backend.dashboard',
        'permissions' => [],
    ],

    'Account Settings' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-person-lines-fill"></i>',
        'route' => 'managers.account',
        'permissions' => [],
    ],

    'Permissions' => [
        'hasSub' => false,
        'subs' => [],
        'icon' => '<i class="bi bi-person-up"></i>',
        'route' => 'permissions',
        'permissions' => [
            'add-permission' => 'sidebar',
            'update-permission' => 'index',
            'delete-permission' => 'index',
            'show-permissions' => 'sidebar',
        ]
    ],

    'managers' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Managers', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'managers.index'],
            ['title' => 'Add Manager', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'managers.create'],
        ],
        'icon' => '<i class="bi bi-person-bounding-box"></i>',
        'route' => '#',
        'permissions' => [
            'add-manager' => 'sidebar',
            'update-manager' => 'index',
            'delete-manager' => 'index',
            'show-managers' => 'sidebar',
        ],
    ],

    'supervisors' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Supervisors', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.index'],
            ['title' => 'Add Supervisor', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'supervisors.create'],
        ],
        'icon' => '<i class="bi bi-person-circle"></i>',
        'route' => '#',
        'permissions' => [
            'add-supervisor' => 'sidebar',
            'update-supervisor' => 'index',
            'delete-supervisor' => 'index',
            'show-supervisors' => 'sidebar',
        ]
    ],

    'disables' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Disables', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'disables.index'],
            ['title' => 'Add Disable', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'disables.create'],
        ],
        'icon' => '<i class="bi bi-file-earmark-person"></i>',
        'route' => '#',
        'permissions' => [
            'add-disable' => 'sidebar',
            'update-disable' => 'index',
            'delete-disable' => 'index',
            'show-disables' => 'sidebar',
        ]
    ],

    'reports' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Reports', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'reports.index'],
        ],
        'icon' => '<i class="bi bi-newspaper"></i>',
        'route' => '#',
        'permissions' => [
            'show-reports' => 'sidebar',
        ]
    ],

    'courses' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Coursers', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'courses.index'],
            ['title' => 'Add Courser', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'courses.create'],
        ],
        'icon' => '<i class="bi bi-journal-album"></i>',
        'route' => '#',
        'permissions' => [
            'add-course' => 'sidebar',
            'update-course' => 'index',
            'delete-course' => 'index',
            'show-courses' => 'sidebar',
        ]
    ],

    'tests' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Tests', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tests.index'],
            ['title' => 'Add Test', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tests.create'],
        ],
        'icon' => '<i class="bi bi-question-square"></i>',
        'route' => '#',
        'permissions' => [
            'add-test' => 'sidebar',
            'update-test' => 'index',
            'delete-test' => 'index',
            'show-tests' => 'sidebar',
        ]
    ],

    'categories' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Category', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'categories.index'],
            ['title' => 'Add Category', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'categories.create'],
        ],
        'icon' => '<i class="bi bi-bookmarks"></i>',
        'route' => '#',
        'permissions' => [
            'add-category' => 'sidebar',
            'update-category' => 'index',
            'delete-category' => 'index',
            'show-categories' => 'sidebar',
        ]
    ],

    'roles' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Roles', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'roles.index'],
            ['title' => 'Add Role', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'roles.create'],
        ],
        'icon' => '<i class="bi bi-ui-checks-grid"></i>',
        'route' => '#',
        'permissions' => [
            'add-role' => 'sidebar',
            'update-role' => 'index',
            'delete-role' => 'index',
            'show-roles' => 'sidebar',
            'show-roles-permissions' => 'index',
            'assign-permissions' => 'index',
        ]
    ],


    'tags' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Tags', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tags.index'],
            ['title' => 'Add Tag', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'tags.create'],
        ],
        'icon' => '<i class="bi bi-hash"></i>',
        'route' => '#',
        'permissions' => [
            'add-tag' => 'sidebar',
            'update-tag' => 'index',
            'delete-tag' => 'index',
            'show-tags' => 'sidebar',
        ]
    ],

    'jobs' => [
        'hasSub' => true,
        'subs' => [
            ['title' => 'Jobs', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'jobs.index'],
            ['title' => 'Add Job', 'icon' => '<i class="bi bi-grid"></i>', 'route' => 'jobs.create'],
        ],
        'icon' => '<i class="bi bi-pc-display"></i>',
        'route' => '#',
        'permissions' => [
            'add-job' => 'sidebar',
            'update-job' => 'index',
            'delete-job' => 'index',
            'show-jobs' => 'sidebar',
        ]
    ],


];
