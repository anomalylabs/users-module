<?php

return [
    'name'             => [
        'name'         => '名称',
        'instructions' => [
            'roles' => '改角色的简单名称。',
        ],
    ],
    'description'      => [
        'name'         => '简述',
        'instructions' => [
            'roles' => '简单描述一下这个角色。',
        ],
    ],
    'first_name'       => [
        'name'         => '大名',
        'instructions' => '请问这个用户的大名是？',
        'placeholder'  => 'John',
    ],
    'last_name'        => [
        'name'         => '姓氏',
        'instructions' => '请问这个使用者的姓氏是？',
        'placeholder'  => 'Doe',
    ],
    'display_name'     => [
        'name'         => '显示名称',
        'instructions' => '请问这个用户对外公开的显示名称是？',
        'placeholder'  => 'Mr. John Doe',
    ],
    'username'         => [
        'name'         => '用户名称',
        'instructions' => '请问这个用户的用户名称？ 这个必须是独一无二，不能与其他用户重复才可以。',
        'placeholder'  => 'johndoe1',
    ],
    'email'            => [
        'name'             => '电子邮件',
        'instructions'     => '请问此用户的登入电子邮件？ 这个必须是独一无二，不能与其他用户重复才可以。',
        'instructions_alt' => '请输入您帐号的登入电子邮件。',
        'placeholder'      => 'example@domain.com',
    ],
    'password'         => [
        'name'             => '密码',
        'instructions'     => '请为此用户输入一组安全的登入密码。',
        'instructions_alt' => '请输入一个全新并安全的登入密码。',
    ],
    'confirm_password' => [
        'name'             => '确认密码',
        'instructions'     => '请确认您的新密码。',
        'instructions_alt' => '请确认您的新密码。',
    ],
    'slug'             => [
        'name'         => '缩略名',
        'instructions' => [
            'roles' => '缩略名是角色的唯一标识。',
        ],
    ],
    'roles'            => [
        'name'         => '角色',
        'count'        => ':count 角色',
        'instructions' => '请为这个用户选择一个角色。',
    ],
    'permissions'      => [
        'name'  => '权限',
        'count' => ':count 权限',
    ],
    'last_activity_at' => [
        'name' => '最后一次活动',
    ],
    'activated'        => [
        'name'         => '已激活',
        'label'        => '该用户是否已激活？',
        'instructions' => '未激活的用户无法进行操作。',
    ],
    'enabled'          => [
        'name'         => '启用中',
        'label'        => '该用户是否启用中？',
        'instructions' => '未启用的用户无法登陆或启动。',
    ],
    'activation_code'  => [
        'name'         => '启动码',
        'instructions' => '请输入系统寄给您的启动码。',
    ],
    'remember_me'      => [
        'name' => '记住我',
    ],
];
