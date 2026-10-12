<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Control Panel
    |--------------------------------------------------------------------------
    |
    | Whether users with control panel access need a second factor, and which
    | methods they may use for it. Available modes are:
    |
    | 'off'         - Never ask for a second factor in the control panel.
    | 'optional'    - Ask users who have set up a method.
    | 'required'    - Ask everyone, and send users without a method to set one up.
    |
    */
    'admin'          => 'off',
    'admin_methods'  => [
        'authenticator',
        'email',
    ],

    /*
    |--------------------------------------------------------------------------
    | Codes
    |--------------------------------------------------------------------------
    |
    | Emailed codes expire after email_code_ttl minutes, and a new one may be
    | sent every resend_delay seconds. A code, or a pending login, stops being
    | accepted after max_attempts failures. A pending login expires after
    | pending_ttl minutes.
    |
    */
    'email_code_ttl' => 10,
    'resend_delay'   => 60,
    'max_attempts'   => 5,
    'pending_ttl'    => 10,
    'recovery_codes' => 8,

    /*
    |--------------------------------------------------------------------------
    | Issuer
    |--------------------------------------------------------------------------
    |
    | The name shown in authenticator apps. Defaults to the site name.
    |
    */
    'issuer'         => null,
];
