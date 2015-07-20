<?php

return [
    'name'                  => [
        'name'         => 'Name',
        'instructions' => 'What is the name of the role?',
        'placeholder'  => 'Editor'
    ],
    'first_name'            => [
        'name'         => 'First Name',
        'instructions' => 'What is the user\'s real first name?',
        'placeholder'  => 'John'
    ],
    'last_name'             => [
        'name'         => 'Last Name',
        'instructions' => 'What is the user\'s real last name?',
        'placeholder'  => 'Doe'
    ],
    'display_name'          => [
        'name'         => 'Display Name',
        'instructions' => 'What is the publicly displayed name of the user?',
        'placeholder'  => 'Mr. John Doe'
    ],
    'username'              => [
        'name'         => 'Username',
        'instructions' => 'What is the user\'s username? This must be unique across all users.',
        'placeholder'  => 'johndoe1'
    ],
    'email'                 => [
        'name'             => 'Email',
        'instructions'     => 'What is the user\'s login email? This must be unique across all users.',
        'instructions_alt' => 'Enter your account\'s login email.',
        'placeholder'      => 'example@domain.com'
    ],
    'password'              => [
        'name'             => 'Password',
        'instructions'     => 'Enter a secure login password for the user.',
        'instructions_alt' => 'Enter a new secure login password.'
    ],
    'password_confirmation' => [
        'name'             => 'Confirm Password',
        'instructions'     => 'Confirm your new password.',
        'instructions_alt' => 'Confirm your new password.'
    ],
    'slug'                  => [
        'name'         => 'Slug',
        'instructions' => 'Enter the role\'s slug. This is primarily used behind the scenes and must be unique across all roles.',
        'placeholder'  => 'editor'
    ],
    'roles'                 => [
        'name'         => 'Roles',
        'count'        => ':count role(s)',
        'instructions' => 'Choose the roles to attach to this user.'
    ],
    'permissions'           => [
        'name'  => 'Permissions',
        'count' => ':count permission(s)'
    ],
    'last_activity_at'      => [
        'name' => 'Last Activity'
    ],
    'status'                => [
        'name'      => 'Status',
        'active'    => 'Active',
        'inactive'  => 'Inactive',
        'suspended' => 'Suspended'
    ],
    'reset_code'            => [
        'name'         => 'Reset Code',
        'instructions' => 'Enter the reset code that was sent to you.'
    ],
    'activation_code'       => [
        'name'         => 'Activation Code',
        'instructions' => 'Enter the activation code that was sent to you.'
    ]
];
