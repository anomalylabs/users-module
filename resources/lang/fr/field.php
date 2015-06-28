<?php

return [
    'name'         => [
        'name'         => 'Nom',
        'instructions' => 'Nom du rôle',
        'placeholder'  => 'Editeur'
    ],
    'first_name'   => [
        'name'         => 'Prénom',
        'instructions' => 'Quel est le prénom ?',
        'placeholder'  => 'Martin'
    ],
    'last_name'    => [
        'name'         => 'Nom',
        'instructions' => 'Quel est le nom de famille ?',
        'placeholder'  => 'Dupond'
    ],
    'display_name' => [
        'name'         => 'Nom affiché',
        'instructions' => "Quel est le nom public à afficher ? Si laissé vide, le nom d'utilisateur sera utilisé.",
        'placeholder'  => 'M. Martin Dupond'
    ],
    'username'     => [
        'name'         => "Nom d'utilisateur",
        'instructions' => "Le nom d'utilisateur est unique pour tout le site.",
        'placeholder'  => 'martindupond'
    ],
    'email'        => [
        'name'         => 'Email',
        'instructions' => "Adresse email valide de l'utilisateur. Est unique pour tout le site.",
        'placeholder'  => 'exemple@domaine.fr'
    ],
    'password'     => [
        'name'         => 'Mot de passe',
        'instructions' => "Mot de passe de connexion de l'utilisateur."
    ],
    'slug'         => [
        'name'         => 'Slug',
        'instructions' => "Entrez le slug du rôle, c'est un identifiant unique du nom du rôle.",
        'placeholder'  => 'editeur'
    ],
    'roles'        => [
        'name'         => 'Rôles',
        'count'        => ':count rôle(s)',
        'instructions' => "Choisissez les rôles attachés à l'utilisateur."
    ],
    'permissions'  => [
        'name'  => 'Permissions',
        'count' => ':count permission(s)'
    ],
    'activated'    => [
        'name'          => 'Activation',
        'activated'     => 'Activaté',
        'not_activated' => 'Désactivé'
    ],
    'blocked'      => [
        'name'    => 'Bloqué',
        'blocked' => 'Bloqué'
    ],
    'website'      => [
        'name' => 'Site internet'
    ]
];
