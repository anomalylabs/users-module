<?php

return [
    'register_enabled'        => [
        'label'        => '注册开启',
        'instructions' => '允许用户在网站中自行注册？',
        'warning'      => '这不会影响控制台或插件的功能。'
    ],
    'register_path'           => [
        'label'        => '注册路径',
        'instructions' => '请指定注册的网址路径。'
    ],
    'register_redirect'       => [
        'label'        => '注册转址',
        'instructions' => '请指定一个网址路径，用于当用户申请注册后的转址。'
    ],
    'activate_path'           => [
        'label'        => '启动转址',
        'instructions' => '请指定启动的网址路径。'
    ],
    'activated_redirect'      => [
        'label'        => '启动转址',
        'instructions' => '请指定一个网址路径，用于当用户完成注册后的转址。'
    ],
    'activation_mode'         => [
        'label'        => '启动模式',
        'instructions' => '用户注册后，系统应该如何启动帐号呢?',
        'option'       => [
            'manual'    => '需要管理员手动启动帐号。',
            'email'     => '寄送出启动信件给用户。',
            'automatic' => '用户注册后系统自动启动帐号。'
        ]
    ],
    'activation_roles'        => [
        'label'        => '启动角色',
        'instructions' => '注册后的用户将设定成哪个预设的角色呢？'
    ],
    'login_enabled'           => [
        'label'        => '开启登入？',
        'instructions' => '允许用户登入网站？',
        'warning'      => '这不会影响控制台或插件的功能。'
    ],
    'login_path'              => [
        'label'        => '登入路径',
        'instructions' => '请指定登入的网址。'
    ],
    'login_redirect'          => [
        'label'        => '登入转址',
        'instructions' => '请指定一个网址路径，用于当用户登入后的转址。'
    ],
    'logout_path'             => [
        'label'        => '登出路径',
        'instructions' => '请指定登出的网址。'
    ],
    'logout_redirect'         => [
        'label'        => '登出转址',
        'instructions' => '请指定一个网址路径，用于当用户登出后的转址。'
    ],
    'resets_enabled'          => [
        'label'        => '开启密码重设？',
        'instructions' => '允许用户在网站中重设密码？',
        'warning'      => '这不会影响控制台或插件的功能。'
    ],
    'reset_path'              => [
        'label'        => '申请重设密码路径',
        'instructions' => '请指定申请密码重设的网址路径。'
    ],
    'reset_redirect'          => [
        'label'        => '重设密码转址',
        'instructions' => '请指定当用户成功送出密码重设后的转址路径。'
    ],
    'complete_reset_path'     => [
        'label'        => '完成重设密码路径',
        'instructions' => '请指定用户完成密码重设的路径。'
    ],
    'complete_reset_redirect' => [
        'label'        => '密码重设完成后的转址',
        'instructions' => '请指定用户完成密码重设后的转址路径。'
    ]
];