<?php

return [
    'name'         => [
        'name'         => 'Name',
        'instructions' => 'What is the name of the role?',
        'placeholder'  => 'Editor'
    ],
    'first_name'   => [
        'name'         => 'First Name',
        'instructions' => 'What is the user\'s real first name?',
        'placeholder'  => 'John'
    ],
    'last_name'    => [
        'name'         => 'Last Name',
        'instructions' => 'What is the user\'s real last name?',
        'placeholder'  => 'Doe'
    ],
    'display_name' => [
        'name'         => 'Display Name',
        'instructions' => 'What is the publicly displayed name of the user? If left empty, the first and last name will be used.',
        'placeholder'  => 'Mr. John Doe'
    ],
    'username'     => [
        'name'         => 'Username',
        'instructions' => 'What is the user\'s username? This must be unique across all users.',
        'placeholder'  => 'johndoe1'
    ],
    'email'        => [
        'name'         => 'Email',
        'instructions' => 'What is the user\'s login email? This must be unique across all users.',
        'placeholder'  => 'example@domain.com'
    ],
    'password'     => [
        'name'         => 'Password',
        'instructions' => 'Enter a secure login password for the user.'
    ],
    'slug'         => [
        'name'         => 'Slug',
        'instructions' => 'Enter the role\'s slug. This is primarily used behind the scenes and must be unique across all roles.',
        'placeholder'  => 'editor'
    ],
    'roles'        => [
        'name'         => 'Roles',
        'count'        => ':count role(s)',
        'instructions' => 'Choose the roles to attach to this user.'
    ],
    'permissions'  => [
        'name'  => 'Permissions',
        'count' => ':count permission(s)'
    ],
    'activated'    => [
        'name'          => 'Activated',
        'activated'     => 'Activated',
        'not_activated' => 'Not Activated'
    ],
    'blocked'      => [
        'name'    => 'Blocked',
        'blocked' => 'Blocked'
    ]
];
