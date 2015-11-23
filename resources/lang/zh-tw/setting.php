<?php

return [
    'register_enabled'        => [
        'label'        => '註冊開啟',
        'instructions' => '允許用戶在網站中自行註冊？',
        'warning'      => '這不會影響控制台或插件的功能。'
    ],
    'register_path'           => [
        'label'        => '註冊路徑',
        'instructions' => '請指定註冊的網址路徑。'
    ],
    'register_redirect'       => [
        'label'        => '註冊轉址',
        'instructions' => '請指定一個網址路徑，用於當用戶申請註冊後的轉址。'
    ],
    'activate_path'           => [
        'label'        => '啟動轉址',
        'instructions' => '請指定啟動的網址路徑。'
    ],
    'activated_redirect'      => [
        'label'        => '啟動轉址',
        'instructions' => '請指定一個網址路徑，用於當用戶完成註冊後的轉址。'
    ],
    'activation_mode'         => [
        'label'        => '啟動模式',
        'instructions' => '用戶註冊後，系統應該如何啟動帳號呢?',
        'option'       => [
            'manual'    => '需要管理員手動啟動帳號。',
            'email'     => '寄送出啟動信件給用戶。',
            'automatic' => '用戶註冊後系統自動啟動帳號。'
        ]
    ],
    'activation_roles'        => [
        'label'        => '啟動角色',
        'instructions' => '註冊後的用戶將設定成哪個預設的角色呢？'
    ],
    'login_enabled'           => [
        'label'        => '開啟登入？',
        'instructions' => '允許用戶登入網站？',
        'warning'      => '這不會影響控制台或插件的功能。'
    ],
    'login_path'              => [
        'label'        => '登入路徑',
        'instructions' => '請指定登入的網址。'
    ],
    'login_redirect'          => [
        'label'        => '登入轉址',
        'instructions' => '請指定一個網址路徑，用於當用戶登入後的轉址。'
    ],
    'logout_path'             => [
        'label'        => '登出路徑',
        'instructions' => '請指定登出的網址。'
    ],
    'logout_redirect'         => [
        'label'        => '登出轉址',
        'instructions' => '請指定一個網址路徑，用於當用戶登出後的轉址。'
    ],
    'resets_enabled'          => [
        'label'        => '開啟密碼重設？',
        'instructions' => '允許用戶在網站中重設密碼？',
        'warning'      => '這不會影響控制台或插件的功能。'
    ],
    'reset_path'              => [
        'label'        => '申請重設密碼路徑',
        'instructions' => '請指定申請密碼重設的網址路徑。'
    ],
    'reset_redirect'          => [
        'label'        => '重設密碼轉址',
        'instructions' => '請指定當用戶成功送出密碼重設後的轉址路徑。'
    ],
    'complete_reset_path'     => [
        'label'        => '完成重設密碼路徑',
        'instructions' => '請指定用戶完成密碼重設的路徑。'
    ],
    'complete_reset_redirect' => [
        'label'        => '密碼重設完成後的轉址',
        'instructions' => '請指定用戶完成密碼重設後的轉址路徑。'
    ]
];