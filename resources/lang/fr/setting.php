<?php

return [
    'allow_registration' => [
        'label'        => "Autoriser l'inscription",
        'instructions' => "Autoriser les utilisateurs à s'enregistrer librement sur le site.",
        'text'         => 'Oui, autoriser les inscriptions'
    ],
    'activation_mode'    => [
        'label'        => 'Activation des utilisateurs',
        'instructions' => "Comment doivent-être validé les utilisateurs qui s'enregistrent.",
        'option'       => [
            'manual'    => "Activation manuelle par un administrateur",
            'email'     => "Activation par un email de confirmation",
            'automatic' => "Activation automatique à la fin de l'enregistrement"
        ]
    ],
    'profile_visibility' => [
        'label'        => "Visibilité des profils utilisateur",
        'instructions' => "Détermine qui peut voir les profils des utilisateurs sur le site.",
        'option'       => [
            'everyone' => "Tout le monde peut voir les profils public",
            'owner'    => "Seulement le propriétaire d'un profil peut le voir",
            'disabled' => "Désactiver cette fonctionnalité",
            'users'    => "N'importe qui connecté peut voir les autres profils public"
        ]
    ]
];