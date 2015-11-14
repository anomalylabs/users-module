<?php

return [
    'name'             => [
        'name'         => '名稱',
        'instructions' => '這個角色的名稱是什麼？',
        'placeholder'  => '編輯'
    ],
    'avatar'           => [
        'name'         => '頭像',
        'instructions' => '請選擇一個頭像圖片。'
    ],
    'first_name'       => [
        'name'         => '大名',
        'instructions' => '請問這個用戶的大名是？',
        'placeholder'  => 'John'
    ],
    'last_name'        => [
        'name'         => '姓氏',
        'instructions' => '請問這個使用者的姓氏是？',
        'placeholder'  => 'Doe'
    ],
    'display_name'     => [
        'name'         => '顯示名稱',
        'instructions' => '請問這個用戶對外公開的顯示名稱是？',
        'placeholder'  => 'Mr. John Doe'
    ],
    'username'         => [
        'name'         => '用戶名稱',
        'instructions' => '請問這個用戶的用戶名稱？ 這個必須是獨一無二，不能與其他用戶重複才可以。',
        'placeholder'  => 'johndoe1'
    ],
    'email'            => [
        'name'             => '電子郵件',
        'instructions'     => '請問此用戶的登入電子郵件？ 這個必須是獨一無二，不能與其他用戶重複才可以。',
        'instructions_alt' => '請輸入您帳號的登入電子郵件。',
        'placeholder'      => 'example@domain.com'
    ],
    'password'         => [
        'name'             => '密碼',
        'instructions'     => '請為此用戶輸入一組安全的登入密碼。',
        'instructions_alt' => '請輸入一個全新並安全的登入密碼。'
    ],
    'confirm_password' => [
        'name'             => '確認密碼',
        'instructions'     => '請確認您的新密碼。',
        'instructions_alt' => '請確認您的新密碼。'
    ],
    'slug'             => [
        'name'         => '縮略名',
        'instructions' => '請輸入此角色的縮略名。 這主要是在系統內部使用，而且必須是獨一無二的。',
        'placeholder'  => '編輯'
    ],
    'roles'            => [
        'name'         => '角色',
        'count'        => ':count 角色',
        'instructions' => '請為這個用戶選擇一個角色。'
    ],
    'permissions'      => [
        'name'  => '權限',
        'count' => ':count 權限'
    ],
    'last_activity_at' => [
        'name' => '最後一次活動'
    ],
    'activated'        => [
        'name' => '已啟動'
    ],
    'enabled'          => [
        'name' => '啟用中'
    ],
    'activation_code'  => [
        'name'         => '啟動碼',
        'instructions' => '請輸入系統寄給您的啟動碼。'
    ],
    'remember_me'      => [
        'name' => '記住我'
    ]
];
