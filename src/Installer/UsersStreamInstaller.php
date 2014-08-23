<?php namespace Streams\Addon\Module\Users\Installer;

use Streams\Core\Stream\Installer\StreamInstaller;

class UsersStreamInstaller extends StreamInstaller
{
    /**
     * The stream fields assignments definitions.
     *
     * @var array
     */
    protected $assignments = [
        'email'               => ['is_required' => true, 'is_unique' => true],
        'password'            => ['is_required' => true],
        'permissions'         => [],
        'is_activated'        => ['is_required' => true],
        'activation_code'     => [],
        'activated_at'        => [],
        'last_login'          => [],
        'persist_code'        => [],
        'reset_password_code' => [],
        'first_name'          => [],
        'last_name'           => [],
    ];

    /*******************************************
     * REMOVE AFTER INSTALLED IS FINISHED!
     *******************************************/
    protected function onAfterInstall()
    {
        $credentials = [
            'email'        => 'test@domain.com',
            'password'     => 'password',
            'is_activated' => true,
            'first_name'   => 'Mr.',
            'last_name'    => 'Anderson',
        ];

        try {
            if (!\Sentry::findUserByCredentials($credentials)) {

            }
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {

            // Create a user
            \Sentry::createUser($credentials);
        }

        return true;
    }
    /*******************************************
     * EOF: REMOVE AFTER INSTALLED IS FINISHED!
     *******************************************/
}
