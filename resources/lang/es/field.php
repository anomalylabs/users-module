<?php

return [
    'name'         => [
        'name'         => 'Nombre',
        'instructions' => 'Cual es el nombre del rol?',
        'placeholder'  => 'Editor'
    ],
    'first_name'   => [
        'name'         => 'Nombre',
        'instructions' => 'Cual es el nombre del usuario?',
        'placeholder'  => 'John'
    ],
    'last_name'    => [
        'name'         => 'Apellido',
        'instructions' => 'Cual es el apellido del usuario?',
        'placeholder'  => 'Doe'
    ],
    'display_name' => [
        'name'         => 'Nombre para mostrar',
        'instructions' => 'Cual es el nombre para mostrar del usuario? si no se coloca se usara el nombre del usuario.',
        'placeholder'  => 'Mr. John Doe'
    ],
    'username'     => [
        'name'         => 'Nombre de usuario.',
        'instructions' => 'Cual es el nombre de usuario? debe ser único entre todos los usuarios.',
        'placeholder'  => 'johndoe1'
    ],
    'email'        => [
        'name'         => 'Correo Electrónico',
        'instructions' => 'Cual es el correo electrónico del usuario? debe ser único entre todos los usuarios.',
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
    ],
    'website'      => [
        'name' => 'Website'
    ]
];
