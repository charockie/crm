<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'error' => [
        'type' => 2,
    ],
    'sign-up' => [
        'type' => 2,
    ],
    'index' => [
        'type' => 2,
    ],
    'view' => [
        'type' => 2,
    ],
    'update' => [
        'type' => 2,
    ],
    'delete_department' => [
        'type' => 2,
    ],
    'add_position' => [
        'type' => 2,
    ],
    'choose_user' => [
        'type' => 2,
    ],
    'choose' => [
        'type' => 2,
    ],
    'create' => [
        'type' => 2,
    ],
    'free_user' => [
        'type' => 2,
    ],
    'delete_position' => [
        'type' => 2,
    ],
    'delete_user' => [
        'type' => 2,
    ],
    'delete_ticket' => [
        'type' => 2,
    ],
    'view_ticket' => [
        'type' => 2,
    ],
    'start' => [
        'type' => 2,
    ],
    'finish' => [
        'type' => 2,
    ],


    'guest' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'login',
            'logout',
            'error',
            'sign-up',
            'index',
            'view',
        ],
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'guest',
            'view_ticket',
            'start',
            'finish',
        ],
    ],
    'moderator' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'view_ticket',
            'start',
            'finish',
            'update',

            'user',
            'guest',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'create',
            'choose',
            'delete_department',
            'delete_ticket',
            'choose_user',
            'add_position',
            'free_user',
            'delete_position',
            'delete_user',

            'moderator',
            'user',
        ],
    ],
];