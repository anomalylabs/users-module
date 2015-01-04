<?php namespace Anomaly\UsersModule\Ui\Form\User\Command;

/**
 * Class LoadSectionsOptionCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form\User\Command
 */
class LoadSectionsOptionCommandHandler
{

    /**
     * Handle the command.
     *
     * @param LoadSectionsOptionCommand $command
     */
    public function handle(LoadSectionsOptionCommand $command)
    {
        $options = $command->getOptions();

        $options->put(
            'sections',
            [
                [
                    'title'  => 'Test',
                    'fields' => [
                        'username',
                    ]
                ]
            ]
        );
    }
}
