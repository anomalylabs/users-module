<?php

return [
    'allow_registration' => [
        'label'        => 'Erlaube Registrierungen',
        'instructions' => 'Soll es Benutzern erlaubt sein, sich über die Website registrieren zu können?',
        'text'         => 'Ja, erlaube die Benutzer-Registrierung',
    ],
    'activation_mode'    => [
        'label'        => 'Aktivierungsmodus',
        'instructions' => 'Wie sollen Benutzer nach der Registrierung aktiviert werden?',
        'option'       => [
            'manual'    => 'Ein Administrator muss die Benutzer manuell aktivieren.',
            'email'     => 'Sende eine E-Mail mit einer Aktivierungsbestätigung an den Benutzer.',
            'automatic' => 'Aktiviere den Benutzer nach der Registrierung automatisch.',
        ],
    ],
    'profile_visibility' => [
        'label'        => 'Sichtbarkeit des Profils',
        'instructions' => 'Definieren Sie, wer Benutzerprofile auf der öffentlichen Website einsehen kann.',
        'option'       => [
            'everyone' => 'Jeder kann öffentliche Profile einsehen.',
            'owner'    => 'Nur der Besitzer des Profils kann sein Profil einsehen.',
            'disabled' => 'Deaktiviere diese Funktion.',
            'users'    => 'Jeder angemeldete Benutzer kann die Profile der anderen Benutzer einsehen.',
        ],
    ],
];