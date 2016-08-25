<?php

return [
    'activation_mode' => [
        'label'        => 'Mode d\'activation',
        'instructions' => 'Comment les utilisateurs sont activés après inscription ?',
        'option'       => [
            'email'     => 'Envoyer un email d\'activation à l\'utilisateur.',
            'manual'    => 'Activer manuellement les nouveaux utilisateurs par un administrateur.',
            'automatic' => 'Activer automatiquement après inscription.',
        ],
    ],
];
