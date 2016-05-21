<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

/**
 * Class LoginFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Login
 */
class LoginFormFields
{

    /**
     * Handle the fields.
     *
     * @param LoginFormBuilder           $builder
     * @param SettingRepositoryInterface $settings
     */
    public function handle(LoginFormBuilder $builder, SettingRepositoryInterface $settings)
    {
        $method = $settings->value('anomaly.module.users::login', 'email');

        if ($method == 'username') {
            $login = [
                'username' => [
                    'label'    => 'anomaly.module.users::field.username.name',
                    'type'     => 'anomaly.field_type.text',
                    'required' => true
                ]
            ];
        } else {
            $login = [
                'email' => [
                    'label'    => 'anomaly.module.users::field.email.name',
                    'type'     => 'anomaly.field_type.email',
                    'required' => true
                ]
            ];
        }

        $builder->setFields(
            array_merge(
                $login,
                [
                    'password'    => [
                        'label'      => 'anomaly.module.users::field.password.name',
                        'type'       => 'anomaly.field_type.text',
                        'required'   => true,
                        'config'     => [
                            'type' => 'password'
                        ],
                        'rules'      => [
                            'valid_credentials'
                        ],
                        'validators' => [
                            'valid_credentials' => [
                                'handler' => 'Anomaly\UsersModule\User\Validation\ValidateCredentials@handle',
                                'message' => 'anomaly.module.users::message.invalid_login'
                            ]
                        ]
                    ],
                    'remember_me' => [
                        'label'  => false,
                        'type'   => 'anomaly.field_type.boolean',
                        'config' => [
                            'mode'  => 'checkbox',
                            'label' => 'anomaly.module.users::field.remember_me.name'
                        ]
                    ]
                ]
            )
        );
    }
}
