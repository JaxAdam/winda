<?php
return [
    '' => [
      'controller' => 'main',
      'action' => 'home',
    ],
    'home' => [
        'controller' => 'main',
        'action' => 'home',
    ],
    'cabinet' => [
        'controller' => 'main',
        'action' => 'cabinet',
    ],
    'gid' => [
        'controller' => 'main',
        'action' => 'gid',
    ],
    'gid/svodnaya-tablica' => [
        'controller' => 'main',
        'action' => 'one',
    ],
    'gid/svodnaya-informaciya-o-licenziyah' => [
        'controller' => 'main',
        'action' => 'two',
    ],
    'gid/aktivaciya-web-sluzhb-open' => [
        'controller' => 'main',
        'action' => 'three',
    ],
    'gid/aktivaciya-slujb-programm-korporativnogo-licenzirovaniya' => [
        'controller' => 'main',
        'action' => 'four',
    ],
    'gid/zagruzki' => [
        'controller' => 'main',
        'action' => 'five',
    ],
    'gid/kluchi-produktov' => [
        'controller' => 'main',
        'action' => 'six',
    ],
    'gid/software-assurance' => [
        'controller' => 'main',
        'action' => 'seven',
    ],
    'gid/vhod-i-razresheniya-polzovatelya' => [
        'controller' => 'main',
        'action' => 'eight',
    ],
    'gid/administrator' => [
        'controller' => 'main',
        'action' => 'nine',
    ],
    'gid/moshennichestvo-i-bezopasnost' => [
        'controller' => 'main',
        'action' => 'ten',
    ],
    'login' => [
      'controller' => 'account',
      'action' => 'login',
    ],
    'signup' => [
        'controller' => 'account',
        'action' => 'signup',
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    'access/{token:[\w\d\-]+}' => [
        'controller' => 'account',
        'action' => 'access',
    ],
    'panel/delete/{license:[\w\d\-]+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],
    'panel' => [
        'controller' => 'admin',
        'action' => 'panel',
    ],
    'panel/add-license' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'panel/set-owner/{license:[\w\d\-]+}' => [
        'controller' => 'admin',
        'action' => 'setowner',
    ],
    'panel/{license:[\w\d\-]+}' => [
        'controller' => 'admin',
        'action' => 'license',
    ],
    'panel/user/{user:[\w\d\-]+}' => [
        'controller' => 'admin',
        'action' => 'user',
    ],
    'panel/unset/{license:[\w\d\-]+}' => [
        'controller' => 'admin',
        'action' => 'unsetowner',
    ],
];